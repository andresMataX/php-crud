<?php include 'shared/header.php'; ?>

<?php

session_start();

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

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $usernameDB = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 1) {
    // Set Session variable
    $_SESSION['username'] = $usernameDB['username'];
    $_SESSION['id'] = $usernameDB['id'];
    // Redirect user to another page
    header("Location: products.php");
  } else {
    echo '<div class="alert alert-danger" role="alert">Usuario o contraseña incorrectos</div>';
  }
}

?>

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