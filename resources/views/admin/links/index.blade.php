@extends('layouts.admin')
@section('title', 'Navigation Links')
@section('heading', 'Navigation Links')
@section('content')
<div class="card">
    <h2>Header / footer links</h2>
    <p class="sub">These links power the site navigation on every page.</p>
    <table>
        <tr><th>Label</th><th>URL</th><th>Sort</th><th>Visible</th><th></th></tr>
        @foreach ($links as $l)
        <tr>
            <form method="POST" action="{{ route('admin.links.update', $l) }}">@csrf @method('PUT')
            <td><input type="text" name="label" value="{{ $l->label }}"></td>
            <td><input type="text" name="url" value="{{ $l->url }}"></td>
            <td><input type="number" name="sort" value="{{ $l->sort }}" style="width:70px;"></td>
            <td><input type="hidden" name="active" value="0"><input type="checkbox" name="active" value="1" style="width:auto;" {{ $l->active ? 'checked' : '' }}></td>
            <td><div class="row-acts"><button class="btn btn-green">Save</button>
            </form>
            <form method="POST" action="{{ route('admin.links.destroy', $l) }}">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form></div></td>
        </tr>
        @endforeach
    </table>
</div>
<div class="card">
    <h2>Add a link</h2>
    <form method="POST" action="{{ route('admin.links.store') }}">
    @csrf
    <div class="grid2">
        <label>Label<input type="text" name="label" required></label>
        <label>URL<input type="text" name="url" required placeholder="/services"></label>
        <label>Sort order<input type="number" name="sort" value="0"></label>
    </div>
    <button class="btn btn-gold">Add link</button>
    </form>
</div>
@endsection
