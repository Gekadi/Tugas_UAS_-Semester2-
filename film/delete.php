<?php
include('../config.php');

$id = $_GET['id'];

$sql = "DELETE FROM table_film WHERE id_film = $id";
if ($conn->query($sql) === TRUE) {
    echo "Film berhasil dihapus.";
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
