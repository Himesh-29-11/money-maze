@extends('layouts.admin')
@section('title', 'Page Content')
@section('heading', 'Page Content')
@section('content')
<div class="jump-bar">
    @foreach ($groups as $page => $sections)
        <a href="#page-{{ $page }}">{{ ucfirst(str_replace('_', ' ', $page)) }}</a>
    @endforeach
</div>
@forelse ($groups as $page => $sections)
    <div id="page-{{ $page }}" class="content-page-block">
        <div class="page-block-title">{{ ucfirst($page) }} page</div>
        @foreach ($sections as $section => $items)
        <div class="card">
            <h2>{{ $section }}</h2>
            <form method="POST" action="{{ route('admin.content.update') }}">
                @csrf
                <input type="hidden" name="page" value="{{ $page }}">
                @foreach ($items as $item)
                    @if ($item->type === 'image')
                        <div class="img-field">
                            <span class="img-label">{{ $item->label }}</span>
                            <input type="hidden" name="values[{{ $item->key }}]" value="{{ $item->value }}">
                            <div class="img-preview-box">
                                @if ($item->value)
                                    <img src="{{ asset($item->value) }}" alt="{{ $item->label }}">
                                @else
                                    <span class="img-none">No image yet</span>
                                @endif
                            </div>
                            <div class="img-actions">
                                <button type="button" class="btn btn-green img-upload-btn">Upload new image</button>
                                <input type="file" accept="image/jpeg,image/png,image/webp,image/gif" class="img-file" hidden>
                            </div>
                            <span class="img-path">{{ $item->value ? 'Custom image saved' : 'Using default image' }}</span>
                        </div>
                    @else
                        <label>{{ $item->label }}
                            @if ($item->type === 'textarea')
                                <textarea name="values[{{ $item->key }}]">{{ \App\Support\ContentText::toPlainText($item->value) }}</textarea>
                                <small class="field-hint">Plain text only — start a line with “- ” to make a bullet list.</small>
                            @else
                                <input type="text" name="values[{{ $item->key }}]" value="{{ \App\Support\ContentText::toPlainText($item->value) }}">
                            @endif
                        </label>
                    @endif
                @endforeach
                <button class="btn btn-green" type="submit">Save {{ $section }}</button>
            </form>
        </div>
        @endforeach
    </div>
@empty
<div class="card"><p class="sub">Run <code>php artisan migrate --seed</code> to load editable content.</p></div>
@endforelse
<script>
document.addEventListener('click', (e) => {
    const btn = e.target.closest('.img-upload-btn');
    if (btn) btn.closest('.img-field').querySelector('.img-file').click();
});
document.addEventListener('change', async (e) => {
    const input = e.target.closest('.img-file');
    if (!input || !input.files || !input.files.length) return;
    const field = input.closest('.img-field');
    const fd = new FormData();
    fd.append('image', input.files[0]);
    const btn = field.querySelector('.img-upload-btn');
    btn.disabled = true;
    btn.textContent = 'Uploading…';
    try {
        const res = await fetch('{{ route('admin.upload') }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept': 'application/json' },
            body: fd,
        });
        if (!res.ok) { alert('Upload failed — please use a jpg/png/webp image under 5 MB.'); return; }
        const data = await res.json();
        field.querySelector('input[name^="values"]').value = data.path;
        let img = field.querySelector('.img-preview-box img');
        if (!img) { field.querySelector('.img-preview-box').innerHTML = '<img alt="">'; img = field.querySelector('.img-preview-box img'); }
        img.src = data.url;
        field.querySelector('.img-path').textContent = 'New image ready — press Save';
    } finally {
        btn.disabled = false;
        btn.textContent = 'Upload new image';
        input.value = '';
    }
});
</script>
@endsection
