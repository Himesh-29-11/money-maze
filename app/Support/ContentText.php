<?php

namespace App\Support;

/**
 * Converts between the plain text an admin types into Page Content and the
 * HTML the public website renders. Admins never need to write HTML:
 *  - blank-line-separated lines become paragraphs,
 *  - lines starting with "- ", "* " or "• " become bullet list items,
 *  - a single line of text stays inline (fits inside an existing <p>).
 * Values that already contain HTML (older rows) keep working unchanged.
 */
class ContentText
{
    /** HTML → clean editable plain text (what the admin sees / what gets saved). */
    public static function toPlainText(?string $value): string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        // Keep inner text, turn block boundaries into newlines, lists into "- " lines.
        $text = preg_replace('#<(br|/p|/li|/ul|/ol|/h[1-6]|/div|/tr)\s*/?>#i', "\n", $value);
        $text = preg_replace('#<li[^>]*>#i', '- ', (string) $text);
        $text = strip_tags((string) $text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = preg_replace("/\n{3,}/", "\n\n", $text);

        return trim((string) $text);
    }

    /** Plain text → HTML for the website (legacy HTML values pass through). */
    public static function toHtml(?string $value): string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        // Older rows / view defaults may still hold HTML — render them as before.
        if (preg_match('#<\s*/?\s*(p|ul|ol|li|br|a|em|strong|b|i|u|div|h[1-6])#i', $value)) {
            return $value;
        }

        $lines = preg_split('/\R/', $value) ?: [];
        $nonEmpty = array_values(array_filter(array_map('trim', $lines), fn ($l) => $l !== ''));

        // A single plain line stays inline so it works inside an existing <p>.
        if (count($nonEmpty) === 1 && ! self::isListItem($nonEmpty[0])) {
            return e($nonEmpty[0]);
        }

        $html = '';
        $items = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') {
                $html .= self::flushList($items);
                continue;
            }
            if (self::isListItem($line)) {
                $items[] = e(preg_replace('/^[-*•]\s+/u', '', $line));
                continue;
            }
            $html .= self::flushList($items);
            $html .= '<p>'.e($line).'</p>';
        }
        $html .= self::flushList($items);

        return $html;
    }

    private static function isListItem(string $line): bool
    {
        return (bool) preg_match('/^[-*•]\s+\S/u', $line);
    }

    /** @param string[] $items */
    private static function flushList(array &$items): string
    {
        if ($items === []) {
            return '';
        }
        $html = '<ul><li>'.implode('</li><li>', $items).'</li></ul>';
        $items = [];

        return $html;
    }
}
