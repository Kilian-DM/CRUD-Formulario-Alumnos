<?php
include 'Funciones.php';

$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ""
];

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
  $id = $_GET['id'];
  $consultaSQL = "DELETE FROM alumnos WHERE id =" . $id;

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<?php require "templates/Header.php"; ?>
<?php
if (isset($resultado)) {
  ?>
    <div class="container mt-2">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success" role="alert">
            El alumno ha sido eliminado de la base de datos correctamente
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
  <div>
  <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
  </div>

<?php require "templates/Footer.php"; ?>