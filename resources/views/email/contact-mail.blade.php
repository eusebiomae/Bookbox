<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-mail de Contato</title>
</head>
<body>
	<ul>
		<li>{{ $payload['name'] }}</li>
		<li>{{ $payload['email'] }}</li>
		<li>{{ $payload['phone'] }}</li>
		<li>{{ $payload['message'] }}</li>
	</ul>
</body>
</html>
