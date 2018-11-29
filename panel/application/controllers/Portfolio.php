<?php

class Portfolio extends CI_Controller 
{

    public $viewFolder = "";

     public function __construct()
    {
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        $this->viewFolder = "portfolio_v";
        $this->load->model("portfolio_model");
        $this->load->model("portfolio_image_model");
        $this->load->model("portfolio_category_model");
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->portfolio_model->get_all(
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

        $viewData->categories = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){
        
        $this->load->library("form_validation");

        //kurallar yazılır..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri", "required|trim");
        $this->form_validation->set_rules("finishedAt", "Bitirme Tarihi", "required|trim");
        
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();



        if ($validate) {
            
            $insert = $this->portfolio_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSeo($this->input->post("title")),
                    "client"        => $this->input->post("client"),
                    "finishedAt"    => $this->input->post("finishedAt"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
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
            
            // işlem sonucunu sessiona yazıyoruz.
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("portfolio"));

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
        
        $viewData->categories = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );

        // Tablodan ilgili veri getiriliyor.
        $item = $this->portfolio_model->get(
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
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri", "required|trim");
        $this->form_validation->set_rules("finishedAt", "Bitirme Tarihi", "required|trim");
        

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();



        if ($validate) {
            
            $update = $this->portfolio_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "url"           => convertToSeo($this->input->post("title")),
                    "client"        => $this->input->post("client"),
                    "finishedAt"    => $this->input->post("finishedAt"),
                    "category_id"   => $this->input->post("category_id"),
                    "place"         => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
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
                    "message"    =>"Güncelleme sırasında bir hata oluştu.",
                    "type"      =>"error"
                );
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("portfolio"));                

        }else {
            $viewData = new stdClass();

            // Tablodan ilgili veri getiriliyor.
            $item = $this->portfolio_model->get(
                array(
                    "id"        => $id
                )
            );

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $viewData->categories = $this->portfolio_category_model->get_all(
                array(
                    "isActive" => 1
                )
            );   

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){
        $delete = $this->portfolio_model->delete(
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
        redirect(base_url("portfolio"));      

    }

    public function imageDelete($id, $parent_id){

        $file_name = $this->portfolio_image_model->get(
            array(
                "id" => $id
            )
        );



        $delete = $this->portfolio_image_model->delete(
            array(
                "id" => $id
            )
        );

        //TODO: Alert sistemi eklenecek
        if ($delete) {

            unlink("uploads/{$this->viewFolder}/$file_name->img_url");

            redirect(base_url("portfolio/image_form/$parent_id"));
        }else {
            redirect(base_url("portfolio/image_form/$parent_id"));
        }

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->portfolio_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

    public function imageIsActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->portfolio_image_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

    public function isCoverSetter($id, $parent_id){
        
        if ($id && $parent_id) {

            $isCover = ($this->input->post("data") === "true") ? 1 : 0 ;

            // kapak fotoğrafı olacak id
            $this->portfolio_image_model->update(
                array(
                    "id" => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );

            // Kapak olmayacak diğer kayıtlar.
            $this->portfolio_image_model->update(
                array(
                    "id !="      => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->portfolio_image_model->get_all(
                array(
                    "portfolio_id" => $parent_id
                ), "rank ASC"
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;

            
        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->portfolio_model->update(
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

    public function imageRankSetter(){
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->portfolio_image_model->update(
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

    public function image_form($id){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->portfolio_model->get(
            array(
                "id" => $id
            )
        );

        $viewData->item_images = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id" => $id
            ), "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function image_upload($id){

        // $file_name = convetToseo($_FILES["file"]["name"]);
        // $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $file_name = convertToSeo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $image_555x343 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 555, 343, $file_name );
        $image_350x217 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder", 350, 217, $file_name );

        if ($image_555x343 && $image_350x217) {

            $this->portfolio_image_model->add(
                array(
                    "img_url"       => $file_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "portfolio_id"    => $id
                )
            );
        } else {
            echo   "Bir Hata Oluştu!";
        }

    }

    public function refresh_image_list($id){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id" => $id
            )
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render_html;

    }


}