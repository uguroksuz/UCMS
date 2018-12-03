<?php

class Emailsettings extends CMS_Controller 
{

    public $viewFolder = "";

     public function __construct(){
         
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        $this->viewFolder = "email_settings_v";

        $this->load->model("emailsettings_model");
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->emailsettings_model->get_all(
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

        $this->form_validation->set_rules("protocol", "Protokol Numarası", "required|trim");
        $this->form_validation->set_rules("host", "E-posta Sunucusu", "required|trim");
        $this->form_validation->set_rules("port", "Port Numarası", "required|trim");
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("user", "E-posta (user)", "required|trim|valid_email");
        $this->form_validation->set_rules("from", "Kimden Gidecek (from)", "required|trim|valid_email");
        $this->form_validation->set_rules("to", "Kime Gidecek (to)", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz.",
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

                $insert = $this->emailsettings_model->add(
                    array(
                    "protocol"      => $this->input->post("protocol"),
                    "host"          => $this->input->post("host"),
                    "port"          => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"          => $this->input->post("user"),
                    "from"          => $this->input->post("from"),
                    "to"            => $this->input->post("to"),
                    "password"      => $this->input->post("password"),
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
            redirect(base_url("emailsettings"));

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
        $item = $this->emailsettings_model->get(
            array(
                "id"        => $id
            )
        );


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){
        
        $this->load->library("form_validation");           

        $this->form_validation->set_rules("protocol", "Protokol Numarası", "required|trim");
        $this->form_validation->set_rules("host", "E-posta Sunucusu", "required|trim");
        $this->form_validation->set_rules("port", "Port Numarası", "required|trim");
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("user", "E-posta (user)", "required|trim|valid_email");
        $this->form_validation->set_rules("from", "Kimden Gidecek (from)", "required|trim|valid_email");
        $this->form_validation->set_rules("to", "Kime Gidecek (to)", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz.",
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

            // Update işlemi
            $update = $this->emailsettings_model->update(
                array("id" => $id), 
                array(
                    "protocol"      => $this->input->post("protocol"),
                    "host"          => $this->input->post("host"),
                    "port"          => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"          => $this->input->post("user"),
                    "from"          => $this->input->post("from"),
                    "to"            => $this->input->post("to"),
                    "password"      => $this->input->post("password"),
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

            redirect(base_url("emailsettings"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->emailsettings_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    

    public function delete($id){
        $delete = $this->emailsettings_model->delete(
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
        redirect(base_url("emailsettings"));

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->emailsettings_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

}