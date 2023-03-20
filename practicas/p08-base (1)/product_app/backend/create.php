<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {

        #echo "aqui empieza ",$producto;

        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $nombre=$jsonOBJ->nombre;
        $marca=$jsonOBJ->marca;
        $modelo=$jsonOBJ->modelo;
        $precio=$jsonOBJ->precio;
        $detalles=$jsonOBJ->detalles;
        $unidades=$jsonOBJ->unidades;
        $imagen=$jsonOBJ->imagen;
        $eliminado=0;

        @$link = new mysqli('localhost', 'root', '', 'productos');
        if ($link->connect_errno){
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }
        $conexion=new mysqli('localhost', 'root', '', 'productos');
        if ($conexion->connect_errno){
            die('Falló la conexión: '.$conexion->connect_error.'<br/>');
        }
        $sql = "SELECT * FROM productos WHERE nombre = '$nombre' and eliminado = 0";
        
	    $result = $conexion->query($sql);

	    if ($result->num_rows == 0) {
            
		    $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', {$eliminado})";

            if ($link->query($sql)){
                echo "Se ha completado la insercion, ID: ",$link->insert_id,"\n";
            }
            else
            {
	            window.alert("Hubo un error desconocido");
            }

            
	    }
        else{
            echo "hay registros duplicados L";
        }
        $conexion->close();
        $link->close();

        echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;
    }
?>