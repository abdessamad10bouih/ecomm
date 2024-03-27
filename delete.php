<?php
include "./db/config.php";

$id = mysqli_real_escape_string($conn, $_GET["RefPdt"]);

$sql = "DELETE FROM `produit` WHERE RefPdt = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: admininter.php?msg=Data deleted successfully");
    exit; // Always exit after a header redirect
} else {
    echo "Failed: " . mysqli_error($conn);
}
