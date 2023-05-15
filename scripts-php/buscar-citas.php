<?php
// Conexión a la base de datos
// $servername = "localhost";
// $username = "root2";
// $password = "ContraseñaInsegura6#";
// $dbname = "mbs";

// $conn = new mysqli($servername, $username, $password, $dbname);

//Se va a usar el objeto de la clase mysql en mysql.php, cambiar ahí los datos de username y password
include 'mysql.php';
$mysql = new mysql();

if ($mysql->connect_error()) {
    die("Conexión fallida: " . $mysql->connect_error());
}

// Recuperar el nombre del paciente de la solicitud de búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    // Consulta SQL para buscar citas por nombre de paciente
    $sql = "SELECT nombre, fecha_hora FROM citas WHERE nombre LIKE '%$nombre%'";
    $result = $mysql->consulta($sql);

    if ($result->num_rows > 0) {
        // Si se encontraron resultados, mostrarlos en la tabla
        echo '<table>
                <thead>
                    <tr>
                        <th colspan="2">M&amp;B&amp;S Mint, Body and Spirit</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de la cita</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row["nombre"] . '</td>
                    <td>' . $row["fecha_hora"] . '</td>
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        // Si no se encontraron resultados, mostrar un mensaje de error
        echo '<p>No se encontraron resultados.</p>';
    }
}

$mysql->close();
?>
<button onclick="window.location.href='../principal.html'">Regresar a inicio</button>