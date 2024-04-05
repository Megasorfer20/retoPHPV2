<?php

$url = "http://localhost/PruebaPHP/retoPHPV2/RetoPHPSolucion/Backend/Controller/departamentos.php?op=GetAll";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,$url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$output = json_decode(curl_exec($curl));

?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Departamento</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Borrar</th>
                    <th>Actualizar</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Borrar</th>
                    <th>Actualizar</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>