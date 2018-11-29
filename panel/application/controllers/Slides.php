<?php

class Slides extends CI_Controller 
{

    public $viewFolder = "";

     public function __construct(){
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        $this->viewFolder = "slides_v";

        $this->load->model("slide_model");
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->slide_model->get_all(
            array(), "rank ASC"
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
            
        if ($_FILES["img_url"]["name"] == "") {

            $alert = array(
                "title"      =>"İşlem Başarısız.",
                "message"    =>"Lütfen bir gösel seçiniz.",
                "type"      =>"error"
            );

        // işlem sonucunu session yazıyoruz.
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("slides/new_form"));

        }          

        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        
        if ($this->input->post("allowButton") == "on") {

            $this->form_validation->set_rules("button_caption", "Buton Başlığı", "required|trim");
            $this->form_validation->set_rules("button_url", "Buton URL Bilgis", "required|trim");
        }

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {           

            $file_name = convertToSeo(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $image_1920x650 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 1920, 650, $file_name );

            if ($image_1920x650) {

                $insert = $this->slide_model->add(
                    array(
                    "title"             => $this->input->post("title"),
                    "description"       => $this->input->post("description"),
                    "img_url"           => $file_name,
                    "allowButton"       => ($this->input->post("allowButton") == "on") ? 1 : 0 ,
                    "button_caption"    => $this->input->post("button_caption"),
                    "button_url"        => $this->input->post("button_url"),
                    "rank"              => 0,
                    "isActive"          => 1,
                    "createdAt"         => date("Y-m-d H:i:s")
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

                redirect(base_url("slides/new_form"));
            }
          
            
            
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("slides"));

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
        $item = $this->slide_model->get(
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

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        if ($this->input->post("allowButton") == "on") {

            $this->form_validation->set_rules("button_caption", "Buton Başlığı", "required|trim");
            $this->form_validation->set_rules("button_url", "Buton URL Bilgis", "required|trim");
        }

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

            if ($_FILES["img_url"]["name"] != "") {

                $file_name = convertToSeo(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $image_1920x650 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 1920, 650, $file_name );
    
                if ($image_1920x650) {

                    $data =  array(
                        "title"             => $this->input->post("title"),
                        "description"       => $this->input->post("description"),
                        "allowButton"       => ($this->input->post("allowButton") == "on") ? 1 : 0 ,
                        "button_caption"    => $this->input->post("button_caption"),
                        "button_url"        => $this->input->post("button_url"),
                        "img_url"           => $file_name,
                    );

                } else {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Görsel yüklenirken bir problem oluştu.",
                        "type"      =>"error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("slides/update_form/$id"));
                }

            } else {
                $data =  array(
                    "title"             => $this->input->post("title"),
                    "description"       => $this->input->post("description"),
                    "allowButton"       => ($this->input->post("allowButton") == "on") ? 1 : 0 ,
                    "button_caption"    => $this->input->post("button_caption"),
                    "button_url"        => $this->input->post("button_url"),
                );
            }

         
            
            $update = $this->slide_model->update(array("id" => $id), $data);

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

            redirect(base_url("slides"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->slide_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){
        $delete = $this->slide_model->delete(
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
        redirect(base_url("slides"));

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->slide_model->update(
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

            $this->slide_model->update(
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