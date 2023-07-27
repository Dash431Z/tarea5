<?php
// Configuración de la conexión a la base de datos PostgreSQL
$host = 1040;
$port = 5005;
$dbname = bdd1;
$user = root;
$password = root;

$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

// Manejar las solicitudes del frontend
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Obtener todos los productos del inventario
  $stmt = $pdo->query("SELECT * FROM inventario");
  $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($productos);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Agregar un nuevo producto al inventario
  $data = json_decode(file_get_contents("php://input"), true);
  $nombre = $data["nombre_producto"];
  $cantidad = $data["cantidad"];
  $precio = $data["precio"];
  $stmt = $pdo->prepare("INSERT INTO inventario (nombre_producto, cantidad, precio) VALUES (?, ?, ?)");
  if ($stmt->execute([$nombre, $cantidad, $precio])) {
    echo json_encode(["message" => "Producto agregado correctamente"]);
  } else {
    echo json_encode(["message" => "Error al agregar el producto"]);
  }
}
?>
