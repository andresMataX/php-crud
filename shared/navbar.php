<?php
$username = $_SESSION["username"];

if (isset($_POST['logout'])) {
  header("Location: index.php");
  unset($_SESSION["id"]);
  session_destroy();
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand" href="#">
      <?php echo $username ?>
    </a>
    <form class="d-flex" method="POST">
      <button type="submit" name="logout" class="btn btn-outline-danger">
        <i class="bi bi-box-arrow-right"></i>
      </button>
    </form>
  </div>
</nav>