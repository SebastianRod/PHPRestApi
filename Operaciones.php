<?php
include('DB.php');

class Operaciones{    
        private $con;
        public function __construct($conexion){
            $this->con = $conexion;
        }

        public function getUser($usrId){
            
            if($usrId){
                $usrQuery = "
                    SELECT * FROM Usuario 
                    WHERE ID_USUARIO = '".$usrId."';";
            }else{
                $usrQuery = "
                    SELECT * FROM Usuario;";
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