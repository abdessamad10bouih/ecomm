<?php
include "./db/config.php";

if (isset($_POST["submit"])) {
    // Get form data
    $RefPdt = mysqli_real_escape_string($conn, $_POST['RefPdt']);
    $libPdt = mysqli_real_escape_string($conn, $_POST['libPdt']);
    $Prix = mysqli_real_escape_string($conn, $_POST['Prix']);
    $Qte = mysqli_real_escape_string($conn, $_POST['Qte']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = 'photos/' . $image;
    move_uploaded_file($image_temp, $image_path);
    $Type = mysqli_real_escape_string($conn, $_POST['Type']);

    // Insert data into database
    $sql = "INSERT INTO produit (RefPdt, libPdt, Prix, Qte, Description, image, Type) 
            VALUES ('$RefPdt', '$libPdt', '$Prix', '$Qte', '$Description', '$image', '$Type')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: admininter.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
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
            <h3>Add New Product</h3>
            <p class="text-muted">Complete the form below to add a new product</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">RefPdt</label>
                        <input type="text" class="form-control" name="RefPdt" placeholder="Product Reference">
                    </div>

                    <div class="col">
                        <label class="form-label">libPdt</label>
                        <input type="text" class="form-control" name="libPdt" placeholder="Product Name">
                    </div>

                    <div class="col">
                        <label class="form-label">Prix</label>
                        <input type="text" class="form-control" name="Prix" placeholder="Price">
                    </div>

                    <div class="col">
                        <label class="form-label">Qte</label>
                        <input type="text" class="form-control" name="Qte" placeholder="Quantity">
                    </div>

                    <div class="col">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="Description" placeholder="Description">
                    </div>

                    <div class="col">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Product Image">
                    </div>

                    <div class="col">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="Type" placeholder="Product Type">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>