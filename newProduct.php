<?php include 'shared/header.php'; ?>

<?php
session_start();

if (!isset($_SESSION['id'])) {
  header("Location: index.php");
  exit();
}

if (isset($_POST['submit'])) {
  $name = filter_input(
    INPUT_POST,
    'name',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  $description = filter_input(
    INPUT_POST,
    'description',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );

  $id = $_SESSION["id"];

  $sql = "INSERT INTO products (id, name, description, made_by) VALUES (null,'$name', '$description', 1)";

  if ($conn->query($sql) === TRUE) {
    header("Location: products.php");
  } else {
    echo "Error al agregar el registro: " . $conn->error;
    // echo '<div class="alert alert-danger" role="alert">Error al crear registro</div>';
  }
}
?>

<body class="container h-full">
  <div class="mt-5 d-flex flex-column gap-5 align-items-center">
    <h1 class="text-center">Añadir Producto</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="d-flex flex-column" style="width: 500px;">
      <div class=" mb-3">
        <label class="form-label">Nombre del producto</label>
        <input class="form-control" name="name" style="width: 500px;">
      </div>
      <div class="mb-3">
        <label class="form-label">Descripción del producto</label>
        <textarea class="form-control" name="description" style="width: 500px;" rows="3"></textarea>
      </div>

      <button type="submit" name="submit" class="btn btn-outline-success">
        Agregar
        <i class="bi bi-plus-circle"></i>
      </button>
    </form>
  </div>
</body>

</html>