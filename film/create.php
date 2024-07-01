<?php
include('../user/check_login.php');
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $nama_film = $_POST['nama_film'];
    $id_category = $_POST['id_category'];
    $rating = $_POST['rating'];
    $status = $_POST['status'];

    $sql = "INSERT INTO table_film (user_id, nama_film, id_category, rating, status) VALUES ('$user_id', '$nama_film', '$id_category', '$rating', '$status')";
    if ($conn->query($sql) === TRUE) {
        $success = "Film berhasil ditambahkan.";
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM table_category";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Tambah Film</h2>
            <?php if(isset($success)): ?>
                <div class="alert alert-success">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama_film">Nama Film:</label>
                    <input type="text" class="form-control" id="nama_film" name="nama_film" required>
                </div>
                <div class="form-group">
                    <label for="id_category">Kategori:</label>
                    <select class="form-control" id="id_category" name="id_category" required>
                        <?php while($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id_category']; ?>"><?php echo $row['nama']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <input type="text" class="form-control" id="rating" name="rating" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1">Sudah di tonton</option>
                        <option value="0">belum di tonton</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
