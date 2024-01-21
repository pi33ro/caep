<?php
session_start();

if (isset($_SESSION["idusu"])) {

  $idusu = $_SESSION["idusu"];
  require_once "../capa_conexion/conexion.php";
  $obj = new conectar();
  $conexion = $obj->conexion();


  $sql = "SELECT id_tienda from asigna where id_usuario='$idusu' and estado='0'";

  $result = mysqli_query($conexion, $sql);

  $ver = mysqli_fetch_array($result);

  $tienda = $ver[0];


?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LLAMADA | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php
    include 'scriptsup.php';
    ?>
    <link rel="stylesheet" type="text/css" href="../capa_presentacion/librerias/datatable/dataTables.bootstrap4.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
  </head>

  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">

      <?php
      include 'cabecera.php';
      ?>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php
        include 'menu.php';
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Contenido de la pÃ¡gina -->


      <div class="content-wrapper">
        <div class="col-lg-12" style="background-color: #00a65a;color: white; font-weight: bold;text-align: center ">SEGUIMIENTO NOTA DE CARGO MOVIL</div>


        </br>
        <form class="form form-horizontal" id='frmrepexportarback' action="../procesos/repexportarmovilbackglobal.php" method="post">
          <input type="hidden" class="form-control input-sm" id="tienda" name="tienda" value="<?php echo $tienda ?>">
          <ol class="breadcrumb">
            <div class="form-group">

              <div class="col-xs-1">
                <label>PERIODO</label>
              </div>
              <div class="col-xs-2">
                <select name="ncano" class="form-control" id='ncano'>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023" selected>2023</option>



                </select>
              </div>

              <div class="col-xs-2">
                <select name="ncperiodo" class="form-control" id='ncperiodo'>
                  <option value="01">ENERO</option>
                  <option value="02">FEBRERO</option>
                  <option value="03">MARZO</option>
                  <option value="04">ABRIL</option>
                  <option value="05">MAYO</option>
                  <option value="06">JUNIO</option>
                  <option value="07">JULIO</option>
                  <option value="08">AGOSTO</option>
                  <option value="09">SETIEMBRE</option>
                  <option value="10">OCTUBRE</option>
                  <option value="11">NOVIEMBRE</option>
                  <option value="12">DICIEMBRE</option>

                </select>
              </div>



              <div class="col-xs-1">
                <label>ESTADO</label>
              </div>
              <div class="col-xs-2">

                <select name="ncestadof" class="form-control" id='ncestadof'>

                  <option value="PENDIENTE">PENDIENTE</option>
                  <option value="PROCESANDO">PROCESANDO</option>
                  <option value="INGRESADO">INGRESADO</option>
                  <option value="DELIVERY">DELIVERY</option>
                  <option value="ACTIVADO">ACTIVADO</option>
                  <option value="CAIDA">CAIDA</option>
                  <option value="BOLSA">BOLSA</option>
                  <option value="SALIDAANTICIPADA">SALIDA ANTICIPADA</option>
                  <option value="LIQUIDADO">LIQUIDADO</option>
                  <option value="ADR">ADR</option>
                  <option value="TODO" selected>TODO</option>

                </select>


              </div>
              <div class="col-xs-2">
                <button type="button" class="btn btn-success" id="btnfiltrar">FILTRAR</button>
              </div>

              <div class="col-xs-2">
                <button type="button" class="btn btn-success" id="btnexportar">EXPORTAR</button>
              </div>


            </div>
          </ol>

        </form>


        <section class="content">
          <div class="table-responsive">
            <div id="tablaDatatable"></div>
          </div>
        </section>

      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel " aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">


            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id='cerrar1'>
                <span aria-hidden="true">&times;</span>
              </button>

              </br>
              <div class="col-lg-12" style="background-color: #00a65a;color: white; font-weight: bold;text-align: center ">SEGUIMIENTO NOTA DE CARGO MOVIL</div>

            </div>

            <ul class="nav nav-tabs">
              <li class="active"><a href="#producto" data-toggle="tab">DATO PRODUCTO</a></li>
              <li><a href="#validacion" data-toggle="tab">DATOS VALIDACION</a></li>
              <li><a href="#gestionback" data-toggle="tab">GESTION BACK</a></li>

            </ul>


            <div class="tab-content">
              <div class="tab-content tab-pane fade in active " id="producto">
                <div class="modal-body">
                  <form id="frmNCM" method="post">

                    <div class="row">
                      <!--- div para elegir el tipo de respuesta-->
                      <div class="col-xs-4">
                        <input type="hidden" class="form-control input-sm" id="idcargom" name="idcargom">
                        <label>Fecha Ingreso:</label>
                        <input type="text" disabled="" class="form-control input-sm" id="fechaingreso" name="fechaingreso">
                      </div>

                      <div class="col-xs-4">
                        <label>Q lineas</label>
                        <input type="number" class="form-control input-sm" id="ncqlineas" name="ncqlineas">

                      </div>
                      <div class="col-xs-4">
                        <label>Modalidad</label>
                        <input type="text" disabled="" class="form-control input-sm" id="ncmodalidad" name="ncmodalidad">

                      </div>

                    </div>
                    <!--- div para elegir el tipo de respuesta-->

                    <div id="nuevocliente" style="display:show">
                      <!--- div si la respuesta es titular interesado-->

                      <div class="row">


                        <div class="col-xs-6">
                          <label>Cargo Fijo</label>
                          <input type="text" class="form-control input-sm" id="nccargofijo" name="nccargofijo">

                        </div>

                        <div class="col-xs-6">
                          <label>RUC</label>
                          <input type="text" disabled="" class="form-control input-sm" id="ncruc" name="ncruc" required>

                        </div>

                      </div>



                      <div class="row">

                        <div class="col-xs-12">
                          <label>Razon Social</label>
                          <input type="text" disabled="" class="form-control input-sm" id="ncrazonsocial" name="ncrazonsocial">

                        </div>

                      </div>




                    </div>
                    <!--- div si la respuesta es titular interesado-->






                    <div id="comun" style="display:show">
                      <!--- div de campos en comun-->

                      <div class="row">
                        <div class="col-xs-6">
                          <label>Region</label>

                          <input type="text" disabled="" class="form-control input-sm" id="ncregion" name="ncregion">

                        </div>

                        <div class="col-xs-6">
                          <label>EJECUTIVO REAL</label>

                          <input type="text" disabled="" class="form-control input-sm" id="ncpersonal" name="ncpersonal">

                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-6">
                          <label>SUPERVISOR</label>
                          <input type="text" disabled="" class="form-control input-sm" id="ncsupervisor" name="ncsupervisor">
                        </div>

                        <div class="col-xs-6">
                          <label>Ejecutivo TDP</label>
                          <input type="text" disabled="" class="form-control input-sm" id="ncejecutivotdps" name="ncejecutivotdps">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-4">
                          <label>Tipo de producto</label>
                          <input type="text" disabled="" class="form-control input-sm" id="nctipoproductos" name="nctipoproductos">
                        </div>

                        <div class="col-xs-4">
                          <label>Etapa</label>
                          <input type="text" disabled="" class="form-control input-sm" id="ncetapas" name="ncetapas">
                        </div>

                        <div class="col-xs-4">
                          <label>Tipo de etapa</label>
                          <input type="text" disabled="" class="form-control input-sm" id="nctipoetapas" name="nctipoetapas">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-12">
                          <label for="comment">Comentario Ejecutivo:</label>
                          <div class="form-group">
                            <textarea disabled="" class="form-control" rows="5" id="ncobservacioneseje" name="ncobservacioneseje"></textarea>
                          </div>
                        </div>
                      </div>



                    </div>
                    <!--- div de campos en comun-->


                  </form>
                </div>

                <div class="modal-footer" id="botones">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id='cerrar2'>Cerrar</button>
                  <button type="button" class="btn btn-primary" id="btnActualizarpro">Actualizar</button>
                </div>
              </div>

              <div class="tab-content tab-pane  " id="validacion">
                <div class="modal-body">
                  <form id="frmNCMV" method="post">

                    <div class="row">


                      <div class="col-xs-6">
                        <label>Nombre contacto</label>
                        <input type="text" disabled="" class="form-control input-sm" id="ncnomcontacto" name="ncnomcontacto">

                      </div>

                      <div class="col-xs-3">
                        <label>Telefono1</label>
                        <input type="text" disabled="" class="form-control input-sm" id="nctelefono1" name="nctelefono1" required>

                      </div>
                      <div class="col-xs-3">
                        <label>Telefono2</label>
                        <input type="text" disabled="" class="form-control input-sm" id="nctelefono2" name="nctelefono2" required>

                      </div>



                    </div>
                    <div class="row">
                      <!--- div para elegir el tipo de respuesta-->
                      <div class="col-xs-4">

                        <label>Fecha Validacion:</label>
                        <input type="text" disabled="" class="form-control input-sm" id="fechavalidacion" name="fechavalidacion"><br>
                      </div>

                      <div class="col-xs-4">
                        <label>VALIDADOR</label>
                        <input type="text" class="form-control input-sm" id="ncvalidador" name="ncvalidador" disabled="">

                      </div>
                      <div class="col-xs-4">
                        <label>VALIDACION</label>
                        <input type="text" disabled="" class="form-control input-sm" id="ncvalidacion" name="ncvalidacion">

                      </div>

                    </div>
                    <!--- div para elegir el tipo de respuesta-->



                    <div id="comun" style="display:show">
                      <!--- div de campos en comun-->


                      <div class="row">
                        <div class="col-xs-12">
                          <label for="comment">Comentario Validador:</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="5" id="ncobservacionesval" name="ncobservacionesval" disabled=""></textarea>
                          </div>
                        </div>
                      </div>





                    </div>
                    <!--- div de campos en comun-->


                  </form>
                </div>

              </div>


              <div class="tab-content tab-pane  " id="gestionback">
                <div class="modal-body">
                  <form id="frmNCMB" method="post">
                    <div class="row">
                      <!--- div para elegir el tipo de respuesta-->
                      <div class="col-xs-4">
                        <input type="hidden" class="form-control input-sm" id="idusu" name="idusu" value="<?php echo $idusu ?>">



                        <input type="hidden" class="form-control input-sm" id="idcargo" name="idcargo">


                        <label>Estado Actual</label>
                        <input type="text" disabled="" class="form-control input-sm" id="ncestadoact" name="ncestadoact">



                      </div>




                      <div class="col-xs-4">


                        <label>Actualizar Estado</label>
                        <select name="ncestado" class="form-control" id='ncestado'>

                          <option value="PENDIENTE">PENDIENTE</option>
                          <option value="PROCESANDO">PROCESANDO</option>
                          <option value="INGRESADO">INGRESADO</option>
                          <option value="DELIVERY">DELIVERY</option>
                          <option value="ACTIVADO">ACTIVADO</option>
                          <option value="CAIDA">CAIDA</option>
                          <option value="BOLSA">BOLSA</option>
                          <option value="SALIDAANTICIPADA">SALIDA ANTICIPADA</option>
                          <option value="LIQUIDADO">LIQUIDADO</option>
                          <option value="ADR">ADR</option>


                        </select>
                      </div>

                      <div class="col-xs-4">

                        <label>Fecha Act. Estado:</label>
                        <input type="date" class="form-control input-sm" id="fechaact" name="fechaact" value="">
                      </div>




                    </div>
                    <!--- div para elegir el tipo de respuesta-->

                    <div id="nuevocliente" style="display:show">
                      <!--- div si la respuesta es titular interesado-->


                      <div class="row">


                        <div class="col-xs-4">
                          <label>Zonal Telefónica</label>
                          <select name="nczonaltdp" class="form-control" id='nczonaltdp'>

                          </select>

                        </div>



                        <div class="col-xs-8">

                          <label>Ejecutivo TDP</label>
                          <select name="ncejecutivotdp" class="form-control" id='ncejecutivotdp'>

                          </select>

                        </div>


                      </div>


                      <div class="row">


                        <div class="col-xs-4">
                          <label>Oportunidad</label>
                          <input type="text" class="form-control input-sm" id="ncoportunidad" name="ncoportunidad" required>

                        </div>

                        <div class="col-xs-4">


                          <label>Nodo</label>
                          <select name="ncnodo" class="form-control" id='ncnodo'>
                            <option value="SINNODO" selected>SIN NODO</option>
                            <option value="NCP">NCP</option>
                            <option value="NAT">NAT</option>
                            <option value="VACANTE">VACANTE</option>
                            <option value="RESERVADO">RESERVADO</option>

                          </select>
                        </div>

                        <div class="col-xs-4">
                          <label>CASO FWA</label>
                          <input type="text" class="form-control input-sm" id="ncfwa" name="ncfwa" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-4">
                          <label>Fase</label>
                          <select name="ncetapab" class="form-control" id="ncetapab">
                            <option value="F1-PERDIDA" selected>F1 PERDIDA</option>
                            <option value="F1-GANADA">F1 GANADA</option>
                            <option value="F2-GESTION">F2 GESTION</option>
                            <option value="F3-NEGOCIACION">F3 NEGOCIACION</option>
                            <option value="F4-DISENO">F4 DISEÑO</option>
                            <option value="F5-DEFINICION">F5 DEFINICION</option>
                          </select>
                        </div>
                        
                        <div class="col-xs-4">
                          <label>Ciclo</label>
                          <input type="text" class="form-control input-sm" id="ncciclo" name="ncciclo" required>
                        </div>
                        <div class="col-xs-4">
                          <label>Cuenta Financiera</label>
                          <input type="text" class="form-control input-sm" id="nccuentaf" name="nccuentaf" required>
                        </div>
                                            
                      </div>



                    </div>
                    <!--- div si la respuesta es titular interesado-->



                    <div id="comun" style="display:show">
                      <!--- div de campos en comun-->



                      <div class="row">
                        <div class="col-xs-12">
                          <label for="comment">Comentario Back Office:</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="20" id="nccomentarioback" name="nccomentarioback"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--- div de campos en comun-->


                  </form>
                </div>
                <div class="modal-footer" id="botones">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id='cerrar2'>Cerrar</button>
                  <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
                </div>

              </div>

            </div>




          </div>
        </div>
      </div>
    </div>


    <!-- Contenido de la pÃ¡gina -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Sistema Complementario</a>.</strong>
    </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../util/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../util/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../util/lte/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../util/lte/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../util/lte/js/app.js" type="text/javascript"></script>
    <!-- Temas -->
    <script src="../util/lte/js/demo.js" type="text/javascript"></script>

    <script src="../capa_presentacion/librerias/datatable/jquery.dataTables.min.js"></script>
    <script src="../capa_presentacion/librerias/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../capa_presentacion/librerias/alertify/alertify.js"></script>
    <script type="text/javascript" src="js/notacargo_movil_back_global.js"></script>


  </body>

  </html>
<?php } else {


  header('Location: /OCH/vista/login.php');
} ?>