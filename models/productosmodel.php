<?php
    include_once 'models/producto.php';
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
               // echo $e->getMessage();
                return false;
            }
            
        }
        public function get(){
            $items  = [];

            try{
                $sql = "SELECT name, surname, email from USERS; ";
                $query = $this->db->connect()->query($sql);
                while($row = $query->fetch()){
                    $item = new Producto();
                    $item->nombre   = $row['name'];
                    $item->apellido = $row['surname'];
                    $item->email    = $row['email'];

                    array_push($items,$item);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        }
    }

?>