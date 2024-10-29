<?php 
class a_format_angka{
    function rupiah($angka){

        if($angka == ""){
            $hasil_rupiah = "Rp. 0,-";
        }else{
            $hasil_rupiah = "Rp. " . number_format($angka,0,',','.').",-";
        }
        
        return $hasil_rupiah;
     
    }
}
?>