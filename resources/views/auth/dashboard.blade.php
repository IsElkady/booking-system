<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<form method="POST" action={{route("logout")}}>
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>
