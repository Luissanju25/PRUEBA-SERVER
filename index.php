<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <title>Tablero Ajedrez</title>
</head>

<body style="background-color: aquamarine";>
    <h1 style="text-align : center; color : red";> Ejercicio imprimir tablero ajedrez. Solución </h1>
    <table>
        <?php
        $filas = array(' ', '8', '7', '6', '5', '4', '3', '2', '1', ' '); //Vacíos para pintar los números y las letras
        $columnas = array(' ', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', ' '); //Vacíos para pintar los números y las letras

        $blanc = false;
        foreach ($filas as $f) {
            echo "<tr>";
            foreach ($columnas as $c) {
                // Fuera del tablero
                if ($f == ' ' || $c == ' ') {
                    echo "<td> $f $c </td>";
                } else { // Dentro del tablero

                    if ($blanc) {
                        echo "<td class='blanca'>" . insertarFicha($f, $c) . "</td>";
                    } else {
                        echo "<td class='negra'>" . insertarFicha($f, $c) . "</td>";
                    }

                    $blanc = !$blanc;
                }
            }

            echo "<tr>";
            $blanc = !$blanc;
        }

        function insertarFicha($i, $j)
        {
            if ($i == 2) {
                return "<img src='assets/images/PeonBlanca.png'  height='50px'/>";
            } else if ($i == 7) {
                return "<img src='assets/images/PeonNegra.png' height='50px'/>";
            } else if ($i == 1) {
                switch ($j) {
                    case 'a':
                    case 'h':
                        return "<img src='assets/images/TorreBlanca.png' height='50px'/>";
                    case 'b':
                    case 'g':
                        return "<img src='assets/images/CaballoBlanca.png' height='50px'/>";
                    case 'c':
                    case 'f':
                        return "<img src='assets/images/AlfilBlanca.png' height='50px'/>";
                    case 'd':
                        return "<img src='assets/images/ReinaBlanca.png' height='50px'/>";
                    case 'e':
                        return "<img src='assets/images/ReyBlanca.png' height='50px'/>";
                }
            } else if ($i == 8) {
                switch ($j) {
                    case 'a':
                    case 'h':
                        return "<img src='assets/images/TorreNegra.png' height='50px'/>";
                    case 'b':
                    case 'g':
                        return "<img src='assets/images/CaballoNegra.png' height='50px'/>";
                    case 'c':
                    case 'f':
                        return "<img src='assets/images/AlfilNegra.png' height='50px'/>";
                    case 'd':
                        return "<img src='assets/images/ReinaNegra.png' height='50px'/>";
                    case 'e':
                        return "<img src='assets/images/ReyNegra.png' height='50px'/>";
                }
            }
        }
        ?>
    </table>
</body>

</html>