<?php
    function getDiscount($total,$discount_amount)
    {
        $total = $total - ($total * ($discount_amount/100));
        return $total;
    }

    function getPrice($angka){
	
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
    }

    function getCodeUnique()
    {
        $code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890zyxwvutsrqponmlkjihgfedcba"), 14, 10);
        return $code;
    }
?>