<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>respuesta</title>
</head>
<body>
    <?php
    echo "<h5>el inciso 1 no se puede mostrar en navegador, ver archivo fuente en php para mas detalles</h5>";
    
    $_myvar="a"; #es valida por la condicion de que si empieza por _ es valida
    $_7var="a"; #es valida porque comienza con _
    #myvar="no"; es invalida debido a que no comienza con $
    $myvar="a"; #es valida porque todos los caracteres son ASCII y empieza con $
    $var7="e"; #valido porque no comienza por numero, si no por $
    $_element1="e"; #valido por empezar por $ y _
    #$house*5="e"; #invalido por tener la estructura de una operacion, se quedaria como house

    echo "<hr />";
      echo "<h5>parte 2:</h5>";
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo "<h5>primera asignacion:</h5>";
    echo "<p>";
    echo $a,"<br />";
    echo $b,"<br />";
    echo $c,"<br />";
    echo "</p>";

    $a = "PHP server";
    $b = &$a;

    echo "<h5>segunda asignacion:</h5>";
    echo "<p>";
    echo $a,"<br />";
    echo $b,"<br />";
    echo $c,"<br />";
    echo "<br  />";
    echo "esto ocurre por la siguiente secuencia:","<br />";
    echo "a = 'ManejadorSQL","<br />";
    echo "b = 'MySQL'","<br />";
    echo "c = a","<br />";

    echo "despues, ocurre una asignacion:","<br  />";
    echo "<br  />";
    echo "a='PHP server'","<br  />";
    echo "b= a (PHP server)","<br  />";
    echo "c=a (PHP server)","<br  />";
    echo "</p>";

    echo "<hr />";
?>

</body>

</html>