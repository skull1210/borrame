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

      echo "<h5>parte 3:</h5>";
    $a = "PHP5";
    echo "<p>";
    echo "a: ",$a," ",gettype($a);#a: PHP5 string
	echo "<br />"; 
    $z[] = &$a;
    echo "z: ",$z[0]," ",gettype($z);#z: Array array#!!!!!!!!!!!
	echo "<br />";
    $b = "5a version de PHP";
    echo "b: ",$b," ",gettype($b);#b: 5a version de PHP string
	echo "<br />";
    $c = $b*10;
    echo "c: ",$c," tipo: ",gettype($c);#c: 50 integer
	echo "<br />";
    $a .= $b;
    echo "a: ",$a," tipo: ",gettype($a);#a: PHP55a version de PHP string
	echo "<br />";
    $b *= $c;
    echo "b: ",$b," tipo: ",gettype($b);#b: 250 integer
	echo "<br />";
    $z[0] = "MySQL";
    echo "z: ",$z[0]," tipo: ",gettype($z);#z: Array array
    echo "<br />";
    
    echo "</p>";
	echo "<hr />";

     
    echo "<h5>parte 4:</h5>";
    echo "<p>";
    echo "impresion de globals (a,b,c,z,(pero z no sale aunque ponga indice))","<br />";
    echo $GLOBALS['a'],"<br />";#se puede imprimir simplemente cambiando el contenido de las comillas simples
    echo $GLOBALS['b'],"<br />";
    echo $GLOBALS['c'],"<br />";
    echo $GLOBALS['z[0]'],"<br />";
    
    echo "</p>";

    echo "<hr />";

     echo "<h5>parte 5:</h5>";
    echo "<p>";
    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;
    

    echo "valor: ",$a," tipo: ",gettype($a),"<br />";
    echo "valor: ",$b," tipo: ",gettype($b),"<br />";
    echo "valor: ",$c," tipo: ",gettype($c),"<br />";
    #a:9E3 tipo: string
    #b:7 tipo: integer
    #c:9000 tipo: double
    
    echo "</p>";
    echo "<hr />";

     echo "<h5>parte 6:</h5>";
    echo "<p>";
    echo "visualizacion usando var_dump: <br />";

    $a = "0";#NO BOOLEANO
    $b = "TRUE"; #NO BOOLEANO
    $c = FALSE;#BOOLEANO
    $d = ($a OR $b);#BOOLEANO
    $e = ($a AND $c);#BOLEANO
    $f = ($a XOR $b);#BOOLEANO
    
    

    var_dump($a);
    echo "<br />";
    var_dump($b);
    echo "<br />";
    var_dump($c);
    echo "<br />";
    var_dump($d);
    echo "<br />";
    var_dump($e);
    echo "<br />";
    var_dump($f);
    echo "<br />";
    /*
    echo "se puede ver o transformar el valor booleano de cualquier variable con boolvar usando echo de la siguiente forma:","<br />";
    echo "echo \"texto opcional\",(boolval(\$var)?'true' : 'false');";
    */
    
    
    echo "</p>";
    echo "<hr />";
?>

</body>

</html>