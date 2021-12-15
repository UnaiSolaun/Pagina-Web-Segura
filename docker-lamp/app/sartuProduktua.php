<?php
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>insertarProducto</title>
	<link rel="stylesheet" href="CSS/estilo.css">
	<script src="js/sartuProduktu.js"></script>
	<link rel="shortcut icon" href="irudiak/Favicon.ico" type="image/x-icon">
</head>
<body>
	<header class="header">
		<div class="container logo-nav-container">
			<a href="index.html" target="_self" target="_blank"><img class="logo-principal" src="irudiak/gartxon1.jpg" alt="Gartxon S.L."></a>
			<nav class="navigation">
				<ul>
					<li><a href="erregistratu.html" target="_self">ERREGISTRATU</a></li> 
                    <li><a href="Hasisaioa.html" target="_self">HASI SAIOA</a></li> 
				</ul>
			</nav>                    
		</div>
	</header>
	
	<main>
		<div class="alerta" id="alerta"></div>
		<br>
		<form name = "addForm" class="formulario" id="formulario" action="produktuaSartu.php" method="post">
			<legend class= "Txertatu" style="font-size: 24px;"><strong>Txertatu produktua:</strong></legend>
			<br>
			<!-- Grupo: izena -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Izena</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="izena" id="nombre" placeholder="Sansumg Galaxy 8">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
			</div>

			<!-- Grupo: mota-->
			<div class="formulario__grupo" id="grupo__mota">
				<label for="mota" class="formulario__label">Mota</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="mota" id="mota" placeholder="Mugikorra">
				</div>
			</div>

			<!-- Grupo: deskribapena -->
			<div class="formulario__grupo" id="grupo__deskribapena">
				<label for="deskribapena" class="formulario__label">Deskribapena</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="deskribapena" id="deskribapena" placeholder="Mugikor oso ona eta merkea">
				</div>
			</div>

			<!-- Grupo: prezio-->
			<div class="formulario__grupo" id="grupo__prezio">
				<label for="prezio" class="formulario__label">Prezio</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="prezio" id="prezio" placeholder="199.99">
				</div>
			</div>
				
			<!-- Boton Enviar-->
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="button" onclick= "validarTxertatu();" class="formulario__btn" value="sartuProduktua">Txertatu</button>
			</div>   
		</form>
	</main>
</body>
</html>