<?php

    $db = new mysqli("localhost","root","","plazavieja");

    $cantidad = $_REQUEST["cantidad"];
    $anyo = $_REQUEST["anyo"];
    $imagenes = [""];
    $descripciones = [""];
    $directorio = "imagenes/";
    $nombreCompleto;
    $primeraImagen;
    $id;

    $consulta0 = $db->query("SELECT id
                            FROM imagenes
                            WHERE anyo = $anyo
                            ORDER BY id DESC
                            LIMIT 1");
    
    if ($consulta0->num_rows == 0) {

        $primeraImagen = 0;

    }
    else {

        while ($fila = $consulta0->fetch_object()) {

            $primeraImagen = $fila->id;

        }

    }

    $consulta1 = $db->query("SELECT id
                            FROM imagenes
                            ORDER BY id DESC
                            LIMIT 1");
    
    if ($consulta1->num_rows == 0) {

        $id = 0;

    }
    else {

        while ($fila = $consulta1->fetch_object()) {

            $id = $fila->id;

        }

    }

    for ($i=1; $i<=$cantidad; $i++) {

        $primeraImagen++;
        $id++;

        $nombreCompleto = $directorio . $anyo . "-" . $primeraImagen . ".png";
        
        move_uploaded_file($_FILES["img" . $i]["tmp_name"], $nombreCompleto);

        $descripciones[$i] = $_REQUEST["text" . $i];

        $consulta2 = $db->query("INSERT INTO imagenes
                                VALUES ($id, '$descripciones[$i]', $anyo, '$nombreCompleto');");

        echo $db->error;

    }

?>