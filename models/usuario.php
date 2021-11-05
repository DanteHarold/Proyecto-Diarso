<?php
    class Usuario{

        private $id;
        private $nombre;
        private $apellido;
        private $email;

        public function __construct(int $id,string $nombre,string $apellido,string $email){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
        }

        public function getId():int {
            return $this->id;
        }
    
        public function setId(int $id) {
            $this->id = $id;
        }
    
        public function getNombre():string {
            return $this->nombre;
        }
    
        public function setNombre(string $nombre) {
            $this->nombre = $nombre;
        }
        public function getApellido():string {
            return $this->apellido;
        }
    
        public function setApellido(string $apellido) {
            $this->apellido = $apellido;
        }
    
        public function getEmail():string {
            return $this->email;
        }
    
        public function setEmail(string $email) {
            $this->email = $email;
        }

    }

?>