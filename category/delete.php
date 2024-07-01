<?php
include('../config.php');

$id = $_GET['id'];

$sql = "DELETE FROM table_category WHERE id_category = $id";
if ($conn->query($sql) === TRUE) {
    echo "Kategori berhasil dihapus.";
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
