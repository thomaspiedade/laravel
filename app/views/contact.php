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
		<h1>Contato</h1>
		<?php

		$sent    = Session::get('sent');
		$status  = Session::get('status');
		$message = Session::get('message');

		if(isset($sent)){
			if($status == 'success'){
				echo $message;			
			}else{
				echo $errors->first('name', 'O campo nome é obrigatório<br>'); 
				echo $errors->first('email', 'O campo email é obrigatório<br>');
				//echo $errors->second('email','O campo email não é valido');
				echo $errors->first('name', 'O campo messagem é obrigatório<br>');
			} 
		}
		?>
		<div id="form">
			<form method="post" name="form-contato" >
				Nome:
				<input type="text" name="name" id="name" > </br>
				Email:
				<input type="text" name="email" id="email"> </br>
				Menssagem:
				<textarea name="text" id="text"></textarea> </br>

				<input type="submit" name="send" id="send" value="Enviar">
			</form>
		</div>
	</div>
</body>
</html>
