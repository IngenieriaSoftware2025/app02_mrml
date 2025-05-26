<?php

namespace Controllers;

use Exception;
use Model\ActiveRecord;
use Model\Clientes;
use MVC\Router;

class ClientesController extends ActiveRecord {

    public static function renderizarPagina(Router $router) {
        $router->render('clientes/index', []);
    }

    public static function guardarAPI() {
        getHeadersApi();

        // Validación de primer nombre
        $_POST['cli_nombre1'] = htmlspecialchars($_POST['cli_nombre1']);
        $cantidad_nombre1 = strlen($_POST['cli_nombre1']);

        if ($cantidad_nombre1 < 2) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos que debe de contener el nombre debe de ser mayor a dos'
            ]);
            return;
        }

        // Sanitizar segundo nombre
        $_POST['cli_nombre2'] = htmlspecialchars($_POST['cli_nombre2']);

        // Validación de primer apellido
        $_POST['cli_ape1'] = htmlspecialchars($_POST['cli_ape1']);
        $cantidad_ape = strlen($_POST['cli_ape1']);

        if ($cantidad_ape < 2) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos que debe de contener el apellido debe de ser mayor a dos'
            ]);
            return;
        }

        // Sanitizar segundo apellido
        $_POST['cli_ape2'] = htmlspecialchars($_POST['cli_ape2']);

        // Validación de teléfono
        $_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_VALIDATE_INT);

        if (strlen($_POST['cli_telefono']) != 8) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos de telefono debe de ser igual a 8'
            ]);
            return;
        }

        // Verificar si el teléfono ya existe
        if (Clientes::existeTelefono($_POST['cli_telefono'])) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'El número de teléfono ya está registrado'
            ]);
            return;
        }

        // Validación de email
        $_POST['cli_email'] = filter_var($_POST['cli_email'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($_POST['cli_email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'El correo electronico ingresado es invalido'
            ]);
            return;
        }

        // Verificar si el email ya existe
        if (Clientes::existeEmail($_POST['cli_email'])) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'El correo electrónico ya está registrado'
            ]);
            return;
        }

        // Sanitizar país
        $_POST['cli_pais'] = htmlspecialchars($_POST['cli_pais']);

        try {
            $data = new Clientes([
                'cli_nombre1' => $_POST['cli_nombre1'],
                'cli_nombre2' => $_POST['cli_nombre2'],
                'cli_ape1' => $_POST['cli_ape1'],
                'cli_ape2' => $_POST['cli_ape2'],
                'cli_telefono' => $_POST['cli_telefono'],
                'cli_email' => $_POST['cli_email'],
                'cli_pais' => $_POST['cli_pais'],
                'situacion' => 1
            ]);

            $crear = $data->crear();

            if ($crear['resultado']) {
                http_response_code(200);
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'El cliente ha sido registrado correctamente'
                ]);
            } else {
                http_response_code(400);
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error al crear el cliente'
                ]);
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI() {
        try {
            // USANDO EL MÉTODO DEL MODELO en lugar de SQL directo
            $data = Clientes::obtenerClientesActivos();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => count($data) > 0 ? 'Clientes obtenidos correctamente' : 'No hay clientes registrados',
                'data' => $data
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al obtener los clientes',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function EliminarAPI() {
        try {
            $id = filter_var($_GET['cli_id'], FILTER_SANITIZE_NUMBER_INT);

            // USANDO EL MÉTODO DEL MODELO
            $ejecutar = Clientes::EliminarClientes($id);

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'El registro ha sido eliminado correctamente'
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Eliminar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function modificarAPI() {
        getHeadersApi();

        $id = $_POST['cli_id'];

        // Validaciones (mismo código que en guardar)
        $_POST['cli_nombre1'] = htmlspecialchars($_POST['cli_nombre1']);
        $cantidad_nombre1 = strlen($_POST['cli_nombre1']);

        if ($cantidad_nombre1 < 2) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos que debe de contener el nombre debe de ser mayor a dos'
            ]);
            return;
        }

        $_POST['cli_nombre2'] = htmlspecialchars($_POST['cli_nombre2']);
        $_POST['cli_ape1'] = htmlspecialchars($_POST['cli_ape1']);

        $cantidad_ape = strlen($_POST['cli_ape1']);

        if ($cantidad_ape < 2) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos que debe de contener el apellido debe de ser mayor a dos'
            ]);
            return;
        }

        $_POST['cli_ape2'] = htmlspecialchars($_POST['cli_ape2']);
        $_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_VALIDATE_INT);

        if (strlen($_POST['cli_telefono']) != 8) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos de telefono debe de ser igual a 8'
            ]);
            return;
        }

        // Verificar si el teléfono ya existe (excluyendo el registro actual)
        if (Clientes::existeTelefono($_POST['cli_telefono'], $id)) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'El número de teléfono ya está registrado'
            ]);
            return;
        }

        $_POST['cli_email'] = filter_var($_POST['cli_email'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($_POST['cli_email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'El correo electronico ingresado es invalido'
            ]);
            return;
        }

        // Verificar si el email ya existe (excluyendo el registro actual)
        if (Clientes::existeEmail($_POST['cli_email'], $id)) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'El correo electrónico ya está registrado'
            ]);
            return;
        }

        $_POST['cli_pais'] = htmlspecialchars($_POST['cli_pais']);

        try {
            $data = Clientes::find($id);
            
            $data->sincronizar([
                'cli_nombre1' => $_POST['cli_nombre1'],
                'cli_nombre2' => $_POST['cli_nombre2'],
                'cli_ape1' => $_POST['cli_ape1'],
                'cli_ape2' => $_POST['cli_ape2'],
                'cli_telefono' => $_POST['cli_telefono'],
                'cli_email' => $_POST['cli_email'],
                'cli_pais' => $_POST['cli_pais'],
                'situacion' => 1
            ]);
            
            $resultado = $data->actualizar();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'La informacion del cliente ha sido modificada exitosamente'
            ]);
            
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}