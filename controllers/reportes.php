<?php
    class Reportes extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->render('reportes/index');
        }
        //Metodos
    }


?>