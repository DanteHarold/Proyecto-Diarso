<?php
    class ProductosModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function insert($datos){
            $sql = 'INSERT INTO USERS (name,surname,email) values (:name,:surname,:email);';
            try{

                $query = $this->db->connect()->prepare($sql);
                $query->execute(
                    ['name' => $datos['name'],
                    'surname' => $datos['surname'],
                    'email' => $datos['email']
                ]);
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
            
        }
    }

?>