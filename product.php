<?php include 'shared/header.php'; ?>

<?php
session_start();

if (!isset($_SESSION['id'])) {
  header("Location: index.php");
  exit();
}

if (isset($_GET['q'])) {
  $productId = $_GET['q'];

  $sql = "SELECT * FROM products WHERE id='$productId'";
  $result = mysqli_query($conn, $sql);
  $productDB = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) != 1) {
    header("Location: products.php");
  }
} else {
  header("Location: products.php");
}

if (isset($_POST['submit'])) {

  $productId = $_GET['q'];

  $name = $_POST['name'];
  $description = $_POST['description'];

  echo $name;
  echo $description;
  echo $productId;

  // $sql = "UPDATE products SET name='$name', description='$description' WHERE id=$productId";

  // if ($conn->query($sql) === TRUE) {
  //   // header("Location: products.php");
  // } else {
  //   echo "Error al editar el registro: " . $conn->error;
  //   // echo '<div class="alert alert-danger" role="alert">Error al editar registro</div>';
  // }
}
?>

<body class="container h-full">
  <div class="mt-5 d-flex flex-column gap-5 align-items-center">
    <h1 class="text-center">Editar Producto</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?q=<?php echo $_GET['q'] ?>" method="POST" class="d-flex flex-column" style="width: 500px;">
      <div class=" mb-3">
        <label class="form-label">Nombre del producto</label>
        <input class="form-control" name="name" style="width: 500px;" value="<?php echo $productDB['name'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción del producto</label>
        <textarea class="form-control" name="description" style="width: 500px;" rows="3"><?php echo $productDB['description'] ?></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-outline-warning">
        Editar
        <i class="bi bi-pencil-square"></i>
      </button>
    </form>
  </div>
</body>

</html>