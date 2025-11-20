<?php
include_once "Videoclub.php"; // No incluimos nada más

$vc = new Videoclub("Severo 8A");

//voy a incluir unos cuantos soportes de prueba
echo "<font color=\"red\"><b>Incluyo unos soportes de prueba</font></b></br>";
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es","16:9");
$vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9");
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

//listo los productos
echo "<font color=\"red\"><b>Los listo</b></font></br>";
$vc->listarProductos();
echo "</br>";

//voy a crear algunos socios
echo "<font color=\"red\"><b>Creo 2 Socios</b></font></br>";
$vc->incluirSocio("Amancio Ortega",2);
$vc->incluirSocio("Pablo Picasso", 2);
echo "</br>";

echo "<font color=\"red\"><b>Alquilo al cliente 1, el soporte 2</b></font></br>";
$vc->alquilarSocioProducto(1,2);
echo "<font color=\"red\"><b>Alquilo al cliente 1, el soporte 3</b></font></br>";
$vc->alquilarSocioProducto(1,3);

echo "<font color=\"red\"><b>Alquilo al cliente 1, el soporte 2, No debe dejarme al estar ya alquilado</b></font></br>";
//alquilo otra vez el soporte 2 al socio 1.
// no debe dejarme porque ya lo tiene alquilado
$vc->alquilarSocioProducto(1,2);

echo "<font color=\"red\"><b>Alquilo al cliente 1, el soporte 6, No debe dejarme, ya tiene 2 y es su maximo</b></font></br>";
//alquilo el soporte 6 al socio 1.
//no se puede porque el socio 1 tiene 2 alquileres como máximo
$vc->alquilarSocioProducto(1,6);

//listo los socios
echo "<font color=\"red\"><b>Listo los socios</b></font></br>";
$vc->listarSocios();