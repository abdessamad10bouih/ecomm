<?php
include('./db/config.php');
if (isset($_GET['RefPdt'])) {
    $ref = mysqli_real_escape_string($conn, $_GET['RefPdt']);

    // Fetch product details based on the reference
    $sql = "SELECT * FROM `produit` WHERE RefPdt = '$ref'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css/detail.css">
            <title>Product Detail</title>
        </head>

        <body>
            <div class="container">
                <div class="image">
                    <img src="./photos/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="details">
                    <div class="info">
                        <h4>Réference Produit</h4>
                        <h4><?php echo $row['RefPdt']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Libélle produit</h4>
                        <h4><?php echo $row['libPdt']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Prix Prod</h4>
                        <h4><?php echo $row['Prix']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Quantité produit</h4>
                        <h4><?php echo $row['Qte']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Description produit</h4>
                        <h4><?php echo $row['description']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Type Produit</h4>
                        <h4><?php echo $row['type']; ?></h4>
                    </div>
                </div>
            </div>
            <a class='retour' href="cart.php">Retour</a>
        </body>

        </html>
<?php
    } else {
        // Product not found
        echo "Product not found.";
    }
} else {
    // No product reference provided in the URL
    echo "No product reference provided.";
}
?>