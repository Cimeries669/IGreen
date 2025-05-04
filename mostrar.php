<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Riego Igreen</title>
  <meta http-equiv="refresh" content="1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: url('C:\igreen.png') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
      color: #fff;
    }

    header {
      background-color: rgba(0, 100, 0, 0.8);
      padding: 20px;
      text-align: center;
      font-size: 1.6em;
      font-weight: bold;
    }

    .contenedor {
      max-width: 900px;
      margin: 30px auto;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 20px;
      border-radius: 10px;
    }

    .tarjetas {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 20px;
    }

    .tarjeta {
      background-color: #1b5e20;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.3);
    }

    .tarjeta h3 {
      margin-top: 0;
      font-size: 1.2em;
    }

    .tarjeta .valor {
      font-size: 2em;
      font-weight: bold;
    }

    .boton-riego {
      display: block;
      width: 100%;
      background-color: #43a047;
      border: none;
      color: white;
      font-size: 1.2em;
      padding: 15px;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.3s;
    }

    .boton-riego:hover {
      background-color: #2e7d32;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
      font-size: 0.9em;
      color: #ccc;
    }
  </style>
</head>
<body>
  <header>🌿 Sistema de Riego Automático “AISA”</header>
  <div class="contenedor">
    <?php
      $archivo = "log.txt";
      $suelo1 = $suelo2 = $humedad = $temperatura = "-";

      if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $ultima = end($lineas);
        $partes = explode(";", $ultima);
        if (count($partes) === 5) {
          list($fecha, $suelo1, $suelo2, $humedad, $temperatura) = $partes;
        }
      }
    ?>

    <div class="tarjetas">
      <div class="tarjeta">
        <h3>Humedad Suelo 1</h3>
        <div class="valor"><?php echo $suelo1; ?>%</div>
      </div>
      <div class="tarjeta">
        <h3>Humedad Suelo 2</h3>
        <div class="valor"><?php echo $suelo2; ?>%</div>
      </div>
      <div class="tarjeta">
        <h3>Humedad del Aire</h3>
        <div class="valor"><?php echo $humedad; ?>%</div>
      </div>
      <div class="tarjeta">
        <h3>Temperatura del Aire</h3>
        <div class="valor"><?php echo $temperatura; ?>°C</div>
      </div>
    </div>

    <form action="activar_riego.php" method="POST">
      <button class="boton-riego" type="submit">💧 Activar Riego Manual</button>
    </form>

    <div class="footer">
      Última actualización: <?php echo isset($fecha) ? $fecha : "-"; ?>
    </div>
  </div>
</body>
</html>
