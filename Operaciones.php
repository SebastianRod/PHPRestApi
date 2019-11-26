<?php
include('DB.php');
//Comentario de prueba para sincronizar git
class Operaciones{    
        private $con;
        public function __construct($conexion){
            $this->con = $conexion;
        }

        public function getUser($usrId, $pwd){
            
            if($usrId){
                $usrQuery = "
                    SELECT * FROM Usuario 
                    WHERE ID_USUARIO = '".$usrId."' and CLAVE_USUARIO = '".$pwd."';";
            }
            $resultado = $this->con->query($usrQuery);
            $usrData = array();
            while($usrRecord = mysqli_fetch_assoc($resultado)){
                $usrData[] = $usrRecord;
            }
            header('Content-Type: application/json');
            echo json_encode($usrData);	
        }
}
?>