<main class="main">
    <div class="message">
    <!-- <?php echo $this->mensaje; ?> -->
    <!-- <?php var_dump($this->datos); ?> -->
    </div>
    <div class="all-users">
        <div id="top-bar" class="top-bar">
            <h1 class="top-bar__title">Usuarios Actualmente</h1>
            <div class="top-bar__buttons">
                <div class="search">
                    <input type="text" placeholder="Search User">
                </div>
                <div class="user-info">
                    <i class="fas fa-plus">

                    </i>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content__header">
                <input type="checkbox" >
                <p class="content__header--text">Nombre</p>
                <p class="content__header--text">Apellido</p>
                <p class="content__header--text">Correo</p>
            </div>
            <div class="content__users">
                
                
                    <?php 
                        include_once 'models/producto.php';
                        foreach($this->datos as $dato){
                            $producto = new Producto();
                            $producto = $dato;
                        
                    ?>
                <div id="content__user" class="content__user" >
                    <p class="content__user--text nombre"><?php echo $producto->nombre; ?></p>
                    <p class="content__user--text apellido"><?php echo $producto->apellido;  ?></p>
                    <p class="content__user--text email "><?php echo $producto->email ; ?></p>
                    <div id="options" class="content__user--options">
                        <a class="content__user--link edit" id="edit" data-type="hola">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a class="content__user--link delete" id="delete">     
                            <i class="fas fa-trash"></i>
                        </a>
                        <a class="content__user--link view" id="view">     
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- 
<p class="content__user--text nombre">Dante</p>
                    <p class="content__user--text apellido">Harold</p>
                    <p class="content__user--text email ">Dante@gmail.com</p>
                    <div id="options" class="content__user--options">
                        <a class="content__user--link edit" id="edit" data-type="hola">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a class="content__user--link delete" id="delete">     
                            <i class="fas fa-trash"></i>
                        </a>
                        <a class="content__user--link view" id="view">     
                            <i class="fas fa-eye"></i>
                        </a>
                    </div> -->