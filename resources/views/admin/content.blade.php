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
            <p class="sub">Module: {{ $page }} / {{ $section }}</p>
            <form method="POST" action="{{ route('admin.content.update') }}">
                @csrf
                <input type="hidden" name="page" value="{{ $page }}">
                @foreach ($items as $item)
                    @if ($item->type === 'image')
                        <div class="img-field">
                            <span class="img-label">{{ $item->label }} <small>{{ $page }}.{{ $item->key }}</small></span>
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
                            <span class="img-path">{{ $item->value ?: 'using default image' }}</span>
                        </div>
                    @else
                        <label>{{ $item->label }} <small>{{ $page }}.{{ $item->key }}</small>
                            @if ($item->type === 'textarea')
                                <textarea name="values[{{ $item->key }}]">{{ $item->value }}</textarea>
                            @else
                                <input type="text" name="values[{{ $item->key }}]" value="{{ $item->value }}">
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
        field.querySelector('.img-path').textContent = data.path + ' (saved when you press Save)';
    } finally {
        btn.disabled = false;
        btn.textContent = 'Upload new image';
        input.value = '';
    }
});
</script>
@endsection
