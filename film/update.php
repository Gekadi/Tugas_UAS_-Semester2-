<?php
include('../user/check_login.php');
include('../config.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_film = $_POST['nama_film'];
    $id_category = $_POST['id_category'];
    $rating = $_POST['rating'];
    $status = $_POST['status'];

    $sql = "UPDATE table_film SET nama_film='$nama_film', id_category='$id_category', rating='$rating', status='$status' WHERE id_film=$id";
    if ($conn->query($sql) === TRUE) {
        $success = "Film berhasil diupdate.";
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM table_film WHERE id_film=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$sql = "SELECT * FROM table_category";
$categories = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Edit Film</h2>
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
                    <input type="text" class="form-control" id="nama_film" name="nama_film" value="<?php echo $row['nama_film']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="id_category">Kategori:</label>
                    <select class="form-control" id="id_category" name="id_category" required>
                        <?php while($cat = $categories->fetch_assoc()) { ?>
                            <option value="<?php echo $cat['id_category']; ?>" <?php echo ($cat['id_category'] == $row['id_category']) ? 'selected' : ''; ?>><?php echo $cat['nama']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <input type="text" class="form-control" id="rating" name="rating" value="<?php echo $row['rating']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    
                    <select class="form-control" id="status" name="status" required>
                        <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>sudah di tonton</option>
                        <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>belum di tonton</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
