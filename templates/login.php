<html>
<head>
	<title>E-Commerce Hotel - Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		a:visited {
			color: white;
		}
	</style>
</head>

<body>
<div class="container">
<h1>Login please</h1>
<form method="post" action="{{url_for('check')}}">
	<div class="form-group">
    <label for="postEmail">Email:</label>
    <input type="text" class="form-control" id="postEmail" name="postEmail">
  </div>
  <div class="form-group">
    <label for="postPassword">Password:</label>
    <input type="password" class="form-control" id="postPassword" name="postPassword">
  </div>
  <button type="submit" class="btn btn-default">Login</button>
</form>
</div>

</body>
</html>