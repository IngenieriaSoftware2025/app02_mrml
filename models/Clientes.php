<?php

//Inidico el tipo de archivo
namespace Model;

//Inidico como se llama mi tabla y las columnas que tiene
class Clientes extends ActiveRecord {
    //Es importante recalcar que estamos herendando todo de ActiveRecord

    public static $tabla = 'cliente';
    public static $columnasDB = [
        'cli_nombre1',          //  Nombre en la BD
        'cli_nombre2',        //  Nombre en la BD
        'cli_ape1',    //  Nombre en la BD
        'cli_ape2',    //  Nombre en la BD
        'cli_telefono',//  Nombre en la BD
        'cli_email', 
        'situacion',//  Nombre en la BD
        'cli_pais'//  Nombre en la BD
    ];

    //Declaramos las variables que vamos a usar
    public static $idTabla = 'cli_id';  // El Id que esta en la tabla      
    public $cli_id;
    public $cli_nombre1;    
    public $cli_nombre2;
    public $cli_ape1;
    public $cli_ape2;
    public $cli_telefono; 
    public $cli_email;
    public $situacion;
    public $cli_pais;

    //hago un constructor e indico como vienen los productos, si no vienen le digo quer valor
    public function __construct($args = []){
        $this->cli_id = $args['cli_id'] ?? null;
        $this->cli_nombre1 = $args['cli_nombre1'] ?? '';
        $this->cli_nombre2 = $args['cli_nombre2'] ?? '';
        $this->cli_ape1 = $args['cli_ape1'] ?? '';
        $this->cli_ape2 = $args['cli_ape2'] ?? '';
        $this->cli_telefono = $args['cli_telefono'] ?? 1;
        $this->cli_email = $args['cli_email'] ?? '';
        $this->cli_pais = $args['cli_pais'] ?? '';
        $this->situacion = $args['situacion'] ?? 1;
    }

    // MÉTODOS PARA MANEJAR CONSULTAS SQL

    /**
     * Obtener todos los clientes activos
     */
    public static function obtenerClientesActivos() {
        $sql = "SELECT * FROM cliente WHERE situacion = 1";
        return self::fetchArray($sql);
    }

    /**
     * Buscar cliente por ID
     */
    public static function buscarPorId($id) {
        $sql = "SELECT * FROM cliente WHERE cli_id = {$id} AND situacion = 1";
        return self::fetchArray($sql);
    }

    /**
     * Verificar si existe un email (para validaciones)
     */
    public static function existeEmail($email, $idExcluir = null) {
        $sql = "SELECT cli_id FROM cliente WHERE cli_email = '{$email}' AND situacion = 1";
        
        if ($idExcluir) {
            $sql .= " AND cli_id != {$idExcluir}";
        }
        
        $resultado = self::fetchArray($sql);
        return count($resultado) > 0;
    }

    /**
     * Verificar si existe un teléfono (para validaciones)
     */
    public static function existeTelefono($telefono, $idExcluir = null) {
        $sql = "SELECT cli_id FROM cliente WHERE cli_telefono = '{$telefono}' AND situacion = 1";
        
        if ($idExcluir) {
            $sql .= " AND cli_id != {$idExcluir}";
        }
        
        $resultado = self::fetchArray($sql);
        return count($resultado) > 0;
    }

    /**
     * Eliminar cliente (eliminación física)
     */
    public static function EliminarClientes($id) {
        $sql = "DELETE FROM cliente WHERE cli_id = $id";
        return self::SQL($sql);
    }

    /**
     * Eliminar cliente (eliminación lógica - cambiar situación a 0)
     */
    public static function desactivarCliente($id) {
        $sql = "UPDATE cliente SET situacion = 0 WHERE cli_id = $id";
        return self::SQL($sql);
    }

    /**
     * Obtener clientes por país
     */
    public static function obtenerPorPais($pais) {
        $sql = "SELECT * FROM cliente WHERE cli_pais = '{$pais}' AND situacion = 1";
        return self::fetchArray($sql);
    }

    /**
     * Contar total de clientes activos
     */
    public static function contarClientesActivos() {
        $sql = "SELECT COUNT(*) as total FROM cliente WHERE situacion = 1";
        $resultado = self::fetchArray($sql);
        return $resultado[0]['total'] ?? 0;
    }

    /**
     * Buscar clientes por nombre (búsqueda parcial)
     */
    public static function buscarPorNombre($nombre) {
        $sql = "SELECT * FROM cliente 
                WHERE (cli_nombre1 LIKE '%{$nombre}%' 
                   OR cli_nombre2 LIKE '%{$nombre}%'
                   OR cli_ape1 LIKE '%{$nombre}%'
                   OR cli_ape2 LIKE '%{$nombre}%') 
                AND situacion = 1";
        return self::fetchArray($sql);
    }

    /**
     * Obtener últimos clientes registrados
     */
    public static function obtenerUltimosClientes($limite = 10) {
        $sql = "SELECT * FROM cliente 
                WHERE situacion = 1 
                ORDER BY cli_id DESC 
                LIMIT {$limite}";
        return self::fetchArray($sql);
    }
}