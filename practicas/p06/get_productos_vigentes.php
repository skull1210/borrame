<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
   

   
        @$link = new mysqli('localhost', 'root', '', 'productos');
        
        if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
		}
        if ( $result = $link->query("SELECT * FROM productos WHERE unidades >= 1 and eliminado = 0") ) 
		{
			$row = $result->fetch_all(MYSQLI_ASSOC);
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>Nombre</td>";
            echo "<td>Marca</td>";
            echo "<td>Modelo</td>";
            echo "<td>Precio</td>";
            echo "<td>Detalles</td>";
            echo "<td>Unidades</td>";
            echo "<td>Imagen</td>";
            echo "<td>Estado</td>";
            echo "</tr>";
            foreach($row as $num => $registro){
                echo "<tr>";
                foreach($registro as $key => $value){
                    $data[$num][$key] = utf8_encode($value);

                    if($key=='imagen'){
                        echo "<td><img src='",$data[$num][$key],"' style='height:100px'></td>";
                    }
                    else{
                        echo "<td>",$data[$num][$key],"</td>";
                    }
                    
                    
                    
                }
                echo "</tr>";
            }
            echo "</table>";
			$result->free();
		}
		$link->close();

    

    ?>
</body>
</html>