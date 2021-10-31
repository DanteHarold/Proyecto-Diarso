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
                $sql = "SELECT id,name, surname, email from USERS; ";
                $query = $this->db->connect()->query($sql);
                while($row = $query->fetch()){
                    $item = new Producto();
                    $item->id   = $row['id'];
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
        public function getById($id){
            $item = new Producto();
            try{
                $sql = "SELECT name, surname, email from USERS where id=:id;";
                $query = $this->db->connect()->prepare($sql);

                $query->execute(['id'=>$id]);

                while($row = $query->fetch()){
                    $item->nombre = $row['name'];
                    $item->apellido = $row['surname'];
                    $item->email = $row['email'];
                }
                return $item;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function update($item){
            try{
                $sql = "UPDATE USERS SET name=:name,surname=:surname,email=:email where id=:id;";
                $query = $this->db->connect()->prepare($sql);
                $query->execute([
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'surname' => $item['surname'],
                    'email' => $item['email']
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
            
        }
        public function delete($id){
            try{
                $sql = "DELETE FROM USERS where id=:id;";
                $query = $this->db->connect()->prepare($sql);
                $query->execute([
                    'id' => $id
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }

?>