<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "permutasalcuadrado";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

$bloque=$_POST['bloque'];
if($bloque=='consulta'){
    $id=$_POST['id'];
    $select=mysqli_query($con,"SELECT * FROM usuario WHERE id_usuario='".$id."'");
    while($row=mysqli_fetch_array($select)){
        ?>
        <table>
            <tr>
                <td>Id</td>
                <td><?php echo $row['id_usuario'];?></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><?php echo $row['nombre'];?></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td><?php echo $row['apellido'];?></td>
            </tr>
        </table>
        <?php
    }
}
?>
