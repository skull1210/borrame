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
?>
</body>

</html>