<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login — Money Maze</title>
<style>
body{margin:0;min-height:100vh;display:grid;place-items:center;background:#133d34;font-family:'Segoe UI',Arial,sans-serif;}
*,*::before,*::after{box-sizing:border-box;}
.box{width:min(400px,92vw);max-width:100%;background:#fdfcf9;border-radius:12px;padding:34px;}
.box img{height:44px;margin-bottom:18px;}
h1{font-size:18px;margin:0 0 4px;color:#133d34;} p{margin:0 0 20px;color:#6e6e68;font-size:12px;}
label{display:block;font-size:12px;font-weight:700;color:#133d34;margin-bottom:12px;}
input{width:100%;border:1px solid #e2dccf;border-radius:6px;padding:10px;font:inherit;margin-top:5px;}
.pw-wrap{position:relative;display:block;}
#password{padding-right:44px;}
.pw-toggle{position:absolute;right:5px;bottom:5px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;background:none;border:0;border-radius:6px;cursor:pointer;font-size:17px;line-height:1;color:#6e6e68;padding:0;}
.pw-toggle:hover{background:#f0ebdf;color:#133d34;}
button{width:100%;background:#a77e39;color:#fff;border:0;border-radius:6px;padding:12px;font-weight:700;cursor:pointer;}
.err{background:#fff2ef;border:1px solid #d99c91;color:#8e3e32;border-radius:8px;padding:9px 12px;margin-bottom:14px;font-size:12px;}
a{display:block;text-align:center;margin-top:14px;color:#a77e39;font-size:12px;}
</style>
</head>
<body>
<form class="box" method="POST" action="{{ route('admin.login.post') }}">
@csrf
<img loading="lazy" decoding="async" src="{{ asset(\App\Models\SiteContent::query()->where('page', 'settings')->where('key', 'footer_logo')->value('value') ?: 'assets/money-maze-logo.png') }}" alt="Money Maze">
<h1>Admin panel</h1>
<p>Sign in to manage content, articles, books, media and links.</p>
@if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
<label>Email<input type="email" name="email" value="{{ old('email') }}" required autofocus></label>
<label>Password
    <span class="pw-wrap">
        <input type="password" name="password" id="password" required autocomplete="current-password">
        <button type="button" class="pw-toggle" aria-label="Show password" aria-pressed="false" title="Show password">&#128065;</button>
    </span>
</label>
<button type="submit">Sign in</button>
<a href="{{ url('/') }}">← Back to website</a>
</form>
<script>
(function () {
    var pw = document.getElementById('password');
    var btn = document.querySelector('.pw-toggle');
    if (!pw || !btn) return;
    btn.addEventListener('click', function () {
        var show = pw.type === 'password';
        pw.type = show ? 'text' : 'password';
        btn.setAttribute('aria-pressed', String(show));
        btn.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        btn.title = show ? 'Hide password' : 'Show password';
        btn.innerHTML = show ? '&#128064;' : '&#128065;';
    });
})();
</script>
</body>
</html>
