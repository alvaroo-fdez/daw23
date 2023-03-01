<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
	    // Pequeño comentario para cambiar el index
            require_once 'Espectaculo.php';
            
            $espectaculo = new Espectaculo("QUE", "Quédate conmigo", "02");
            
            if($espectaculo->alta_espectaculo()){
                echo "Se ha dado de alta el espectáculo correctamente <br>";
            }else{
                echo "No se ha podido almacenar el espectáculo <br>";
            }
            
            if($espectaculo->asignar_estrellas(2)){
                echo "Se han asignado las estrellas del espectáculo correctamente <br>";
            }else{
                echo "No se han podido asignar las estrellas al espectáculo <br>";
            }
            
            $mostrar =  $espectaculo->mostrar_espectaculo("QUE");
            
            foreach ($mostrar as $espec) {
                echo "<h3>Espectaculo</h3>"
                    . ' <p>Código de espectaculo: <b>'.$espec['cdespec'].'</b></p>'
                    . ' <p>Nombre: '.$espec['nombre'].'</p>'
                    . ' <p>Tipo: '.$espec['tipo'].'</p>'
                    . ' <p>Código de grupo: '.$espec['cdgru'].'</p>'
                    . ' <p>Estrellas: ' . $espec['estrellas'] . '</p>';
            }
            
            if($espectaculo->eliminar_espectaculo("QUE")){
                echo "Se ha eliminado el espectáculo correctamente <br>";
            }else{
                echo "No se ha podido eliminar el espectáculo deseado <br>";
            }
            
            $espectaculos = Espectaculo::mostrar_todos_espectaculos();
            
            echo "<h1>Mostrando todos los espectáculos</h1>";
            foreach ($espectaculos as $unEspectaculo) {
                echo "<h3>Espectaculo</h3>"
                    . ' <p>Código de espectaculo: <b>'.$unEspectaculo['cdespec'].'</b></p>'
                    . ' <p>Nombre: '.$unEspectaculo['nombre'].'</p>'
                    . ' <p>Tipo: '.$unEspectaculo['tipo'].'</p>'
                    . ' <p>Código de grupo: '.$unEspectaculo['cdgru'].'</p>'
                    . ' <p>Estrellas: ' . $unEspectaculo['estrellas'] . '</p>';
            }
            
        ?>
    </body>
</html>
