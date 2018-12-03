<?php

class Services extends CMS_Controller 
{

    public $viewFolder = "";

     public function __construct(){
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        $this->viewFolder = "services_v";

        $this->load->model("service_model");
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->service_model->get_all(
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
        redirect(base_url("services/new_form"));

        }          

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();

        if ($validate) {           

            $file_name = convertToSeo(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            // $config["allowed_types"] = "jpg|jepg|png";
            // $config["upload_path"] = "uploads/$this->viewFolder/";
            // $config["file_name"] = $file_name;

            $image_555x343 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 555, 343, $file_name );
            $image_350x217 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 350, 217, $file_name );
    
            //$this->load->library("upload", $config);
            //$upload = $this->upload->do_upload("img_url");

            if ($image_555x343 && $image_350x217) {

                //$uploaded_file = $this->upload->data("file_name");

                $insert = $this->service_model->add(
                    array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSeo($this->input->post("title")),
                    "img_url"       => $file_name,
                    "rank"          => 0,
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

                

            } else {
                $alert = array(
                    "title"      =>"İşlem Başarısız.",
                    "message"    =>"Görsel yüklenirken bir problem oluştu.",
                    "type"      =>"error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("services/new_form"));
            }
          
            
            
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("services"));

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
        $item = $this->service_model->get(
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

                // $config["allowed_types"] = "jpg|jepg|png";
                // $config["upload_path"] = "uploads/$this->viewFolder/";
                // $config["file_name"] = $file_name;
                
                // $this->load->library("upload", $config);

                // $upload = $this->upload->do_upload("img_url");

                $image_555x343 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 555, 343, $file_name );
                $image_350x217 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 350, 217, $file_name );
    
                if ($image_555x343 && $image_350x217) {

                    //$uploaded_file = $this->upload->data("file_name");

                    $data =  array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           => convertToSeo($this->input->post("title")),
                        "img_url"     => $file_name,
                    );

                } else {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Görsel yüklenirken bir problem oluştu.",
                        "type"      =>"error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("services/update_form/$id"));
                }

            } else {
                $data =  array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSeo($this->input->post("title")),
                );
            }

         
            
            $update = $this->service_model->update(array("id" => $id), $data);

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

            redirect(base_url("services"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            // Tablodan ilgili veri getiriliyor.
            $viewData->item = $this->service_model->get(
                array(
                    "id"        => $id
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){
        $delete = $this->service_model->delete(
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
        redirect(base_url("services"));

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->service_model->update(
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

            $this->service_model->update(
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