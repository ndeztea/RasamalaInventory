<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Alert helper
 *
 * @author Dimas <ndeztea@gmail.com>
 */

function format_uang($value){
    return 'Rp. '.number_format($value,2,',','.'); 
}

function format_tanggal($date){
    return date('d F Y', strtotime($date));
}

function check_tempo($date){

     $dStart = new DateTime(date('Y-m-d'));
   $dEnd  = new DateTime($date);
   $dDiff = $dStart->diff($dEnd);
   $r = $dDiff->format('%R'); 
   if($r=='+' && $dDiff->days<5 && $dDiff->days!=0){
        return $dDiff->days;
   }

}
?>