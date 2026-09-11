<?php

namespace App\Http\Controllers;

use App\Support\PageDataService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(private PageDataService $pages) {}

    public function home(): View
    {
        return view('pages.home', $this->pages->shared());
    }

    public function about(): View
    {
        return view('pages.about', $this->pages->shared());
    }

    public function services(): View
    {
        return view('pages.services', $this->pages->shared());
    }

    public function insights(): View
    {
        return view('pages.insights', [
            ...$this->pages->shared(),
            'articles' => $this->pages->articlesPublic(),
        ]);
    }

    public function insightDetail(string $slug): View
    {
        $article = $this->pages->findArticle($slug);
        abort_unless($article, 404);

        return view('pages.insight-detail', [
            ...$this->pages->shared(),
            'article' => $article,
        ]);
    }

    public function media(): View
    {
        return view('pages.media', [
            ...$this->pages->shared(),
            'articles' => $this->pages->articlesPublic(),
        ]);
    }

    public function books(): View
    {
        return view('pages.books', $this->pages->shared());
    }

    public function resources(): View
    {
        return view('pages.resources', [
            ...$this->pages->shared(),
            'calculators' => $this->pages->calculators(),
            'checklists' => $this->pages->checklists(),
            'calculatorGroups' => $this->pages->calculatorGroups(),
            'checklistGroups' => $this->pages->checklistGroups(),
        ]);
    }

    public function testimonials(): View
    {
        return view('pages.testimonials', $this->pages->shared());
    }

    public function contact(): View
    {
        return view('pages.contact', $this->pages->shared());
    }

    public function calculator(string $slug): View
    {
        $calculator = $this->pages->findCalculator($slug);
        abort_unless($calculator, 404);

        return view('calculators.show', [
            ...$this->pages->shared(),
            'calculator' => $calculator,
        ]);
    }
}
