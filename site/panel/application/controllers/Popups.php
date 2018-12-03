<?php

class Popups extends CMS_Controller 
{

    public $viewFolder = "";

     public function __construct(){
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        $this->viewFolder = "popups_v";
        $this->load->model("popup_model");        
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->popup_model->get_all();

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
            
        // if ($_FILES["img_url"]["name"] == "") {

        //     $alert = array(
        //         "title"      =>"İşlem Başarısız.",
        //         "message"    =>"Lütfen bir gösel seçiniz.",
        //         "type"      =>"error"
        //     );

        // // işlem sonucunu session yazıyoruz.
        // $this->session->set_flashdata("alert", $alert);
        // redirect(base_url("popups/new_form"));

        // }          

        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("page", "Hedef Sayfa", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {

            $insert = $this->popup_model->add(
                array(
                "title"             => $this->input->post("title"),
                "description"       => $this->input->post("description"),
                "page"              => $this->input->post("page"),
                "popup_unique_id"   => uniqid(),
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
             
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("popups"));

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
        $item = $this->popup_model->get(
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
        $this->form_validation->set_rules("page", "Hedef Sayfa", "required|trim");
        
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {


            $data = array(
                "title"         => $this->input->post("title"),
                "description"   => $this->input->post("description"),
                "page"          => $this->input->post("page"),
            );

            $update = $this->popup_model->update(array("id" => $id), $data);

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

            redirect(base_url("popups"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->popup_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){
        $delete = $this->popup_model->delete(
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
        redirect(base_url("popups"));

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->popup_model->update(
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

            $this->popup_model->update(
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