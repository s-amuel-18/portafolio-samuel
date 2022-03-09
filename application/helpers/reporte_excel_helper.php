<?php
function reporte($vista, $nombre_reporte = "reporte")
{

    $file = "$nombre_reporte.xls";
    $test = $vista;

    header("Content-type: application/vnd.ms-Excel");
    header("Content-Disposition: attachment; filename=$file");
    echo $test;
}
