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
		
		if(isset($contacts)){
		?>
			<div id="form">
		<?php
		foreach($contacts as $contact){
			echo $contact->name . ' - ' . $contact->email . '<br>';
		}
		?>

			</div>
		<?php
		}else{
			echo 'Nenhum contato recebido!';	
		}
		?>

	</div>
</body>
</html>
