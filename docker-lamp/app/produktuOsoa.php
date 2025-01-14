<?php
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    session_start();

    $conn = new mysqli($hostname,$username,$password,$db);

    $conn->set_charset('utf8');

    $ProduktuKode = $conn->real_escape_string($_GET["kodea"]);
    $_SESSION["kode"] = $ProduktuKode;
    $Kode = $_SESSION["kode"];
    $kontsulta = "SELECT * FROM Produktuak WHERE Kodea = ?"; 

    /*if(isset($_SESSION['denbora']) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 5;//20min en este caso.
    
        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['denbora'];
    
            //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
            if($vida_session > $inactivo)
            {
                //Removemos sesión.
                session_unset();
                //Destruimos sesión.
                session_destroy();              
                //Redirigimos pagina.
                echo "<script>alert('Saioa itxi egin da');window.location.href='index.php'</script>";       
                exit();
            }
    }*/
    
?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
        function start() {
            time= setTimeout('location="cerrarSesion.php"',10000);
        }
        function salir() {
            clearTimeout(time);
            time= setTimeout('location="cerrarSesion.php"',10000);
        }
    </script>
    <head>
        <title>Gartxon S.L</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width", user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0>
        <link rel="stylesheet" type="text/css" href="./CSS/produktuOsoa.css">
        <link rel="shortcut icon" href="irudiak/Favicon.ico" type="image/x-icon">
    </head>
    <?php

    if(isset($_SESSION['izena'])) {
        echo"<body onload='start()' onkeypress='salir()' onclick='salir()'>";
    } else {
        echo"<body>";
    }
    ?>
        <header class="header">
            <br>
            <div class="conimg">
                <a href="index.php" target="_self" target="_blank"><img class="logo-principal" src="irudiak/gartxon1.jpg" alt="Gartxon S.L."></a>
            </div>
            <br>
        </header>

        <div class="container-table">
            <div class="table__title">Erabiltzaileen produktuak</div>
            <div class="table__header">Kodea</div>
            <div class="table__header">Izena</div>
            <div class="table__header">Mota</div>
            <div class="table__header">Deskribapena</div>
            <div class="table__header">Prezioa</div>
            <div class="table__header"></div>
            <div class="table__header"></div>
            <?php $kontsultaBerria = $conn->prepare($kontsulta);
            $kontsultaBerria->bind_param('s', $Kode);
            $kontsultaBerria->execute();
            $emaitza = $kontsultaBerria->get_result();
            while($row = $emaitza->fetch_row()){?>
            <div class="table__item"><?php echo $row[0];?></div>
            <div class="table__item"><?php echo $row[1];?></div>
            <div class="table__item"><?php echo $row[2];?></div>
            <div class="table__item"><?php echo $row[3];?></div>
            <div class="table__item"><?php echo $row[4];?></div>
            <div class="table__item"><a href='produktuaAldatu.php'>Editatu</a></div>
            <div class="table__item"><a href='#' onclick="galdetu(<?php echo[0]?>)">Ezabatu</a></div>
            <?php } $kontsultaBerria->close();?>
        </div>
                <script type="text/javascript">
                    function galdetu(id)
                    {
                        if(confirm("Ziur zaude ezabatu nahi duzula?"))
                        {
                            window.location.href = "produktuaEzabatu.php"
                        }
                    }
                </script>
        <footer>
            <div class="copyright">
                &#169 Todos los Derechos Reservados |<a href="index.php">Gartxon</a>
            </div>
        </footer>
    </body>
</html>