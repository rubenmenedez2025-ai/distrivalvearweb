<?php
$servername = "localhost";
$username = "root";
$password = "admin123";  // ← la contraseña que pusiste en MySQL
$dbname = "distri_alvear";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

echo "✅ Conectado correctamente a la base de datos";
?><?php
include 'conexion.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Productos - Distri Alvear</title>
  <style>
    body { font-family: Arial; background-color: #fafafa; padding: 20px; }
    table { border-collapse: collapse; width: 100%; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background-color: #eee; }
  </style>
</head>
<body>
  <h1>📦 Productos disponibles</h1>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>

    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["nombre"]; ?></td>
        <td>$<?php echo $row["precio"]; ?></td>
        <td><?php echo $row["stock"]; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>

<?php $conn->close(); ?>

