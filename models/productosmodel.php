<?php
    //include_once 'models/producto.php';
    require_once 'models/producto.php';
    require_once 'models/database.php';
    require_once 'libs/IConexion.php';
    require_once 'libs/ConexionFabrica.php';
    class ProductosModel implements IConexion{
        /*
        public function __construct(){
            parent::__construct();
        }
        */
        public function __construct(){
            $this->fabrica = new ConexionFabrica();               
        }
        public function insert($datos){
            $db = $this->fabrica->getConexion("Conexion");  
            try{
                $sql = 'INSERT INTO USERS (name,surname,email) values (:name,:surname,:email);';
                $query = $db->connect()->prepare($sql);
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
            $db = $this->fabrica->getConexion("Conexion");  
            try{
                $sql = "SELECT id,name, surname, email from USERS; ";            
                $query = $db->connect()->query($sql);
                while($row = $query->fetch()){
                    $producto = $this->fabrica->getConexion("Producto");
                    $producto->setId($row['id']);
                    $producto->setNombre($row['name']);
                    $producto->setApellido($row['surname']);
                    $producto->setEmail($row['email']);
                    array_push($items,$producto);
                }
                return $items;
            }catch(PDOException $e){
                return [];
            }
        
        }    
        public function getById($id){
            $producto =  $this->fabrica->getConexion("Producto");
            $db = $this->fabrica->getConexion("Conexion");  
            try{
                $sql = "SELECT name, surname, email from USERS where id=:id;";
                $query = $db->connect()->prepare($sql);

                $query->execute(['id'=>$id]);

                while($row = $query->fetch()){
                    $producto->setNombre($row['name']);
                    $producto->setApellido($row['surname']);
                    $producto->setEmail($row['email']);
                }
                return $producto;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function update($item){
            $db = $this->fabrica->getConexion("Conexion");  
            try{
                $sql = "UPDATE USERS SET name=:name,surname=:surname,email=:email where id=:id;";
                $query = $db->connect()->prepare($sql);
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
            $db = $this->fabrica->getConexion("Conexion");  
            try{
                $sql = "DELETE FROM USERS where id=:id;";
                $query = $db->connect()->prepare($sql);
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