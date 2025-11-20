<?php
include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";


//instanciamos un par de objetos cliente
$cliente1 = new Cliente("Bruce Wayne", 23);
$cliente2 = new Cliente("Clark Kent", 33);

//mostramos el número de cada cliente creado
echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero()."<br>";

//instancio algunos soportes
$soporte1 = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
$soporte2 = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
$soporte3 = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
$soporte4 = new Dvd("El Imperio Contraataca", 4, 3, "es,en","16:9");

echo "<b>Bruce Wayne (cliente1) alquila 3 soportes (cazafantasmas, The last of us, origen)</b></br>";
//alquilo algunos soportes
$cliente1->alquilar($soporte1);
$cliente1->alquilar($soporte2);
$cliente1->alquilar($soporte3);

//voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
echo "<b>Intento Alquilar uno que ya está aqluilado</b></br>";
$cliente1->alquilar($soporte1);

echo "<b>Intento Alquilar El imperio contraataca teniendo ya 3 alquilados:</b></br>";
//el cliente tiene 3 soportes en alquiler como máximo
//este soporte no lo va a poder alquilar
$cliente1->alquilar($soporte4);

echo "<b>Intento Devolver el soporte con número 4 que no tiene alquilado</b></br>";
//este soporte no lo tiene alquilado
$cliente1->devolver(4);

echo "<b>Intento Devolver el soporte con número 23 que sí tiene alquilado</b></br>";
//devuelvo un soporte que sí que tiene alquilado
$cliente1->devolver(23);

echo "<b>Como he devuelto uno, intento alquilar El imperio contraataca de nuevo</b></br>";
//alquilo otro soporte
$cliente1->alquilar($soporte4);

echo "<b>Listo los elementos alquilados:</b></br>";
//listo los elementos alquilados
$cliente1->listarAlquileres();
//este cliente no tiene alquileres

echo "<b>Cliente2 (Clark Kent) intenta devolver el soporte 2, pero no lo tiene</b></br>";
$cliente2->devolver(2);
