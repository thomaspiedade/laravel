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

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div >
		<h1>Cadastro</h1>
		@if($errors->any())
		  <div class="errors">
		      <ul>
		          @foreach($errors->all() as $error)
		                <li>{{ $error }}</li>
		          @endforeach
		      </ul>
		  </div>
		@endif
		<div id="form">
			<form action="/register" method="post" name="form-cadastro" >
				Nome:
				<input type="text" name="name" id="name" value="{{Input::old('name')}}"> </br>
				Email:
				<input type="text" name="email" id="email" value="{{Input::old('email')}}"> </br>
				Senha:
				<input type="password" name="password" id="password"> </br>
				Re-Senha:
				<input type="password" name="password_confirmation" id="password_confirmation"> </br>
			
				<input type="submit" name="send" id="send" value="Enviar">
			</form>
		</div>
	</div>
</body>
</html>
