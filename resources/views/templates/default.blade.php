<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ResearchHub</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	@include('templates.partials.navigation')
	<div class="container">
		@yield('content')
	</div>
</body>
</html>