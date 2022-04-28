<?php

define("KEY_TOKEN", "APR.wqc-354*");
define("CLIENT_ID", "AZOUcgyxoSAWyA2AZIZJBG2PhwTSp8AzsAuXsMAAkiIG3aNS7TfAmv1q49MSX2mcs_Ady9aZ4deuk6gh");
define("CURRENCY", "MXN");
define("MONEDA", "$");

session_start();

$num_cart = 0;
 if(isset($_SESSION['carrito']['productos'])){
     $num_cart = count($_SESSION['carrito']['productos']);
 }

?>