<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>App</title>
</head>
<body>
<?php
    include_once '_nav.php';
?>
<div class="container mt-2">

<?php
if(isset($_SESSION['errors'])) {
    foreach($_SESSION['errors'] as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
}
if(isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>". $_SESSION['error'] ."</div>";
}
if(isset($_SESSION['success'])) {
    echo "<div class='alert alert-success'>". $_SESSION['success'] ."</div>";
}
?>