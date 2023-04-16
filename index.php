<?php

if (isset($_POST['submit'])) {
  $username = filter_input(
    INPUT_POST,
    'username',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  $password = filter_input(
    INPUT_POST,
    'password',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );

  $url = $_SERVER['REQUEST_URI'];

  if ($username == 'pepe@a.com' && $password == '1234') {
    // Set Session variable
    // $_SESSION['username'] = $username;
    // Redirect user to another page
    header("Location: products.php");
  } else {
    echo 'Incorrect username or password';
  }
}

?>

<?php include 'shared/header.php'; ?>

<body class="container h-full">
  <main>
    <div class="text-center">
      <h1 class="text-center">ProductosApp</h1>
      <i class="bi bi-bag"></i>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="mb-3">
        <label class="form-label">Nombre de usuario</label>
        <input type="text" name="username" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100 rounded-pill">Iniciar sesión</button>
    </form>
  </main>
</body>

</html>