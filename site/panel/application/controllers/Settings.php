<?php

class Settings extends CMS_Controller 
{

    public $viewFolder = "";

     public function __construct(){
         
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        $this->viewFolder = "settings_v";

        $this->load->model("setting_model");
    }

    public function index(){

        $viewData = new stdClass();
        
        // Tablodan verilerin getirilmesi..
        $item = $this->setting_model->get();

        if ($item) {
            $viewData->subViewFolder = "update";
        } else {
            $viewData->subViewFolder = "no_content";
        }

        // View e gönderilecek değişkenlerin set edilmesi
        $viewData->viewFolder = $this->viewFolder;
        $viewData->item = $item;

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
            
        if ($_FILES["logo"]["name"] == "") {

            $alert = array(
                "title"      =>"İşlem Başarısız.",
                "message"    =>"Masaüstü logo için ütfen bir gösel seçiniz.",
                "type"      =>"error"
            );

        // işlem sonucunu session yazıyoruz.
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("settings/new_form"));
        
        die();
        }
        
        if ($_FILES["logo_mobie"]["name"] == "") {

            $alert = array(
                "title"      =>"İşlem Başarısız.",
                "message"    =>"Mobil logo için lütfen bir gösel seçiniz.",
                "type"      =>"error"
            );

        // işlem sonucunu session yazıyoruz.
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("settings/new_form"));
        
        die();
        }

        if ($_FILES["favicon"]["name"] == "") {

            $alert = array(
                "title"      =>"İşlem Başarısız.",
                "message"    =>"Favicon için lütfen bir gösel seçiniz.",
                "type"      =>"error"
            );

        // işlem sonucunu session yazıyoruz.
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("settings/new_form"));
        
        die();
        } 

        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir {field} adresi giriniz.."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {           

            $file_name = convertToSeo($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

            $image_150x35 = upload_picture($_FILES["logo"]["tmp_name"], "uploads/$this->viewFolder", 150, 35, $file_name );
            $image_300x70 = upload_picture($_FILES["logo_mobile"]["tmp_name"], "uploads/$this->viewFolder", 300, 70, $file_name );
            $image_32x32 = upload_picture($_FILES["favicon"]["tmp_name"], "uploads/$this->viewFolder", 32, 32, $file_name );


            if ($image_150x35 && $image_300x70 && image_32x32) {

                $insert = $this->setting_model->add(
                    array(
                    "company_name"  => $this->input->post("company_name"),
                    "phone_1"       => $this->input->post("phone_1"),
                    "phone_2"       => $this->input->post("phone_2"),
                    "fax_1"         => $this->input->post("fax_1"),
                    "fax_2"         => $this->input->post("fax_2"),
                    "address"       => $this->input->post("address"),
                    "about_us"      => $this->input->post("about_us"),
                    "mission"       => $this->input->post("mission"),
                    "vision"        => $this->input->post("vision"),
                    "email"         => $this->input->post("email"),
                    "facebook"      => $this->input->post("facebook"),
                    "twitter"       => $this->input->post("twitter"),
                    "instagram"     => $this->input->post("instagram"),
                    "linkedin"      => $this->input->post("linkedin"),
                    "logo"          => $file_name,
                    "logo_mobile"   => $file_name,
                    "favicon"       => $file_name,
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

                

            } else {
                $alert = array(
                    "title"      =>"İşlem Başarısız.",
                    "message"    =>"Görsel yüklenirken bir problem oluştu.",
                    "type"      =>"error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("settings/new_form"));
            }
          
            
            
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

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
        $item = $this->setting_model->get(
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

        //kurallar yazılır..     

        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir {field} adresi giriniz.."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

            $data =  array(
                "company_name"  => $this->input->post("company_name"),
                "phone_1"       => $this->input->post("phone_1"),
                "phone_2"       => $this->input->post("phone_2"),
                "fax_1"         => $this->input->post("fax_1"),
                "fax_2"         => $this->input->post("fax_2"),
                "address"       => $this->input->post("address"),
                "about_us"      => $this->input->post("about_us"),
                "mission"       => $this->input->post("mission"),
                "vision"        => $this->input->post("vision"),
                "email"         => $this->input->post("email"),
                "facebook"      => $this->input->post("facebook"),
                "twitter"       => $this->input->post("twitter"),
                "instagram"     => $this->input->post("instagram"),
                "linkedin"      => $this->input->post("linkedin"),
                "updatedAt"     => date("Y-m-d H:i:s")
            );
            
            
            //Masa üstü logo değiştirilmiş mi?
            if ($_FILES["logo"]["name"] != "") {
                $file_name = convertToSeo($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                $image_150x35 = upload_picture($_FILES["logo"]["tmp_name"], "uploads/$this->viewFolder", 150, 35, $file_name );
                if ($image_150x35) {
                    $data["logo"] = $file_name;
                } else {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Görsel yüklenirken bir problem oluştu.",
                        "type"      =>"error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));
                }
            }
             //Mobil logo değiştirilmiş mi?
             if ($_FILES["logo_mobile"]["name"] != "") {
                $file_name = convertToSeo($this->input->post("company_name")) . "." . pathinfo($_FILES["logo_mobile"]["name"], PATHINFO_EXTENSION);
                $image_300x70 = upload_picture($_FILES["logo_mobile"]["tmp_name"], "uploads/$this->viewFolder", 300, 70, $file_name );
                if ($image_300x70) {
                    $data["logo_mobile"] = $file_name;
                } else {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Görsel yüklenirken bir problem oluştu.",
                        "type"      =>"error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));
                }
            }
             //Favicon değiştirilmiş mi?
             if ($_FILES["favicon"]["name"] != "") {
                $file_name = convertToSeo($this->input->post("company_name")) . "." . pathinfo($_FILES["favicon"]["name"], PATHINFO_EXTENSION);
                $image_32x32 = upload_picture($_FILES["favicon"]["tmp_name"], "uploads/$this->viewFolder", 32, 32, $file_name );    
                if ($image_32x32) {
                    $data["favicon"] = $file_name;
                } else {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Görsel yüklenirken bir problem oluştu.",
                        "type"      =>"error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));
                }
            }
            
            $update = $this->setting_model->update(array("id" => $id), $data);

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

            //Session update işlemi
            $settings = $this->setting_model->get();
            $this->session->set_userdata("settings", $settings);

            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->setting_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    

}