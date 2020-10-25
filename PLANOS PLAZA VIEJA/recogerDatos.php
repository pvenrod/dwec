<?php

    $db = new mysqli("localhost","root","","plazavieja");

    $anyo = $_REQUEST["anyo"];

    $resultado = [];

    $consulta0 = $db->query("SELECT imagen,descripcion,row_number() OVER (ORDER BY id) as num
                            FROM imagenes
                            WHERE anyo = $anyo");
    
    while ($fila = $consulta0->fetch_object()) {

        $resultado[] = $fila;

    }

    echo json_encode($resultado);

?>