<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.users {
			position: absolute;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
		}
	</style>
</head>
<body>
	<div >
		<h1>Usuários Cadastrados</h1>
			<div class="users">
		      <ul>
		          @foreach($users as $user)
		                <li>
		                	<a href="remove/{{ $user->id }}" title="Remover usuário {{ $user->name }}">Excluir</a> - 
		                	<a href="edit/{{ $user->id }}" title="Editar usuário {{ $user->name }}">Editar</a>
		                	{{ $user->name }}		                	
		                </li>
		          @endforeach
		      </ul>
		  </div>
	</div>
</body>
</html>
