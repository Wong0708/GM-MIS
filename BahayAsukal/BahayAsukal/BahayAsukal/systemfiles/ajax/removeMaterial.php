<?php
if(isset($_POST['materialIndex'])){
    session_start();
    require_once('../mysql_connect.php');

    unset($_SESSION['materialArray'][$_POST['materialIndex']]);
    unset($_SESSION['quantityArray'][$_POST['materialIndex']]);

    $_SESSION['materialArray'] = array_values($_SESSION['materialArray']);
    $_SESSION['quantityArray'] = array_values($_SESSION['quantityArray']);

    $table ='
    <table id="datatable-buttons" class="table table-striped table-bordered">
      <thead>
        <tr>
            <th>Material</th>
            <th>Material Measurement</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>';
    $ctr = 0;
    if(isset($_SESSION['materialArray'])){
        while ($ctr < count($_SESSION['materialArray'])) {
            $queryMaterial = 'SELECT materialName, uom FROM raw_material WHERE materialID =' . $_SESSION['materialArray'][$ctr] . ';';
            $resultMaterial = mysqli_query($dbc, $queryMaterial);
            $rowMaterial = mysqli_fetch_array($resultMaterial, MYSQLI_ASSOC);
            $materialName = $rowMaterial['materialName'];
            $uom = $rowMaterial['uom'];

            $table = $table . '<tr>';
            $table = $table . '<td>' . $materialName . '</td><td>' . $_SESSION['quantityArray'][$ctr] . $uom  .'</td><td><button type="button" onclick="removeMaterial('.$ctr.');" class="btn btn-danger">Delete</button></td>';
            $table = $table . '</tr>';
            $ctr++;
        }
    }

    $table = $table.'
      </tbody>
    </table>
    ';

    echo $table;

}
?>