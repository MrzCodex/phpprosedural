<?php
$title="Api";
$title2="Kas";
$title3="Kas Api";
?>
<?php 
function showapi(){
    $linkapi= "http://localhost/econter/functions/api.php";
    $konten = file_get_contents($linkapi);
    $data =  json_decode($konten, true);
    return $data;
}
$get = showapi();
?>
<?php include_once 'header.php';?>
<?php foreach($get['data'] as $h):?>
    <h4>Nama Barang : <?=$h['nama_barang'];?></h4>
    <h4>Harga : <?=$h['harga'];?></h4>
    <h4>Qty :<?=$h['qty'];?></h4>
    <br>
<?php endforeach?>
<?php include_once 'footer.php';?>