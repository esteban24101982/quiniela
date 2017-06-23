<?php
class Jugador extends Controllers {
    function __construct(){
        parent::__construct();
    }
    function agregarJugador(){
        $this->view->title = 'Mantenimiento de jugadores'; 
        $this->view->render('header');
        $this->view->consultaEquipos=$this->model->consultaEquipos();
        $this->view->render('jugador/agregarJugador');
        $this->view->render('footer');
    }
    function verJugadores(){
        $this->view->title = 'Mantenimiento de jugadores'; 
        $this->view->render('header');
        $this->view->listaJugadores=$this->model->listaJugadores();
        $this->view->render('jugador/verJugadores');
        $this->view->render('footer');
    }
    function guardarJugador(){
        $datos=array();
        $datos['txt_nombreJugador']=$_POST['txt_nombreJugador'];
        $datos['txt_posicion']=$_POST['txt_posicion'];
        $datos['txt_equipo']=$_POST['txt_equipo'];
        $this->model->guardarJugador($datos);
        header("Location:". URL ."jugador/verJugadores");
    }
    function editarJugador($id){
        $this->view->title = 'Mantenimiento de jugadores'; 
        $this->view->render('header');
        $this->view->datosJugador=$this->model->datosJugador($id);
        $this->view->render('jugador/editarJugador');
        $this->view->render('footer');
    }
    function actualizarJugador(){
        $datos=array();
        $datos['idJugador']=$_POST['idJugador'];
        $datos['txt_nombreJugador']=$_POST['txt_nombreJugador'];
        $datos['txt_posicion']=$_POST['txt_posicion'];
        $datos['txt_equipo']=$_POST['txt_equipo'];
        $this->model->actualizarJugador($datos);
        header("Location:". URL ."jugador/verJugadores");
    }
    function eliminarJugador($id){
        $this->view->title = 'Mantenimiento de jugadores';
        $this->model->eliminarJugador($id);
        header("Location:". URL ."jugador/verJugadores");
    }
}
?>
