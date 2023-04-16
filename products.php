<?php include 'shared/header.php'; ?>

<body class="container h-full">
  <div class="mt-5 d-flex flex-column gap-5">
    <h1 class="text-center">Productos</h1>

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
        <tr>
          <th scope="row">1</th>
          <td>Lorem ipsum, dolor sit</td>
          <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem excepturi iste reiciendis deleniti inventore, eum facilis provident.</td>
          <td class="d-flex gap-2">
            <button type="button" class="btn btn-outline-danger">
              <i class="bi bi-trash"></i>
            </button>
            <button type="button" class="btn btn-outline-warning">
              <i class="bi bi-pencil-square"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>