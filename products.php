<?php include 'shared/header.php'; ?>

<?php
session_start();

if (!isset($_SESSION['id'])) {
  header("Location: index.php");
  exit();
}

$sql = 'SELECT * FROM products';
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['deleteProduct'])) {

  $id = filter_input(INPUT_POST, 'product_id');

  $sql = "DELETE FROM products WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-success" role="alert">Producto eliminado exitosamente</div>';

    header("Location: products.php");
  } else {
    echo '<div class="alert alert-danger" role="alert">Error al eliminar el registro</div>';
  }
}

if (isset($_POST['update'])) {
  $productId = $_POST['product_id'];

  header("Location: product.php?q=$productId");
}

?>

<body class="container h-full">
  <?php include 'shared/navbar.php'; ?>

  <div class="mt-5 d-flex flex-column gap-5">
    <h1 class="text-center">
      Productos
      <a href="./newProduct.php" class="btn btn-outline-success">
        <i class="bi bi-plus-circle"></i>
      </a>
    </h1>

    <?php if (empty($products)) : ?>
      <p class="lead mt-3">No hay productos registrados</p>
    <?php endif; ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php foreach ($products as $item) : ?>
          <tr>
            <th scope="row">
              <?php echo $item['id'] ?>
            </th>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['description'] ?></td>
            <td class="d-flex gap-2">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                <button type="submit" name="deleteProduct" class="btn btn-outline-danger">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                <button type="submit" name="update" class="btn btn-outline-warning">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>