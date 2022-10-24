<!DOCTYPE html>
<html lang="en">

<head>
  <title>Busca</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <?php include "conexao.php"; ?>

</head>

<body>
  <nav>
    <form method="GET" action="index.php" onsubmit="return validForm()">
    <div id="liveAlertPlaceholder"></div>

      <select name="cargo" id="cargo">
      <option value='nada'>Selecione um Cargo</option>
        <?php
        $consulta = $connection->query("select DISTINCT cargo from tbl_empregos");
        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $cargo = $exibe['cargo'];
          echo "<option value='$cargo'>$cargo</option>";
        }
        ?>
      </select>
      <select name="area" id="area">




      <option value='nada'>Selecione uma área</option>
        <?php
        $consulta = $connection->query("select DISTINCT area from tbl_empregos");
        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $area = $exibe['area'];
          echo "<option value='$area'>$area</option>";
        }
        ?>
      </select>





      <button type="submit" class="btn btn-primary" id="liveAlertBtn">Enviar</button>

      <!-- <input type="button" value="Enviar dados" class="btn btn-primary" id="liveAlertBtn"> -->
    </form>
  </nav>
  <table>
   

    <?php

    function toTd($txt)
    {
      return "<td>" . $txt . "</td>";
    }

    function reloadInfos()
    {
      include "conexao.php";

      $cargo = $_GET['cargo'] ?? "";
      $area = $_GET['area'] ?? "";

      if (empty($cargo)) {
        return;
      }

      $consulta = $connection->query("call sp_searchByCargoArea('$cargo', '$area')");

      echo "<tr>
      <th>Registro</th>
      <th>Nome</th>
      <th>Cargo</th>
      <th>Area</th>
      <th>Salario</th>
      <th>Status</th>
      <th>Alterar</th>
      <th>Excluir</th>
      
      </tr>";
     

      while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo toTd($exibe['registro']);
        echo toTd($exibe['nome']);
        echo toTd($exibe['cargo']);
        echo toTd($exibe['area']);
        echo toTd($exibe['salario']);
        echo toTd($exibe['ativo']);
        echo toTd("Alterar");
        echo toTd("Excluir");
        echo "</tr>";
      }
    }
    reloadInfos();


    ?>
  </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script defer src="main.js"></script>
</html>
