<?php

/**
 * One-off: export local SQLite database to MySQL-compatible SQL for phpMyAdmin import.
 * Usage: php deploy/export-sqlite-to-mysql.php > database/money-maze-mysql.sql
 */

$sqlitePath = __DIR__.'/../database/database.sqlite';
$out = __DIR__.'/../database/money-maze-mysql.sql';

if (! file_exists($sqlitePath)) {
    fwrite(STDERR, "Missing database/database.sqlite — run: php artisan migrate --seed\n");
    exit(1);
}

$pdo = new PDO('sqlite:'.$sqlitePath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name")
    ->fetchAll(PDO::FETCH_COLUMN);

$sql = "-- Money Maze MySQL export for Hostinger phpMyAdmin\n";
$sql .= "SET NAMES utf8mb4;\nSET FOREIGN_KEY_CHECKS = 0;\n\n";

foreach ($tables as $table) {
    if ($table === 'migrations') {
        continue;
    }

    $cols = $pdo->query("PRAGMA table_info(`{$table}`)")->fetchAll(PDO::FETCH_ASSOC);
    if ($cols === []) {
        continue;
    }

    $colDefs = [];
    foreach ($cols as $col) {
        $name = $col['name'];
        $type = strtoupper($col['type'] ?: 'TEXT');
        $mysqlType = match (true) {
            str_contains($type, 'INT') => 'BIGINT UNSIGNED',
            str_contains($type, 'TEXT') => 'TEXT',
            str_contains($type, 'REAL'), str_contains($type, 'FLOA'), str_contains($type, 'DOUB') => 'DOUBLE',
            default => 'VARCHAR(255)',
        };
        if ($name === 'id') {
            $mysqlType = 'BIGINT UNSIGNED NOT NULL AUTO_INCREMENT';
        }
        $null = ($col['notnull'] ?? 0) ? 'NOT NULL' : 'NULL';
        if ($name === 'id') {
            $null = 'NOT NULL';
        }
        $colDefs[] = "`{$name}` {$mysqlType} {$null}";
    }

    $sql .= "DROP TABLE IF EXISTS `{$table}`;\n";
    $sql .= 'CREATE TABLE `'.$table."` (\n  ".implode(",\n  ", $colDefs);
    if (in_array('id', array_column($cols, 'name'), true)) {
        $sql .= ",\n  PRIMARY KEY (`id`)";
    }
    $sql .= "\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n\n";

    $rows = $pdo->query("SELECT * FROM `{$table}`")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $keys = array_map(fn ($k) => "`{$k}`", array_keys($row));
        $vals = array_map(function ($v) use ($pdo) {
            if ($v === null) {
                return 'NULL';
            }

            return $pdo->quote((string) $v);
        }, array_values($row));
        $sql .= 'INSERT INTO `'.$table.'` ('.implode(', ', $keys).') VALUES ('.implode(', ', $vals).");\n";
    }
    $sql .= "\n";
}

$sql .= "SET FOREIGN_KEY_CHECKS = 1;\n";

file_put_contents($out, $sql);
echo "Wrote {$out} (".number_format(strlen($sql))." bytes, ".count($tables)." tables)\n";
