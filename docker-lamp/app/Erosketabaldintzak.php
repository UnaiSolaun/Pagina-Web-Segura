<?php
session_start();
$GureErabiltzaile = $_SESSION['izena'];

$conexion = mysqli_connect("db", "admin", "test", "database");
$erabiltzaile = "SELECT * FROM Erregistroa WHERE Erabiltzailea = '$GureErabiltzaile'"; 

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

header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
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
        <title>Gartxon S.L.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/baldintzak.css">
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
    
        <main>
            <div class="titulo">BALDINTZAK</div>
            <div class="europa">GARTXON ERABILTZEKO BALDINTZAK EUROPAKO HERRIALDEENTZAT</div>
            <div class="edukia">EDUKIA</div> 
            <a class="capitulos" href="#Prezioa">1- PREZIOA</a> 
            <br>
            <a class="capitulos" href="#Bidalketa">2- BIDALKETA</a>
            <br>
            <a class="capitulos" href="#Garantia">3- GARANTIA</a>
            <br>
            <a class="capitulos" href="#Segurtasuna">4- SEGURTASUNA</a>
            <br>
            <a class="margen" name="Prezioa" />
            <div class="titulillos"> 1- PREZIOA</div>
            <div class="texto">Pentsatzen duzuna baino askoz gutxiago ordaindu. Beste denda askotan baino askoz gutxiago ordainduko duzu. Izan ere, beherapen eta eskaintza ezinhobeak ditugu, zure gustukoak izango direnak seguruenik.</div>
            <a name="Bidalketa" />
            <div class="titulillos"> 2- BIDALKETA</div>
            <div class="texto">Bidalketak ordaintzeaz gu arduratuko gara. Horrela zuri guztiz doan aterako zaizu!.</div>
            <a name="Garantia" />
            <div class="titulillos"> 3- GARANTIA</div>
            <div class="texto">Gure produktu guztiek bi urteko garantia dute eta zerbait txarto egotekotan, aldatzen edo konpontzen dizugu egoeraren arabera!</div>
            <a name="Segurtasuna" />
            <div class="titulillos"> 4- SEGURTASUNA</div>
            <div class="texto">Segurua al da? Zure eskari guztien, fakturazio datuen eta bidalketen gaineko segurtasuna gordetzeko, kodetze industrial estandarrerako protokoloa erabiltzen dugu; hauek dira protokolo horren siglak: SSL (Secure Sockets Layer edo Konexio Segururako Geruza Protokoloa euskaraz).<br><br>

                Egiazta dezakezu zure nabigatzailea segurua dela giltzarrapoaren sinboloa agertzen bada eta ikus dezakezu, era berean, URLa zertxobait aldatu dela: ez da http hasten, https baizik.<br><br>
    
    Petritegik aukera ematen du txartelarekin ordaintzeko segurtasuna maximoa da. Gogoratu segurua ez balitz Petritegik ez lizukeela eskainiko.<br><br>
    
    Zalantzarik baduzu edo zeozer galdetu nahi badiguzu, gurekin egon besterik ez duzu: gartxon@gmail.com. Zeharo zure esanera gaude!</div>
            
        </main>
        <footer class="footer-container">
            <div class="ultimos-botones">
                <nav>
                    <ul>
                        <li><a href="https://twitter.com/gartxon?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @gartxon</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></li>
                    </ul>
                </nav> 
            </div>
            <div class="footer-container">
                <div class="img">
                    <img src="irudiak/footer1.png" style="width:100%" alt="Ordainketa segurua">
                </div>
                <div class="copyright">
                    &#169 Todos los Derechos Reservados |<a href="#">Gartxon</a>
                </div>
            </div>
        </footer>
    </body>
</html>