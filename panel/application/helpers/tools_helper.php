<?php

function convertToSeo($text){

    $tr     = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "/", "_", "|", "=", "(", ")", "[", "]", "{", "}" );
    $convert    = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-" );
   
    return strtolower(str_replace($tr, $convert, $text));
}

function get_readable_date($date){
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

function send_email($toEmail = "", $subject = "", $message = ""){


    $t = &get_instance();

    $t->load->model("emailsettings_model");

    $email_settings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
        )
    );


    $config = array(
        "protocol"      => $email_settings->protocol,
        "smtp_host"     => $email_settings->host,
        "smtp_port"     => $email_settings->port,
        "smtp_user"     => $email_settings->user,
        "smtp_pass"     => $email_settings->password,
        "stattls"       => true,
        "charset"       => "utf-8",
        "mailtype"      => "html",
        "wordwrap"      => true,
        "newline"       => "\r\n"
    );

    $t->load->library("email", $config);

    $t->email->from($email_settings->from, $email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    return $t->email->send();

}

function get_settings(){

    $t = &get_instance();

    $t->load->model("setting_model");

    if ($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    }else {
        $settings = $t->setting_model->get();

        if (!$settings) {
            $settings = new stdClass();

            $settings->company_name = "CMS";
            $settings->logo = "default";    
        }
        
        $t->session->set_userdata("settings", $settings);
    }

    return $settings;
}

function get_category_title($category_id = 0){
    $t = &get_instance();

    $t->load->model("portfolio_category_model");
    
    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );
    
    if ($category) {
        return $category->title;
    }else {
        return "Tanımlı Değil";
    }

}

function upload_picture($file, $uploadPath, $width, $height, $name){

    $t = &get_instance();
    $t->load->library('Simpleimagelib');

    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }


    $upload_error = false;
    try {
    // Create a new SimpleImage object
    $simpleImage = $t->simpleimagelib->get_simple_image_instance();

    $simpleImage
        ->fromFile($file)
        ->thumbnail($width, $height, 'center')
        ->toFile("{$uploadPath}/{$width}x{$height}/$name", 'image/png');

    } catch(Exception $err) {
        $error = $err->getMessage();
        $upload_error = true;
    }

    if ($upload_error) {
        echo $error;
    } else {
        return true;
    }
}

function get_picture($path = "", $picture = "", $resolution = "50x50"){

    if ($picture != "") {
        if(file_exists(FCPATH."uploads/$path/$resolution/$picture")){
            $picture = base_url("uploads/$path/$resolution/$picture");
        }else{
            $picture = base_url("assets/assets/images/default_image.png");
        }
    }else {
        $picture = base_url("assets/assets/images/default_image.png");
    }

    return $picture;
}