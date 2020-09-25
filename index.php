<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>demo</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "permutasalcuadrado";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");


$a = ("SELECT * FROM usuario ORDER BY id_usuario LIMIT 10 ");
$b = mysqli_query($con, $a);
?>
<br><br>
<br><br>
<div class="container">
    <h5 class="text-center">Lista</h5>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Celular</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($data = mysqli_fetch_array($b)) { ?>
    <tr>
      <th scope="row"><?php echo $data['id_usuario']; ?></th>
      <td><?php echo $data['nombre']; ?></td>
      <td><?php echo $data['correo']; ?></td>
      <td><?php echo $data['celular']; ?></td>
    <td> <a style="cursor: pointer; color:#00F;" onclick="consulta('<?php echo $data['id_usuario']; ?>');"> Ver </a></td>
    </tr>
<?php } ?>
  </tbody>
</table>



<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Nombre del Concepto</h4>
      </div>
      <div class="modal-body" id="cont_modal">
        <label>Nombre Concepto:</label>
            <input type="text" name="nombre" id="nombre" required="on" autocomplete="off" class="form-control"><br/>
            <input type="button" name="insert" onclick="actualizarnombrecon();" class="btn btn-primary"  value="GUARDAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-warning" data-dismiss="modal">CANCELAR</button>
      </div>
    </div>
  </div>
</div>


</div>



<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript">
    function consulta(id){
        document.getElementById('myModalLabel').innerHTML;
        $("#cont_modal").load("cargar.php",{bloque:"consulta",id:id},function(){
            $('#miModal').modal("show");
        });

    }
</script>
</body>
</html>
