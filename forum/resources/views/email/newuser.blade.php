<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h1>Congratulations {{ $user->name }}!</h1>
<h3>Your account has been made.</h3>
<p>
	Kindly verify your email by clicking on this link <br />
	<a href="forum.app/register/{{ $user->id }}/{{ $user->token }}" >forum.app/register/{{ $user->id }}/{{ $user->token }}</a>
</p>
</body>
</html>