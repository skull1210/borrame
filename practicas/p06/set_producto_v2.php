<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>resultado del proceso</title>
</head>
<body>
    <?php
    $ver1=false;
    $ver2=false;
    $ver3=false;
    $ver4=false;
    $ver5=false;
    $ver6=false;
    $ver7=false;
    if(!empty($_POST['nom'])){
        $ver1=true;
    }
    if(!empty($_POST['marc'])){
        $ver2=true;
    }
    if(!empty($_POST['mod'])){
        $ver3=true;
    }
    if(!empty($_POST['pre'])){
        $var1=$_POST['pre'];
        if(is_double($var1) or is_numeric($_POST['pre'])){
            $ver4=true;
        }
        elseif(str_contains($_POST['pre'],".")){
            $ver4=true;
        }
    }
    if(!empty($_POST['det'])){
        $ver5=true;
    }
    if(!empty($_POST['uni'])){
        $var2=$_POST['uni'];
        
        if(is_numeric($var2)){
            $ver6=true;
        }
    }
    if(!empty($_POST['im'])){
        $ver7=true;
    }
    if($ver1 and $ver2 and $ver3 and $ver4 and $ver5 and $ver6 and $ver7){
        $nombre=$_POST['nom'];
        $marca=$_POST['marc'];
        $modelo=$_POST['mod'];
        $precio=$_POST['pre'];
        $detalles=$_POST['det'];
        $unidades=$_POST['uni'];
        $imagen=$_POST['im'];
        $eliminado=0;

        @$link = new mysqli('localhost', 'root', '', 'productos');
        if ($link->connect_errno){
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }
        $sql = "INSERT INTO productos VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', {$eliminado}, 0)";

        if ($link->query($sql)){
            echo "<p>Se ha completado la insercion, ID: ",$link->insert_id,"</p>";
        }
        else
        {
	        echo "<p>Hubo un error desconocido</p>";
        }

        $link->close();
    } 
    else{
        $err=1;
        echo "<h2>Se han encontrado errores</h2>";
        echo "<h5>Revise el siguiente registro y vuelva a intentarlo</h5>";
        echo "<hr/>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>Numero de error</td>";
        echo "<td>Mensaje de error</td>";
        echo "</tr>";
        if(!$ver1){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>El campo nombre esta vacio, por favor rellenelo para continuar</td>";
            echo "</tr>";
            $err++;
        }
        if(!$ver2){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>El campo marca esta vacio, por favor rellenelo para continuar</td>";
            echo "</tr>";
            $err++;
        }
        if(!$ver3){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>El campo modelo esta vacio, por favor rellenelo para continuar</td>";
            echo "</tr>";
            $err++;
        }
        if(!$ver4){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>Verifique si su precio tiene punto decimal, si esta vacio o si introdujo una cadena</td>";
            echo "</tr>";
            $err++;
        }
        if(!$ver5){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>El campo detalles esta vacio, por favor rellenelo para continuar</td>";
            echo "</tr>";
            $err++;
        }
        if(!$ver6){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>Verifique si el campo unidades tiene punto decimal, si esta vacio o si introdujo una cadena</td>";
            echo "</tr>";
            $err++;
        }
        if(!$ver7){
            echo "<tr>";
                echo "<td>",$err,"</td>";
                echo "<td>La ruta hacia la imagen esta vacia</td>";
            echo "</tr>";
            $err++;
        }
        echo "</table>";
    }
    
?>
    
</body>
</html>