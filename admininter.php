<?php
include('./db/config.php');  //database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>SHOP</title>
</head>

<body>
    <div class="container">
        <a href="index.php" type="button" class="btn btn-primary">Log out</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Réference</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Photo Produit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `produit`";
                $res = mysqli_query($conn,  $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <th scope="col"><?php echo $row['RefPdt']; ?></th>
                        <th scope="col"><?php echo $row['libPdt']; ?></th>
                        <th scope="col"><?php echo $row['Prix']; ?></th>
                        <th scope="col"><?php echo $row['Qte']; ?></th>
                        <th scope="col"><?php echo $row['description']; ?></th>
                        <th scope="col"><?php echo $row['type']; ?></th>
                        <th scope="col"><img src="./photos/<?php echo $row['image']; ?>" /></th>
                        <th scope="col">
                            <a href="/admindetaille.php?RefPdt=<?php echo $row['RefPdt']; ?>"><i class="fa-solid fa-eye fa-xl" style="color: #000000; margin: 0px 10px;"></i></a>
                            <a href="./delete.php?RefPdt=<?php echo $row['RefPdt']; ?>"><i class="fa-solid fa-square-xmark fa-xl" style="color: #000000; margin: 0px 10px;"></i></a>
                            <a href="./edit.php?RefPdt=<?php echo $row['RefPdt']; ?>"><i class="fa-solid fa-rotate-right fa-xl" style="color: #000000; margin: 0px 10px;"></i></a>
                        </th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a type="button" class="btn btn-info" href="./add.php">Ajouter Un produit</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>