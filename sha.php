<?php 
$chipertext = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
function chip($penerima,$pesan,$pengirim,$sandi){
    $p = explode('H',$pesan);
   return "$penerima $p $pengirim $sandi" ;
}
$pesan = "Muhammad Mirza";
$p = str_split($pesan);
$pecah[] = $p;
print_r($p);
?>
