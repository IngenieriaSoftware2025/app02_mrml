<!-- Contenedor principal del formulario con estilos visuales -->
<div class="container mt-5 p-4 rounded shadow" style="background-color: #f8f9fa; max-width: 800px;">
  <!-- Título centrado -->
  <h3 class="mb-4 text-center">Registro de Cliente</h3>

  <!-- Inicio del formulario -->
  <form name="FormularioClientes" id="FormularioClientes" method="POST">
    
    <!-- Campo oculto para el ID (usado en modificar) -->
    <input type="hidden" id="cli_id" name="cli_id">
    
    <!-- Fila para los dos nombres -->
    <div class="row g-3 mb-3">
      <!-- Primer Nombre (campo obligatorio) -->
      <div class="col-md-6">
        <label for="cli_nombre1" class="form-label">Primer Nombre *</label>
        <input type="text" class="form-control" id="cli_nombre1" name="cli_nombre1" required placeholder="Myron">
      </div>

      <!-- Segundo Nombre (opcional) -->
      <div class="col-md-6">
        <label for="cli_nombre2" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" id="cli_nombre2" name="cli_nombre2" placeholder="Raul">
      </div>
    </div>

    <!-- Fila para los dos apellidos -->
    <div class="row g-3 mb-3">
      <!-- Primer Apellido (campo obligatorio) -->
      <div class="col-md-6">
        <label for="cli_ape1" class="form-label">Primer Apellido *</label>
        <input type="text" class="form-control" id="cli_ape1" name="cli_ape1" required placeholder="Montoya">
      </div>

      <!-- Segundo Apellido (opcional) -->
      <div class="col-md-6">
        <label for="cli_ape2" class="form-label">Segundo Apellido</label>
        <input type="text" class="form-control" id="cli_ape2" name="cli_ape2" placeholder="Lopez">
      </div>
    </div>

    <!-- Campo de teléfono -->
    <div class="mb-3">
      <label for="cli_telefono" class="form-label">Teléfono</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
        <input type="text" class="form-control" id="cli_telefono" name="cli_telefono" placeholder="Ej. 12345678">
      </div>
    </div>

    <!-- Campo de correo electrónico -->
    <div class="mb-3">
      <label for="cli_email" class="form-label">Correo Electrónico</label>
      <div class="input-group">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="cli_email" name="cli_email" placeholder="ejemplo@ejemplo.com">
      </div>
    </div>

    <!-- Campo de país -->
    <div class="mb-3">
      <label for="cli_pais" class="form-label">País</label>
      <input type="text" class="form-control" id="cli_pais" name="cli_pais" placeholder="Ej. Guatemala">
    </div>

    <!-- Botones de acción -->
    <div class="row justify-content-center mt-5">
      <div class="col-auto">
        <button class="btn btn-success" type="submit" id="BtnGuardar">
          Guardar
        </button>
      </div>

      <div class="col-auto">
        <button class="btn btn-warning d-none" type="button" id="BtnModificar">
          Modificar
        </button>
      </div>

      <div class="col-auto">
        <button class="btn btn-secondary" type="reset" id="BtnLimpiar">
          Limpiar
        </button>
      </div>
    </div>
  </form>
</div>

<!-- Tabla de clientes -->
<div class="container">
  <div class="row justify-content-center p-3">
    <div class="col-lg-10">
      <div class="card custom-card shadow-lg" style="border-radius: 10px; border: 1px solid #007bff;">
        <div class="card-body p-3">
          <h3 class="text-center">CLIENTES REGISTRADOS EN LA BASE DE DATOS</h3>

          <div class="table-responsive p-2">
            <!-- ID CORREGIDO: TableClientes en lugar de TableUsuarios -->
            <table class="table table-striped table-hover table-bordered w-100 table-sm" id="TableClientes">
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT CORREGIDO: ruta correcta al archivo compilado -->
<script src="<?= asset('build/js/clientes/index.js') ?>"></script>
