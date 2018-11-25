<?php

function convertToSeo($text){

    $tr     = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "/", "_", "|", "=", "(", ")", "[", "]", "{", "}" );
    $convert    = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-" );
   
    return strtolower(str_replace($tr, $convert, $text));
}

function get_readable_date($date)
{
    return strftime('%e %B %Y', strtotime($date));
}

function get_active_user(){

    $t =& get_instance();

    $user = $t->session->userdata("user");

    if ($user) {
        return $user;
    }else{
        return false;
    }
}