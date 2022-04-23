<?php 
session_start();
function rp($number) {  
    $rt = 'Rp '.number_format($number, 2, ',', '.');  
    return $rt;  
}   

?>