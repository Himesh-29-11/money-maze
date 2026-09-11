<?php

/**
 * Upscale and sharpen site images for retina / large hero display.
 * Run: php deploy/upscale-images.php
 */

declare(strict_types=1);

$root = dirname(__DIR__);
$dirs = [
    $root.'/public/assets',
    $root.'/public/assets/crops',
    $root.'/preview/assets',
    $root.'/preview/assets/crops',
];

function targetWidth(int $width, string $basename): int
{
    if (preg_match('/hero|profile|logo/i', $basename)) {
        return max(1600, $width);
    }

    if ($width < 250) {
        return 900;
    }

    if ($width < 600) {
        return 1400;
    }

    if ($width < 1000) {
        return 1600;
    }

    return $width;
}

function loadImage(string $path): ?GdImage
{
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    return match ($ext) {
        'jpg', 'jpeg' => @imagecreatefromjpeg($path) ?: null,
        'png' => @imagecreatefrompng($path) ?: null,
        'webp' => function_exists('imagecreatefromwebp') ? (@imagecreatefromwebp($path) ?: null) : null,
        default => null,
    };
}

function saveImage(GdImage $img, string $path): void
{
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

    match ($ext) {
        'jpg', 'jpeg' => imagejpeg($img, $path, 92),
        'png' => imagepng($img, $path, 6),
        'webp' => imagewebp($img, $path, 90),
        default => throw new RuntimeException("Unsupported format: {$ext}"),
    };
}

function upscale(GdImage $src, int $targetW, int $targetH): GdImage
{
    $current = $src;
    $w = imagesx($current);
    $h = imagesy($current);

    while ($w < $targetW || $h < $targetH) {
        $nextW = min($targetW, (int) max($w * 2, ceil($targetW / 4)));
        $nextH = (int) round($h * ($nextW / $w));

        if ($nextW >= $targetW) {
            $nextW = $targetW;
            $nextH = $targetH;
        }

        $step = imagecreatetruecolor($nextW, $nextH);
        imagealphablending($step, true);
        imagesavealpha($step, true);
        imagecopyresampled($step, $current, 0, 0, 0, 0, $nextW, $nextH, $w, $h);

        if ($current !== $src) {
            imagedestroy($current);
        }

        $current = $step;
        $w = $nextW;
        $h = $nextH;
    }

    return $current;
}

function sharpen(GdImage $img): void
{
    $matrix = [
        [-1, -1, -1],
        [-1, 16, -1],
        [-1, -1, -1],
    ];
    imageconvolution($img, $matrix, 8, 0);
}

$processed = [];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        continue;
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if (! $file->isFile()) {
            continue;
        }

        $path = $file->getPathname();
        $ext = strtolower($file->getExtension());

        if (! in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true)) {
            continue;
        }

        $real = realpath($path);
        if ($real && isset($processed[$real])) {
            continue;
        }

        $src = loadImage($path);
        if (! $src) {
            echo "SKIP (load failed): {$path}\n";
            continue;
        }

        $w = imagesx($src);
        $h = imagesy($src);
        $targetW = targetWidth($w, basename($path));

        if ($targetW <= $w) {
            imagedestroy($src);
            echo "OK (already {$w}px): ".basename($path)."\n";
            if ($real) {
                $processed[$real] = true;
            }
            continue;
        }

        $targetH = (int) round($h * ($targetW / $w));
        $up = upscale($src, $targetW, $targetH);
        sharpen($up);
        saveImage($up, $path);
        imagedestroy($src);
        imagedestroy($up);

        echo "UPSCALED {$w}x{$h} -> {$targetW}x{$targetH}: ".basename($path)."\n";

        if ($real) {
            $processed[$real] = true;
        }
    }
}

echo "Done.\n";
