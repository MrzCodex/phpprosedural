<?php
require 'model.php';

global $link;
$sql= "SELECT kas.id,nama_barang,keterangan,harga,qty,id_user,nama,kas.date,gambar_kas FROM kas INNER JOIN user ON user.id=kas.id_user";
$query = mysqli_query($link,$sql);
$rows=[];
while($row = mysqli_fetch_assoc($query)){
    $rows[] = $row;
}
$response=array(
    'status' => 1,
    'message' =>'Success',
    'data' => $rows
 );
header('Content-Type: application/json');
echo json_encode($response);


?>