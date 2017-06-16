<?php
Class Equipo_Model extends Models{
    
    public function __construct() 
    {
        parent::__construct();
    }
    /* Inserta un equipo en la BD */
    public function guardarEquipo($datos){
        //Consulto existencia
        $consultaExistenciaEquipo = $this->db->select("SELECT * FROM equipo "
                . "WHERE nombre = '" . $datos['txt_nombreEquipo'] . "' ");

        if ($consultaExistenciaEquipo != null) {
            //Si ya existe, realizare un update
            echo 'Error... ya existe equipo con el mismo nombre';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('equipo', array(
                'nombre' => $datos['txt_nombreEquipo'],
                'escudo' => $datos['txt_escudo']));
        }
    } 
    
    /* Mostrar todos los equipos en la BD */
    public function listaEquipos(){
        //Consulto existencia
        $consultaListaEquipos = $this->db->select("SELECT * FROM equipo ");
        return $consultaListaEquipos;
    }
    /* Inserta un equipo en la BD */
    public function datosEquipo($id){
        //Consulto existencia
        $consultaExistenciaEquipo = $this->db->select("SELECT * FROM equipo "
                . "WHERE id = " . $id . " ");

        if ($consultaExistenciaEquipo != null) {
            //Si ya existe, realizare un update
            return $consultaExistenciaEquipo;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'error, Equipo no encontrado';
            die;
        }
    } 
    
    /* actualiza un equipo en la BD */
    public function actualizarEquipo($datos){
        //Consulto existencia
        $consultaExistenciaEquipo = $this->db->select("SELECT * FROM equipo "
                . "WHERE id = '" . $datos['idEquipo'] . "' ");

        if ($consultaExistenciaEquipo != null) {
            //Si ya existe, realizare un update
            $posData = array(
                'nombre' => $datos['txt_nombreEquipo'],
                'escudo' => $datos['txt_escudo']);

            $this->db->update('equipo', $posData, "`id` = '{$datos['idEquipo']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error, no existe equipo con ese ID';
            die;
        }
    } 
    
    /* actualiza un equipo en la BD */
    public function eliminarEquipo($id){
        //Consulto existencia
        $consultaExistenciaEquipo = $this->db->select("SELECT * FROM equipo "
                . "WHERE id = '" . $id . "' ");

        if ($consultaExistenciaEquipo != null) {
            //Si ya existe, realizare un update
            $this->db->delete('equipo', "`id` = '{$id}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error, no existe equipo con ese ID';
            die;
        }
    } 
}

?>
