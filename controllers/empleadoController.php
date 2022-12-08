<?php
require_once "models/Empleado.php";
class EmpleadoController{
    public function gestor(){
        //$empleados = Empleado::getAll();
        viewComponent ('http://localhost/adsi/x/',['page_tittle'=>'Gestor de empleado',
                         'header_title'=> 'Gestor de empleados'
        //'lista_empleados' => $empleados
        ]);
    }
}