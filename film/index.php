<?php
include('../user/check_login.php');
include('../config.php');

$sql = "SELECT f.id_film, f.nama_film, c.nama AS kategori, f.rating, f.status FROM table_film f JOIN table_category c ON f.id_category = c.id_category";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="text-center mt-5">Daftar Film</h2>
    <div class="text-right mb-3">
        <a href="create.php" class="btn btn-primary">Tambah Film</a>
    </div>
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Film</th>
                    <th>Kategori</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["id_film"]; ?></td>
                        <td><?php echo $row["nama_film"]; ?></td>
                        <td><?php echo $row["kategori"]; ?></td>
                        <td><?php echo $row["rating"]; ?></td>
                        <td><?php echo $row["status"] == 1 ? "Tersedia" : "Tidak Tersedia"; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row["id_film"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $row["id_film"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Tidak ada data film.</div>
    <?php endif; ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
