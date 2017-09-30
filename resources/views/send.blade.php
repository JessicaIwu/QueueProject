<!DOCTYPE html>
<html>
<head>
	<title>Email App</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="/css/email.css">
</head>
<body>
<div class="div">
<h4> The Email App </h4>
<form method="post" action="{{ route('receive') }}">
	<input type="email" name="email" value="" placeholder="Email:">
	<input type="text" name="name" value="" placeholder="Message:">
	<input type="submit" value="submit">
	{{csrf_field()}}
</form>
</div>
</body>
</html>

