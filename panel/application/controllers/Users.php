<?php

class Users extends CI_Controller 
{

    public $viewFolder = "";

     public function __construct(){
        parent::__construct();
        $this->viewFolder = "users_v";

        $this->load->model("user_model");
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->user_model->get_all(
            array()
        );

        // View e gönderilecek değişkenlerin set edilmesi
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){
        
        $this->load->library("form_validation");

        //kurallar yazılır..            

        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[users.user_name]");
        $this->form_validation->set_rules("full_name", "Ad Soyad", "required|trim");
        $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[8]");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|min_length[6]|max_length[8]|matches[password]");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz.",
                "is_unique"     => "Bu {field} daha önce kullanılmış.",
                "matches"       => "Şifreler birbirleri ile eşleşmiyor.",
                "min_length"    => "{field} en az {param} karakter olmalı.",
                "max_length"    => "{field} en çok {param} karakter olmalı.",
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

                $insert = $this->user_model->add(
                    array(
                    "user_name"     => $this->input->post("user_name"),
                    "full_name"     => $this->input->post("full_name"),
                    "email"         => $this->input->post("email"),
                    "password"      => md5($this->input->post("password")),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

                //TODO: alert sistemi eklenecek.
                if ($insert) {
                    $alert = array(
                        "title"      =>"İşlem Başarılı",
                        "message"    =>"Kayıt ekleme işlemi başarılı.",
                        "type"      =>"success"
                    );
                }else {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Kayıt eklenemedi",
                        "type"      =>"error"
                    );                            
                }            
            
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("users"));

        }else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){

        $viewData = new stdClass();

        // Tablodan ilgili veri getiriliyor.
        $item = $this->user_model->get(
            array(
                "id"        => $id
            )
        );


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_password_form($id){

        $viewData = new stdClass();

        // Tablodan ilgili veri getiriliyor.
        $item = $this->user_model->get(
            array(
                "id"        => $id
            )
        );


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        
        $this->load->library("form_validation");

        $oldUser = $this->user_model->get(
            array(
                "id" => $id
            )
        );

        if ($oldUser->user_name != $this->input->post("user_name")) {            
            $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[users.user_name]");
        }

        if ($oldUser->email != $this->input->post("email")) {            
            $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email|is_unique[users.email]");
        }

        $this->form_validation->set_rules("full_name", "Ad Soyad", "required|trim");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz.",
                "is_unique"     => "Bu {field} daha önce kullanılmış.",
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

            // Update işlemi
            $update = $this->user_model->update(
                array("id" => $id), 
                array(
                    "user_name"     => $this->input->post("user_name"),
                    "full_name"     => $this->input->post("full_name"),
                    "email"         => $this->input->post("email"),
                )
            );

            //TODO: alert sistemi eklenecek.
            if ($update) {

                $alert = array(
                    "title"      =>"İşlem Başarılı",
                    "message"    =>"Güncelleme işlemi başarılı.",
                    "type"      =>"success"
                );

            }else {

                $alert = array(
                    "title"      =>"İşlem Başarısız.",
                    "message"    =>"Kayıt güncelleme sırasında bir problem oluştu.",
                    "type"      =>"error"
                );
            }
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->user_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    
    public function update_password($id){
        
        $this->load->library("form_validation");

        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[8]");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|min_length[6]|max_length[8]|matches[password]");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "matches"       => "Şifreler birbirleri ile eşleşmiyor.",
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

            // Update işlemi
            $update = $this->user_model->update(
                array("id" => $id), 
                array(
                    "password"     => md5($this->input->post("password"))
                )
            );

            //TODO: alert sistemi eklenecek.
            if ($update) {

                $alert = array(
                    "title"      =>"İşlem Başarılı",
                    "message"    =>"Şifre güncelleme işlemi başarılı.",
                    "type"      =>"success"
                );

            }else {

                $alert = array(
                    "title"      =>"İşlem Başarısız.",
                    "message"    =>"Şifre güncelleme sırasında bir problem oluştu.",
                    "type"      =>"error"
                );
            }
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->user_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){
        $delete = $this->user_model->delete(
            array(
                "id" => $id
            )
        );

        //TODO: Alert sistemi eklenecek
        if ($delete) {
            $alert = array(
                "title"      =>"İşlem Başarılı",
                "message"    =>"Kayıt silme başarılı.",
                "type"      =>"success"
            );
        }else {
            $alert = array(
                "title"      =>"İşlem Başarısız.",
                "message"    =>"Kayıt silme sırasında bir hata oluştu.",
                "type"      =>"error"
            );
        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("users"));

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->user_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->user_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank" => $rank
                )
            );

        }
    }


}