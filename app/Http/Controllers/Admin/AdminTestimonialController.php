<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTestimonialController extends Controller
{
    public function index(): View
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::query()->orderBy('sort')->get()]);
    }

    public function create(): View
    {
        return view('admin.testimonials.form', ['testimonial' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        Testimonial::query()->create($this->validated($request));

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($this->validated($request));

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'quote' => ['required', 'string'],
            'author' => ['required', 'string', 'max:120'],
            'role' => ['nullable', 'string', 'max:120'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'sort' => ['nullable', 'integer'],
        ]);
    }
}
