<?php

require_once "../capa_conexion/conexion.php";

$obj = new conectar();
$conexion = $obj->conexion();

$ano = $_GET["ano"];
$periodo = $_GET["periodo"];
$estado = $_GET["estado"];
$idusu = $_GET["idusu"];

if (
    $estado === 'INGRESADO' || $estado === 'PROCESANDO' || $estado === 'PENDIENTE' ||
    $estado === 'DELIVERY' || $estado === 'BOLSA' || $estado === 'SALIDAANTICIPADA' || $estado === 'ADR'
) {

    $sqlncMovil = " SELECT  ncf.id_cargo,
                            ncf.fecha_ingreso, 
                            ncf.ruc,
                            ncf.razon_social,
                            ncf.modalidad,
                            ncf.cargo_fijo, 
                            ncf.estado,
                            ncf.validacion
                            from nc_movil as ncf 
                            where  year(ncf.fecha_ingreso)<='$ano' 
                            and ncf.id_usuario='$idusu' 
                            and ncf.estado='$estado'
                            and validacion <> 'RECHAZADO'
                            ORDER BY ncf.fecha_ingreso DESC";
} else {

    if ($estado === 'ACTIVADO') {
        $sqlncMovil = " SELECT  ncf.id_cargo,
                                ncf.fecha_ingreso, 
                                ncf.ruc,
                                ncf.razon_social,
                                ncf.modalidad,
                                ncf.cargo_fijo, 
                                ncf.estado,
                                ncf.validacion
                                from nc_movil as ncf 
                                where month(ncf.fecha_actualizacion)='$periodo' 
                                and year(ncf.fecha_actualizacion)='$ano' 
                                and ncf.id_usuario='$idusu' 
                                and ncf.estado='$estado'
                                and validacion <> 'RECHAZADO'
                                ORDER BY ncf.fecha_ingreso DESC";
    } else {

        if ($estado === 'CAIDA') {

            $sqlncMovil = " SELECT  ncf.id_cargo,
                                    ncf.fecha_ingreso, 
                                    ncf.ruc,
                                    ncf.razon_social,
                                    ncf.modalidad,
                                    ncf.cargo_fijo, 
                                    ncf.estado,
                                    ncf.validacion
                                    from nc_movil as ncf 
                                    where month(ncf.fecha_ingreso)='$periodo' 
                                    and year(ncf.fecha_ingreso)='$ano' 
                                    and ncf.id_usuario='$idusu' 
                                    and ncf.estado='$estado'
                                    and validacion <> 'RECHAZADO'
                                    ORDER BY ncf.fecha_ingreso DESC";
        } else {

            $sqlncMovil = " SELECT  ncf.id_cargo,
                                    ncf.fecha_ingreso, 
                                    ncf.ruc,
                                    ncf.razon_social,
                                    ncf.modalidad,
                                    ncf.cargo_fijo, 
                                    ncf.estado,
                                    ncf.validacion
                                    from nc_movil as ncf 
                                    where  year(ncf.fecha_ingreso)<='$ano' and 
                                    ncf.id_usuario='$idusu' and ncf.estado 
                                    in ('INGRESADO','PROCESANDO','PENDIENTE','DELIVERY','BOLSA','SALIDAANTICIPADA','ADR')
                                    and validacion <> 'RECHAZADO'

                            UNION 

                            SELECT  ncf.id_cargo,
                                    ncf.fecha_ingreso, 
                                    ncf.ruc,
                                    ncf.razon_social,
                                    ncf.modalidad,
                                    ncf.cargo_fijo, 
                                    ncf.estado,
                                    ncf.validacion
                                    from nc_movil as ncf 
                                    where month(ncf.fecha_actualizacion)='$periodo' 
                                    and year(ncf.fecha_actualizacion)='$ano' 
                                    and ncf.id_usuario='$idusu' 
                                    and ncf.estado='ACTIVADO'
                                    and validacion <> 'RECHAZADO'

                            UNION

                            SELECT  ncf.id_cargo,
                                    ncf.fecha_ingreso, 
                                    ncf.ruc,
                                    ncf.razon_social,
                                    ncf.modalidad,
                                    ncf.cargo_fijo, 
                                    ncf.estado,
                                    ncf.validacion
                                    from nc_movil as ncf 
                                    where month(ncf.fecha_ingreso)='$periodo' 
                                    and year(ncf.fecha_ingreso)='$ano' 
                                    and ncf.id_usuario='$idusu' 
                                    and ncf.estado='CAIDA'
                                    and validacion <> 'RECHAZADO'
                                    ";
        }
    }
}



$resultncMovil = mysqli_query($conexion, $sqlncMovil);

?>

<form class="form form-horizontal">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div>
                <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                    <thead style="background-color: #00a65a;color: white; font-weight: bold;">
                        <tr>
                            <th>INGRESO</th>
                            <th>RUC</th>
                            <th>RAZON SOCIAL</th>
                            <th>MODALIDAD</th>
                            <th>CARGO FIJO</th>
                            <th>ESTADO</th>
                            <th>VALIDADO</th>
                            <th>DETALLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($mostrar = mysqli_fetch_array($resultncMovil)) {
                        ?>
                            <tr>
                                <td><?php echo $mostrar[1] ?></td>
                                <td><?php echo $mostrar[2] ?></td>
                                <td><?php echo $mostrar[3] ?></td>
                                <td><?php echo $mostrar[4] ?></td>
                                <td><?php echo $mostrar[5] ?></td>
                                <td><?php echo $mostrar[6] ?></td>
                                <td><?php echo $mostrar[7] ?></td>
                                <td style="text-align: center;">
                                    <span class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalSeguimiento" onclick="TraerDatosTabla('<?php echo $mostrar[0] ?>')"> <span class="fa fa-check-circle"></span>
                                    </span>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#iddatatable').DataTable();
    });
</script>