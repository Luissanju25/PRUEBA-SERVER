<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió Cafeteria</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <h1> Gestió Cafeteria </h1>

    <h2> Llistat de taules </h2>
    <!--<p class="bg-warning"> <em> Exercici </em>: Cada taula té una sèrie de productes demanats, cal fer que el botó "Imprimir Tíquet" genere el llistat de productes demanats per a la taula i el preu total. </p>-->


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Taula</th>
                <th scope="col">Botó</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include_once 'Bar.php';
            $bar = new Bar();

            $taules = $bar->getTaules();

            foreach ($taules as $taula) {
                echo "<form action='" . $_SERVER["PHP_SELF"] . "' method='POST'>";
                echo "<tr>";
                echo "<th scope='row'> <input type='text' name='numTaula' id='taula' readonly value='" . $taula->getNumTaula() . "'></th>";
                echo "<td> <button type='submit' class='btn btn-primary'> Imprimir Tíquet </button> </td>";
                echo "</tr>";
                echo "</form>";
            }
            ?>

        </tbody>
    </table>


    <!-- Al fer click en el botó "Imprimir Tíquet" apareixerà el compte de la taula -->
    <h2> Tíquet Taula </h2>
    <!--<p class="bg-warning"> Ací s'ha de mostrar el tíquet generat </p>-->
    
    <?php
      
      $preuTotal = 0;

      if ( isset($_POST['numTaula']) ){
          $numTaula = $_POST['numTaula'];
          echo "<div class='bg-light w-25'>";
          echo "<h3 class='bg-info'> Tíquet taula $numTaula </h3>";

          echo "<div class='list-group'>";
          foreach ( $bar->getTaulaByNum($numTaula)->getProductes() as $producte ) {
              $preuUnitat = $producte->getPreuUnitat();
              $preuTotal += $preuUnitat;
              echo "<div class='d-flex w-100 justify-content-between' >";
              echo "<h6 class='mb-1'> ". $producte->getNomProducte() . "</h5>";
              echo "<h6 class='mb-1'> $preuUnitat €</h5>";
              echo "</div>";
          }
          echo "</div>";

          echo "<div class='d-flex w-100 justify-content-between bg-info' >";
          echo "<h5 class='mb-1'> Preu total: </h5>";
          echo "<h5 class='mb-1'> $preuTotal €</h5>";
          echo "</div>";
          echo "</div>";
      }
    ?>



</body>

</html>