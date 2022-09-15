<?php 
session_start(); 
if(!isset($_SESSION['userdata'])){
    header("location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Welcome, <?= $_SESSION['userdata']['name']; ?></a>
    <h3 class="text-center">Dashbaord</h3> 
    <form class="d-flex">
      <a href="logout.php" class="btn btn-outline-danger" type="submit">Logout</a>
    </form>
  </div>
</nav>
</div>
</body>
</html>