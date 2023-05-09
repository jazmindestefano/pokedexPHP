<?php
	session_start();
	if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] !== true) {
		header("Location: ../index.php");
		exit;
	}

	$servername = "localhost";
	$username = "root";
	$password = '';
	$database = "pokemon";

	$conn = new mysqli($servername, $username, $password, $database) or die();

	$id = $_GET['id'];
	$sql = "SELECT * FROM pokemones WHERE idPokemon = $id";
	$result = $conn->query($sql);
	$resultado = $result->fetch_assoc();
	$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Pokémon</title>
    <link rel="stylesheet" href="pokemon-detalle.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="logo.png" alt="Logo">
        <h1>Pokédex</h1>
    </div>
    <nav>
        <ul>
            <li><a href="../dashboard/dashboard.php">Inicio</a></li>
            <li><a class="logout-button" href="../index.php">Log out <img class="logout-icon" src="../images/logout.png" alt=""></a>
            </li>

        </ul>
    </nav>
</header>
<main>
    <h2>Detalle de Pokémon</h2>
    <div class="pokemon-detail">
        <div class="pokemon-image">
            <?php
            echo "<img src='../images/". $resultado['nombre'] . ".jpg' alt='". $resultado['nombre'] ."'>"
            ?>
        </div>
        <div class="pokemon-info">
					<?php
						echo "<h1 class='pokemon-name'>" . $resultado['nombre'] . "</h1>";
						echo "<p class='pokemon-description'>" . $resultado['descripcion'] . "</p>";
					?>
        </div>
    </div>
</main>
</body>
</html>
