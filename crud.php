<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create
if (isset($_POST['create'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
    $conn->query($sql);
}

// Read
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
</head>
<body>

    <h2>Usuarios</h2>

    <!-- Create Form -->
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="create">Crear Usuario</button>
    </form>

    <!-- Display Users -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>
