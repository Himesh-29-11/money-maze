<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login — Money Maze</title>
<style>
body{margin:0;min-height:100vh;display:grid;place-items:center;background:#133d34;font-family:'Segoe UI',Arial,sans-serif;}
.box{width:min(400px,92vw);background:#fdfcf9;border-radius:12px;padding:34px;}
.box img{height:44px;margin-bottom:18px;}
h1{font-size:18px;margin:0 0 4px;color:#133d34;} p{margin:0 0 20px;color:#6e6e68;font-size:12px;}
label{display:block;font-size:12px;font-weight:700;color:#133d34;margin-bottom:12px;}
input{width:100%;border:1px solid #e2dccf;border-radius:6px;padding:10px;font:inherit;margin-top:5px;}
button{width:100%;background:#a77e39;color:#fff;border:0;border-radius:6px;padding:12px;font-weight:700;cursor:pointer;}
.err{background:#fff2ef;border:1px solid #d99c91;color:#8e3e32;border-radius:8px;padding:9px 12px;margin-bottom:14px;font-size:12px;}
a{display:block;text-align:center;margin-top:14px;color:#a77e39;font-size:12px;}
</style>
</head>
<body>
<form class="box" method="POST" action="{{ route('admin.login.post') }}">
@csrf
<img src="{{ asset('assets/money-maze-logo.png') }}" alt="Money Maze">
<h1>Admin panel</h1>
<p>Sign in to manage content, articles, books, media and links.</p>
@if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
<label>Email<input type="email" name="email" value="{{ old('email') }}" required autofocus></label>
<label>Password<input type="password" name="password" required></label>
<button type="submit">Sign in</button>
<a href="{{ url('/') }}">← Back to website</a>
</form>
</body>
</html>
