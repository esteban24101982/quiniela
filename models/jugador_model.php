<?php
Class Jugador_Model extends Models{
    
    public function __construct() 
    {
        parent::__construct();
    }
    /* Inserta un jugador en la BD */
    public function guardarJugador($datos){
        //Consulto existencia
        $consultaExistenciaJugador = $this->db->select("SELECT * FROM jugador "
                . "WHERE nombre = '" . $datos['txt_nombreJugador'] . "' ");

        if ($consultaExistenciaJugador != null) {
            //Si ya existe, realizare un update
            echo 'Error... ya existe jugador con el mismo nombre';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('jugador', array(
                'nombre' => $datos['txt_nombreJugador'],
                'posicion' => $datos['txt_posicion'],
                'id_equipo' => $datos['txt_equipo']));
        }
    } 
    
    /* Mostrar todos los jugadores en la BD */
    public function listaJugadores(){
        //Consulto existencia
        $consultaListaJugadores = $this->db->select("SELECT * FROM jugador ");
        return $consultaListaJugadores;
    }
    /* Inserta un jugador en la BD */
    public function datosJugador($id){
        //Consulto existencia
        $consultaExistenciaJugador = $this->db->select("SELECT * FROM jugador "
                . "WHERE id = " . $id . " ");

        if ($consultaExistenciaJugador != null) {
            //Si ya existe, realizare un update
            return $consultaExistenciaJugador;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'error, Jugador no encontrado';
            die;
        }
    } 
    
    /* actualiza un jugador en la BD */
    public function actualizarJugador($datos){
        //Consulto existencia
        $consultaExistenciaJugador = $this->db->select("SELECT * FROM jugador "
                . "WHERE id = '" . $datos['idJugador'] . "' ");

        if ($consultaExistenciaJugador != null) {
            //Si ya existe, realizare un update
            $posData = array(
                'nombre' => $datos['txt_nombreJugador'],
                'posicion' => $datos['txt_posicion'],
                'id_equipo' => $datos['txt_equipo']);

            $this->db->update('jugador', $posData, "`id` = '{$datos['idJugador']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error, no existe jugador con ese ID';
            die;
        }
    } 
    
    /* actualiza un jugador en la BD */
    public function eliminarJugador($id){
        //Consulto existencia
        $consultaExistenciaJugador = $this->db->select("SELECT * FROM jugador "
                . "WHERE id = '" . $id . "' ");

        if ($consultaExistenciaJugador != null) {
            //Si ya existe, realizare un update
            $this->db->delete('jugador', "`id` = '{$id}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error, no existe jugador con ese ID';
            die;
        }
    } 
    
    /* Mostrar todos los equipos en la BD */
    public function consultaEquipos(){
        //Consulto existencia
        $consultaListaEquipos = $this->db->select("SELECT * FROM equipo ");
        return $consultaListaEquipos;
    }
}

?>
