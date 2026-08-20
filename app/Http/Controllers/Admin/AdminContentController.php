<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class AdminContentController extends Controller
{
    /**
     * Section order per page — matches the order sections appear on the live
     * website, top to bottom. Any section not listed is appended at the end
     * (alphabetically) so nothing ever disappears from the admin.
     */
    private const SECTION_ORDER = [
        'home' => [
            'Hero',
            'What I Do',
            'Who I Work With',
            'Why Work With Me',
            'Credentials',
            'Highlights',
            'Closing CTA',
        ],
        'about' => [
            'Hero',
            'My Professional Journey',
            'Work Today',
            'Professional Background',
            'Why It Matters',
            'Writing Media Authorship',
            'Closing Note',
        ],
        'services' => [
            'Hero',
            'Pillars',
            'How I Work',
            'Who I Work With',
            'Closing CTA',
            'Regulatory',
        ],
        'insights' => [
            'Hero',
            'What Youll Find',
            'Topics',
            'Closing CTA',
        ],
        'media' => [
            'Hero',
            'Appearances',
            'Closing CTA',
        ],
        'books' => [
            'Hero',
            'Featured Book',
            'What the Book Covers',
            'Why & Covers',
            'Closing CTA',
        ],
        'resources' => [
            'Hero',
            'QR Companion',
            'What You Will Find',
            'Note',
            'Closing CTA',
        ],
        'testimonials' => [
            'Hero',
            'Experiences',
            'Hope',
        ],
        'contact' => [
            'Hero',
            'Office',
            'Closing',
        ],
        'settings' => [
            'Contact & Social',
            'Branding',
        ],
    ];

    public function index(Request $request): View
    {
        $query = SiteContent::query()->orderBy('page')->orderBy('section')->orderBy('sort');

        if ($request->filled('page')) {
            $query->where('page', $request->page);
        }

        $groups = $query->get()->groupBy('page')->map(function (Collection $items, string $page) {
            $sections = $items->groupBy('section');
            $order = self::SECTION_ORDER[$page] ?? [];

            // Sections appear in website order; unlisted ones follow at the
            // end in their original (alphabetical) order — sort is stable.
            return $sections->sortBy(function ($items, string $section) use ($order) {
                $index = array_search($section, $order, true);

                return $index === false ? PHP_INT_MAX : $index;
            });
        });

        $order = ['home', 'about', 'services', 'insights', 'media', 'books', 'testimonials', 'resources', 'contact', 'settings'];
        $groups = $groups->sortBy(fn ($items, $page) => in_array($page, $order, true) ? array_search($page, $order, true) : 99);

        return view('admin.content', ['groups' => $groups, 'only' => $request->query('page')]);
    }

    public function update(Request $request): RedirectResponse
    {
        $page = $request->input('page');
        $values = $request->input('values', []);

        foreach ($values as $key => $value) {
            SiteContent::query()->where('page', $page)->where('key', $key)->update(['value' => $value]);
        }

        return back()->with('status', ucfirst($page).' content saved.');
    }
}
