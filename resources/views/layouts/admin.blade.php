<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — Money Maze</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root { --forest:#133d34; --forest-2:#204d40; --gold:#c8a25a; --gold-dark:#a77e39; --ivory:#f7f4ee; --line:#e2dccf; --ink:#2a2a2a; --muted:#6e6e68; }
        * { box-sizing:border-box; } body { margin:0; font-family:'Segoe UI',Arial,sans-serif; background:var(--ivory); color:var(--ink); font-size:14px; }
        a { color:inherit; text-decoration:none; }
        .adm-wrap { display:grid; grid-template-columns:240px 1fr; min-height:100vh; }
        .adm-side { background:var(--forest); color:#e8e2d4; padding:22px 0; position:sticky; top:0; height:100vh; }
        .adm-brand { display:flex; gap:10px; align-items:center; padding:0 20px 20px; border-bottom:1px solid rgba(255,255,255,.12); }
        .adm-brand img { height:55px; filter:brightness(-1); }
        .adm-brand b { font-size:15px; letter-spacing:.06em; color:#fff; display:block; }
        .adm-brand small { color:var(--gold); font-size:10px; letter-spacing:.12em; text-transform:uppercase; }
        .adm-nav { padding:16px 0; }
        .adm-nav a { display:flex; gap:10px; align-items:center; padding:11px 22px; color:#cfd8cd; font-size:13px; border-left:3px solid transparent; }
        .adm-nav a:hover { background:rgba(255,255,255,.06); color:#fff; }
        .adm-nav a.on { background:rgba(200,162,90,.14); border-left-color:var(--gold); color:#fff; }
        .adm-nav .dot { width:7px; height:7px; border-radius:50%; background:var(--gold); opacity:.85; }
        .adm-main { padding:26px 34px 60px; }
        .adm-top { display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; }
        .adm-top h1 { font-size:20px; margin:0; color:var(--forest); }
        .adm-top .acts { display:flex; gap:10px; }
        .btn { display:inline-flex; gap:8px; align-items:center; border-radius:6px; padding:9px 16px; font-size:12px; font-weight:700; border:1px solid transparent; cursor:pointer; }
        .btn-gold { background:var(--gold-dark); color:#fff; } .btn-gold:hover { background:#8f6a2c; }
        .btn-green { background:var(--forest); color:#fff; } .btn-green:hover { background:var(--forest-2); }
        .btn-line { border-color:var(--forest); color:var(--forest); background:#fff; }
        .btn-danger { border-color:#b3452e; color:#b3452e; background:#fff; }
        .card { background:#fff; border:1px solid var(--line); border-radius:10px; padding:22px; margin-bottom:20px; }
        .card h2 { margin:0 0 4px; font-size:15px; color:var(--forest); }
        .card .sub { color:var(--muted); font-size:12px; margin:0 0 16px; }
        .stats { display:grid; grid-template-columns:repeat(6,1fr); gap:14px; margin-bottom:22px; }
        .stat { background:#fff; border:1px solid var(--line); border-radius:10px; padding:16px; }
        .stat b { display:block; font-size:22px; color:var(--forest); }
        .stat span { font-size:11px; color:var(--muted); letter-spacing:.06em; text-transform:uppercase; }
        table { width:100%; border-collapse:collapse; font-size:13px; }
        th { text-align:left; font-size:10.5px; letter-spacing:.08em; text-transform:uppercase; color:var(--muted); padding:8px 10px; border-bottom:1px solid var(--line); }
        td { padding:10px; border-bottom:1px solid #efeadd; vertical-align:top; }
        .pill { display:inline-block; border-radius:999px; padding:3px 10px; font-size:10.5px; font-weight:700; background:#eef1e9; color:var(--forest); }
        label { display:block; font-size:12px; font-weight:700; color:var(--forest); margin:0 0 12px; }
        label span { display:block; font-weight:400; color:var(--muted); font-size:11px; margin-bottom:5px; }
        input[type=text], input[type=email], input[type=password], input[type=date], input[type=number], input[type=url], select, textarea { width:100%; border:1px solid var(--line); border-radius:6px; padding:9px 11px; font:inherit; background:#fdfcf9; }
        textarea { min-height:90px; resize:vertical; }
        .grid2 { display:grid; grid-template-columns:1fr 1fr; gap:0 18px; }
        .flash { background:#eef7ec; border:1px solid #b3cfaa; color:#315a37; border-radius:8px; padding:10px 14px; margin-bottom:18px; font-size:13px; }
        .err { background:#fff2ef; border:1px solid #d99c91; color:#8e3e32; border-radius:8px; padding:10px 14px; margin-bottom:18px; font-size:13px; }
        .row-acts { display:flex; gap:8px; }
        @media (max-width:900px){
            .adm-wrap{grid-template-columns:1fr;}
            .adm-side{position:static;height:auto;padding:12px 0;}
            .adm-brand{padding:4px 16px 12px;} .adm-brand img{height:40px;}
            .adm-nav{display:flex;overflow-x:auto;padding:2px 10px 8px;gap:2px;-webkit-overflow-scrolling:touch;}
            .adm-nav a{flex:0 0 auto;padding:9px 14px;border-left:0;border-bottom:3px solid transparent;border-radius:6px 6px 0 0;}
            .adm-nav a.on{border-left-color:transparent;border-bottom-color:var(--gold);}
            .adm-main{padding:18px 16px 50px;}
            .adm-top{flex-wrap:wrap;gap:10px;}
            .adm-top .acts{flex-wrap:wrap;}
            .stats{grid-template-columns:repeat(3,1fr);}
            .grid2{grid-template-columns:1fr;}
        }
        @media (max-width:600px){
            .stats{grid-template-columns:1fr 1fr;}
            .adm-top h1{font-size:18px;}
            .card{padding:14px;}
            .card table{display:block;overflow-x:auto;-webkit-overflow-scrolling:touch;}
            .jump-bar a{padding:6px 10px;}
        }
    
        .up-zone { border: 2px dashed #c8a25a; border-radius: 10px; padding: 14px; display: flex; gap: 12px; align-items: center; cursor: pointer; background: #fdfcf9; margin-bottom: 8px; transition: background .2s, border-color .2s; }
        .up-zone:hover, .up-zone.up-drag { background: #f6efdd; border-color: #a77e39; }
        .up-preview { width: 72px; height: 52px; border-radius: 6px; background: #eceae4 center / cover no-repeat; flex: 0 0 auto; border: 1px solid var(--line); }
        .up-hint { font-size: 11px; color: #6e6e68; font-weight: 400; }
        .up-zone.up-loading { opacity: .6; pointer-events: none; }

        a.stat { display: block; color: inherit; text-decoration: none; cursor: pointer; }
        a.stat:hover { border-color: #a77e39; box-shadow: 0 8px 20px rgba(0,0,0,.07); transform: translateY(-2px); }
        .msg-scroll { max-height: 130px; overflow-y: auto; overflow-x: hidden; white-space: pre-line; overflow-wrap: anywhere; word-break: break-word; padding-right: 8px; }
        .card table.msg-table { table-layout: fixed; width: 100%; }
        .card table.msg-table th:nth-child(1) { width: 170px; }
        .card table.msg-table th:nth-child(2) { width: 120px; }
        .card table.msg-table th:nth-child(4) { width: 90px; }
        .card table.msg-table td { overflow: hidden; }
        .row-acts { display:flex; gap:8px; flex-wrap:nowrap; white-space:nowrap; }
        .row-acts .btn { padding:7px 12px; }
        td.actions { white-space:nowrap; width:1%; }
        .msg-scroll::-webkit-scrollbar { width: 6px; }
        .msg-scroll::-webkit-scrollbar-thumb { background: #cfc8b8; border-radius: 6px; }

        .jump-bar { position: sticky; top: 0; z-index: 20; background: #f7f4ee; padding: 10px 0; display: flex; flex-wrap: wrap; gap: 8px; border-bottom: 1px solid #e2dccf; margin-bottom: 18px; }
        .jump-bar a { background: #fff; border: 1px solid #e2dccf; border-radius: 999px; padding: 6px 14px; font-size: 11px; font-weight: 700; color: #133d34; text-decoration: none; }
        .jump-bar a:hover { border-color: #a77e39; color: #a77e39; }
        .content-page-block { scroll-margin-top: 70px; }
        .page-block-title { margin: 26px 0 10px; font-size: 12px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: #a77e39; }
        .img-field { border-top:1px dashed var(--line); margin-top:14px; padding-top:14px; }
        .img-field .img-label { display:block; font-size:12.5px; font-weight:600; color:var(--forest); margin-bottom:8px; }
        .img-field .img-label small { color:var(--muted); font-weight:400; margin-left:6px; }
        .img-preview-box { margin-bottom:8px; }
        .img-preview-box img { max-width:240px; max-height:160px; border-radius:8px; border:1px solid var(--line); display:block; }
        .img-none { color:var(--muted); font-size:12px; }
        .img-path { display:block; margin-top:6px; font-size:11px; color:var(--muted); }
        .field-hint { display:block; margin:4px 0 10px; font-size:11px; font-weight:400; color:var(--muted); }
    </style>
</head>
<body>
<div class="adm-wrap">
    <aside class="adm-side">
        <div class="adm-brand">
            <img loading="lazy" decoding="async" src="{{ asset('assets/mm-logo.png') }}" alt="Money Maze">
        </div>
        <nav class="adm-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'on' : '' }}"><span class="dot"></span> Dashboard</a>
            <a href="{{ route('admin.content') }}" class="{{ request()->routeIs('admin.content') ? 'on' : '' }}"><span class="dot"></span> Page Content</a>
            <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'on' : '' }}"><span class="dot"></span> Articles</a>
            <a href="{{ route('admin.media.index') }}" class="{{ request()->routeIs('admin.media.*') ? 'on' : '' }}"><span class="dot"></span> Media &amp; Features</a>
            <a href="{{ route('admin.books.index') }}" class="{{ request()->routeIs('admin.books.*') ? 'on' : '' }}"><span class="dot"></span> Books</a>
            <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'on' : '' }}"><span class="dot"></span> Testimonials</a>
            <a href="{{ route('admin.links.index') }}" class="{{ request()->routeIs('admin.links.*') ? 'on' : '' }}"><span class="dot"></span> Navigation Links</a>
            <a href="{{ route('admin.messages') }}" class="{{ request()->routeIs('admin.messages') ? 'on' : '' }}"><span class="dot"></span> Messages</a>
            <a href="{{ route('admin.content', ['page' => 'settings']) }}" class="{{ request()->routeIs('admin.content') && request()->query('page') === 'settings' ? 'on' : '' }}"><span class="dot"></span> Settings</a>
        </nav>
    </aside>
    <main class="adm-main">
        <div class="adm-top">
            <h1>@yield('heading', 'Dashboard')</h1>
            <div class="acts">
                <span style="font-size:12px;color:#6e6e68;align-self:center;">Signed in as {{ auth()->user()?->name ?? 'Admin' }}</span>
                <a class="btn btn-line" href="{{ url('/') }}">View site</a>
                <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-danger">Log out</button></form>
            </div>
        </div>
        @if (session('status'))<div class="flash">{{ session('status') }}</div>@endif
        @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
        @if (! request()->routeIs('admin.dashboard'))
        <div class="flash" style="background:#f4f1e8;border-color:#d8d2c2;color:#6e6e68;margin-bottom:16px;">Changes save to the database and appear instantly on the live Laravel site (the static design preview does not read the database).</div>
    @endif
        @yield('content')
    </main>
</div>
<script>
(function () {
    function initUploads() {
        document.querySelectorAll('[data-upload]').forEach(function (zone) {
            var target = document.getElementById(zone.dataset.target);
            var preview = zone.querySelector('.up-preview');
            var input = zone.querySelector('input[type=file]');
            if (target && target.value && preview) preview.style.backgroundImage = "url('/" + target.value + "')";
            function send(file) {
                if (!file || !file.type || file.type.indexOf('image/') !== 0) return;
                var fd = new FormData();
                fd.append('image', file);
                zone.classList.add('up-loading');
                fetch(zone.dataset.upload, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content, 'Accept': 'application/json' },
                    body: fd
                }).then(function (r) { return r.json(); }).then(function (d) {
                    zone.classList.remove('up-loading');
                    if (d && d.path) {
                        target.value = d.path;
                        preview.style.backgroundImage = "url('" + d.url + "')";
                    }
                }).catch(function () { zone.classList.remove('up-loading'); });
            }
            zone.addEventListener('click', function () { input.click(); });
            input.addEventListener('change', function () { send(input.files[0]); });
            ['dragover', 'dragenter'].forEach(function (e) { zone.addEventListener(e, function (ev) { ev.preventDefault(); zone.classList.add('up-drag'); }); });
            ['dragleave', 'drop'].forEach(function (e) { zone.addEventListener(e, function (ev) { ev.preventDefault(); zone.classList.remove('up-drag'); }); });
            zone.addEventListener('drop', function (ev) { send(ev.dataTransfer.files[0]); });
        });
    }
    document.addEventListener('DOMContentLoaded', initUploads);
})();
</script>
</body>
</html>
