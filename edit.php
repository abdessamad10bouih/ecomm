<?php
include "./db/config.php";
$id = $_GET['RefPdt'];

if (isset($_POST["submit"])) {
    $id = mysqli_real_escape_string($conn, $_POST['RefPdt']);
    $libPdt = mysqli_real_escape_string($conn, $_POST['libPdt']);
    $Prix = mysqli_real_escape_string($conn, $_POST['Prix']);
    $Qte = mysqli_real_escape_string($conn, $_POST['Qte']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $Type = mysqli_real_escape_string($conn, $_POST['Type']);

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = 'photos/' . $image;
    move_uploaded_file($image_temp, $image_path);

    if ($image != "") {
        $sql = "UPDATE produit SET `libPdt` = '$libPdt', `Prix` = '$Prix', `Qte` = '$Qte', `description` = '$Description', `type` = '$Type', `image` = '$image' WHERE RefPdt = '$id'";
    } else {
        $sql = "UPDATE produit SET `libPdt` = '$libPdt', `Prix` = '$Prix', `Qte` = '$Qte', `description` = '$Description', `type` = '$Type' WHERE RefPdt = '$id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: admininter.php?msg=Record updated successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

// Fetch product details for editing
$sql = "SELECT * FROM `produit` WHERE RefPdt = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Product</h3>
            <p class="text-muted">Edit the form below to update the product</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">RefPdt</label>
                        <input type="text" class="form-control" name="RefPdt" placeholder="Product Reference" value="<?php echo $row['RefPdt'] ?>" readonly>
                    </div>

                    <div class="col">
                        <label class="form-label">libPdt</label>
                        <input type="text" class="form-control" name="libPdt" placeholder="Product Name" value="<?php echo $row['libPdt'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Prix</label>
                        <input type="text" class="form-control" name="Prix" placeholder="Price" value="<?php echo $row['Prix'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Qte</label>
                        <input type="text" class="form-control" name="Qte" placeholder="Quantity" value="<?php echo $row['Qte'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="Description" placeholder="Description" value="<?php echo $row['description'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Product Image">
                    </div>

                    <div class="col">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="Type" placeholder="Product Type" value="<?php echo $row['type'] ?>">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save Changes</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>