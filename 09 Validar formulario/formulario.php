<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validar formulario</title>
	<style>
		body{background-color: #264673; box-sizing: border-box; font-family: Arial;}

		form{
			background-color: white;
			padding: 10px;
			margin: 100px auto;
			width: 400px;
		}

		input[type=text], input[type=password]{
			padding: 10px;
			width: 380px;
		}
		input[type="submit"]{
			border: 0;
			background-color: #ED8824;
			padding: 10px 20px;
		}

		.error{
			background-color: #FF9185;
			font-size: 12px;
			padding: 10px;
		}
		.correcto{
			background-color: #A0DEA7;
			font-size: 12px;
			padding: 10px;
		}
	</style>
</head>
<body>
	<form action="formulario.php" method="POST">
		<?php
			$nombre="";
			$password="";
			$email=""; 
			$pais="";
			$nivel="";
			if(isset($_POST['nombre'])){
				$nombre = $_POST['nombre'];
				$password = $_POST['password'];
				$email = $_POST['email'];
				$pais= $_POST['pais'];
				
				$campos = array();
				if(isset($_POST['nivel'])){
					$nivel=$_POST['nivel'];
				}
				else{
					$nivel="";
				}
				if($nombre == ""){
					array_push($campos, "El campo Nombre no pude estar vacío");
				}

				if($password == "" || strlen($password) < 6){
					array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 6 caracteres.");
				}

				if($email == "" || strpos($email, "@") === false){
					array_push($campos, "Ingresa un correo electrónico válido.");
				}

				if($pais==""){
					array_push($campos,"Selecione un pais");
				}
				if($nivel==""){
					array_push($campos,"Selecione un nivel de desarrollo");
				}
				if(count($campos) > 0){
					echo "<div class='error'>";
					for($i = 0; $i < count($campos); $i++){
						echo "<li>".$campos[$i]."</i>";
					}
				}else{
					echo "<div class='correcto'>
							Datos correctos";
				}
				echo "</div>";
			}
		?>
		<p>
		Nombre:<br/>
		<input type="text" name="nombre" value="<?php echo $nombre;?>">
		</p>

		<p>
		Password:<br/>
		<input type="password" name="password" value="<?php echo $password;?>">
		</p>

		<p>
		correo electrónico:<br/>
		<input type="text" name="email" value="<?php echo $email;?>">
		</p>
		<p>
			Pais de origen<br/>
			<select name="pais" id="">
				<option value="">Selecione un país</option>
				<option value="mx"<?php if($pais== "mx") echo "selected"?> >México</option>
				<option value="eu"<?php if($pais== "eu") echo "selected"?> >Estados unidos</option>

			</select>		
		</p>	
		<p>
			Nivel de desarrollo <br>
			<input type="radio" name="nivel" value="principiante" <?php if($nivel== "principiante") echo "checked"?>>principiante
			<input type="radio" name="nivel" value="Intermedio" <?php if($nivel== "Intermedio") echo "checked"?>>intermedio
			<input type="radio" name="nivel" value="avanzado" <?php if($nivel== "avanzado") echo "checked"?>>avanzado
		</p>
		<p><input type="submit" value="enviar datos"></p> 
	</form>
</body>
</html>