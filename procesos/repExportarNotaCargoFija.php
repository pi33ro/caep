<?php
session_start();
$idusu = $_SESSION["idusu"];
require_once "../capa_conexion/conexion.php";

$obj = new conectar();
$conexion = $obj->conexion();

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= notaCargoFija.xls");

$ano = $_POST["ncano"];
$periodo = $_POST["ncperiodo"];
$estado = $_POST["ncestado"];
$tienda = $_POST["tiendaf"];
$idusu = $_POST["idusu"];


if ($estado === 'PENDIENTE') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'XINGRESAR') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'AGENDADO') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'INICIADO') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'COMPLETADO') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'CANCELADO') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado,
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'BOLSA') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado,
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === 'OBSERVADO') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else if ($estado === '') {
    $sqlEXCEL = " SELECT    usu.personal, 
                            sup.nombre, 
                            nc.fecha_ingreso, 
                            nc.fecha_actualizacion,
                            nc.ruc, 
                            nc.razon_social, 
                            nc.modalidad,
                            nc.tipo, 
                            nc.q_lineas, 
                            nc.cargo_fijo, 
                            nc.telefono1, 
                            nc.telefono2, 
                            nc.comentario, 
                            nc.estado, 
                            nc.fecha_validacion, 
                            nc.comentario_validador, 
                            nc.ejecutivo_telefonica, 
                            t.nombre,
                            nc.comentario_back
                            FROM nc_fija as nc 
                            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                            where  year(nc.fecha_ingreso)='$ano' 
                            and month(nc.fecha_ingreso)='$periodo'
                            and usu.id_usuario='$idusu' 
                            and nc.estado='$estado' 
                            ORDER BY nc.fecha_ingreso DESC";
} else {

            $sqlEXCEL = " SELECT    usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado, 
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where  year(nc.fecha_ingreso)='$ano' 
                                    and month(nc.fecha_ingreso)='$periodo'
                                    and usu.id_usuario='$idusu' 
                                    and nc.estado='PENDIENTE' 
UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_validacion)='$periodo' 
                                    and year(nc.fecha_validacion)='$ano' 
                                    and usu.id_usuario='$idusu' 
                                    and nc.estado='XINGRESAR' 

UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
                                    and nc.estado='AGENDADO'
                                    
                                    UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
                                    and nc.estado='INICIADO'
                                    
                                    UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
                                    and nc.estado='COMPLETADO'
                                    
                                    UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
                                    and nc.estado='CANCELADO'
                                    
                                    UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
                                    and nc.estado='BOLSA'

                                    UNION

                        SELECT      usu.personal, 
                                    sup.nombre, 
                                    nc.fecha_ingreso, 
                                    nc.fecha_actualizacion,
                                    nc.ruc, 
                                    nc.razon_social, 
                                    nc.modalidad,
                                    nc.tipo, 
                                    nc.q_lineas, 
                                    nc.cargo_fijo, 
                                    nc.telefono1, 
                                    nc.telefono2, 
                                    nc.comentario, 
                                    nc.estado,
                                    nc.fecha_validacion, 
                                    nc.comentario_validador, 
                                    nc.ejecutivo_telefonica, 
                                    t.nombre,
                                    nc.comentario_back
                                    FROM nc_fija as nc 
                                    inner join usuario as usu on usu.id_usuario= nc.id_usuario 
                                    left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
                                    LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
                                    where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
                                    and nc.estado='OBSERVADO' UNION

SELECT      usu.personal, 
            sup.nombre, 
            nc.fecha_ingreso, 
            nc.fecha_actualizacion,
            nc.ruc, 
            nc.razon_social, 
            nc.modalidad,
            nc.tipo, 
            nc.q_lineas, 
            nc.cargo_fijo, 
            nc.telefono1, 
            nc.telefono2, 
            nc.comentario, 
            nc.estado,
            nc.fecha_validacion, 
            nc.comentario_validador, 
            nc.ejecutivo_telefonica, 
            t.nombre,
            nc.comentario_back
            FROM nc_fija as nc 
            inner join usuario as usu on usu.id_usuario= nc.id_usuario 
            left JOIN supervisor as sup on sup.id_supervisor= nc.id_supervisor 
            LEFT JOIN tienda as t on t.id_tienda=nc.zonal_telefonica
            where month(nc.fecha_ingreso)='$periodo' and year(nc.fecha_ingreso)='$ano' and usu.id_usuario='$idusu' 
            and nc.estado='' ";
        }




$resultEXCEL = mysqli_query($conexion, $sqlEXCEL);

?>

<table class="table table-hover table-condensed table-bordered" id="iddatatable">
    <thead style="background-color: #dc3545;color: blue; font-weight: bold;">
        <tr>

            <th>PERSONAL</th>
            <th>SUPERVISOR</th>
            <th>FECHA INGRESO</th>
            <th>FECHA ULT ACTUALIZACION</th>
            <th>RUC</th>
            <th>RAZON SOCIAL</th>
            <th>MODALIDAD</th>
            <th>TIPO</th>
            <th>Q_LINEAS</th>
            <th>CARGO_FIJO</th>
            <th>TELEFONO 1</th>
            <th>TELEFONO 2</th>
            <th>COMENTARIO EJECUTIVO</th>
            <th>ESTADO</th>
            <th>FECHA VALIDACION</th>
            <th>COMENTARIO VALIDADOR</th>
            <th>EJECUTIVO TELEFONICA</th>
            <th>ZONAL TELEFONICA</th>
            <th>COMENTARIO BACK</th>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($mostrar = mysqli_fetch_array($resultEXCEL)) {
        ?>
        <tr>
            <td><?php echo utf8_decode($mostrar[0]) ?></td>
            <td><?php echo utf8_decode($mostrar[1]) ?></td>
            <td><?php echo utf8_decode($mostrar[2]) ?></td>
            <td><?php echo utf8_decode($mostrar[3]) ?></td>
            <td><?php echo utf8_decode($mostrar[4]) ?></td>
            <td><?php echo utf8_decode($mostrar[5]) ?></td>
            <td><?php echo utf8_decode($mostrar[6]) ?></td>
            <td><?php echo utf8_decode($mostrar[7]) ?></td>
            <td><?php echo utf8_decode($mostrar[8]) ?></td>
            <td><?php echo utf8_decode($mostrar[9]) ?></td>
            <td><?php echo utf8_decode($mostrar[10]) ?></td>
            <td><?php echo utf8_decode($mostrar[11]) ?></td>
            <td><?php echo utf8_decode($mostrar[12]) ?></td>
            <td><?php echo utf8_decode($mostrar[13]) ?></td>
            <td><?php echo utf8_decode($mostrar[14]) ?></td>
            <td><?php echo utf8_decode($mostrar[15]) ?></td>
            <td><?php echo utf8_decode($mostrar[16]) ?></td>
            <td><?php echo utf8_decode($mostrar[17]) ?></td>
            <td><?php echo utf8_decode($mostrar[18]) ?></td>

        </tr>
        <?php
        }
        ?>
    </tbody>
</table>