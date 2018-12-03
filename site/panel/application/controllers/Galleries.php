<?php

class Galleries extends CMS_Controller 
{

    public $viewFolder = "";

     public function __construct()
    {
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
        }
        
        
        $this->viewFolder = "galleries_v";

        $this->load->model("gallery_model");
        $this->load->model("image_model");
        $this->load->model("video_model");
        $this->load->model("file_model");
    }

    public function index(){

        $viewData = new stdClass();
        

        // Tablodan verilerin getirilmesi..
        $items = $this->gallery_model->get_all(
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
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();



        if ($validate) {

            $gallery_type = $this->input->post("gallery_type");
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";

            if ($gallery_type == "image") {
                
                $folder_name = convertToSeo($this->input->post("title"));
                $path = "$path/images/$folder_name";

            }else if($gallery_type == "file"){
                $folder_name = convertToSeo($this->input->post("title"));
                $path = "$path/files/$folder_name";
            }

            if($gallery_type != "video"){

                if (!mkdir($path, 0755)) {

                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Galeri klasörü oluşturulamadı.",
                        "type"      =>"error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                }
            }

            
            $insert = $this->gallery_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"   => $this->input->post("gallery_type"),
                    "url"           => convertToSeo($this->input->post("title")),
                    "folder_name"   => $folder_name,
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
            redirect(base_url("galleries"));

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
        $item = $this->gallery_model->get(
            array(
                "id"        => $id
            )
        );


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id, $gallery_type, $oldFolderName = ""){
        
        $this->load->library("form_validation");

        //kurallar yazılır..
        $this->form_validation->set_rules("title", "Galeri adı", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();



        if ($validate) {

            
            //$gallery_type = $this->input->post("gallery_type");
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";

            if ($gallery_type == "image") {
                
                $folder_name = convertToSeo($this->input->post("title"));
                $path = "$path/images";

            }else if($gallery_type == "file"){
                $folder_name = convertToSeo($this->input->post("title"));
                $path = "$path/files";
            }

            if($gallery_type != "video"){

                if (!rename("$path/$oldFolderName", "$path/$folder_name")) {

                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Galeri klasörü oluşturulamadı.",
                        "type"      =>"error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                }
            }
            
            $update = $this->gallery_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "folder_name"   => $folder_name,
                    "url"           => convertToSeo($this->input->post("title")),
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
            redirect(base_url("galleries"));                

        }else {
            $viewData = new stdClass();

            // Tablodan ilgili veri getiriliyor.
            $item = $this->gallery_model->get(
                array(
                    "id"        => $id
                )
            );

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $gallery = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );

        if ($gallery) {

            if($gallery->gallery_type != "video"){

                if ($gallery->gallery_type == "image") {
                    $path = "uploads/$this->viewFolder/images/$gallery->folder_name";
                }else if ($gallery->gallery_type == "file") {
                    $path = "uploads/$this->viewFolder/files/$gallery->folder_name";
                }

                $delete_folder = rmdir($path);

                if (!$delete_folder) {
                    $alert = array(
                        "title"      =>"İşlem Başarısız.",
                        "message"    =>"Galeri klasörü silinirken bir problem oluştu.",
                        "type"      =>"error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));

                }
                
            }

            $delete = $this->gallery_model->delete(
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
            redirect(base_url("galleries"));
    
             
        }

         

    }

    public function fileDelete($id, $parent_id, $gallery_type){


        $model_name = ($gallery_type == "image") ? "image_model" : "file_model";

        $file_name = $this->$model_name->get(
            array(
                "id" => $id
            )
        );



        $delete = $this->$model_name->delete(
            array(
                "id" => $id
            )
        );

        //TODO: Alert sistemi eklenecek
        if ($delete) {

            unlink($file_name->url);

            redirect(base_url("galleries/upload_form/$parent_id"));
        }else {
            redirect(base_url("galleries/upload_form/$parent_id"));
        }

    }

    public function isActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->gallery_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

    public function fileIsActiveSetter($id, $gallery_type){
        
        if ($id && $gallery_type) {

            $model_name = ($gallery_type == "image") ? "image_model" : "file_model";

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->$model_name->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

    public function fileRankSetter($gallery_type){

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        $model_name = ($gallery_type == "image") ? "image_model" : "file_model";

        foreach ($items as $rank => $id) {

            $this->$model_name->update(
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

    public function rankSetter(){
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        

        foreach ($items as $rank => $id) {

            $this->gallery_model->update(
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

    public function upload_form($id){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        
        $item = $this->gallery_model->get(
            array(
                "id" => $id
                )
            );
            
        $viewData->item = $item;

        if ($item->gallery_type == "image") {

            $viewData->items = $this->image_model->get_all(
                array(
                    "gallery_id" => $id
                ), "rank ASC"
            );

            $viewData->folder_name = $item->folder_name;

        } else if($item->gallery_type == "file"){

            $viewData->items = $this->file_model->get_all(
                array(
                    "gallery_id" => $id
                ), "rank ASC"
            );

        } else {

            $viewData->items = $this->video_model->get_all(
                array(
                    "gallery_id" => $id
                ), "rank ASC"
            );

        }        

        $viewData->gallery_type = $item->gallery_type;        

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function file_upload_old($gallery_id, $gallery_type, $folder_name){

        // $file_name = convetToseo($_FILES["file"]["name"]);
        // $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $file_name = convertToSeo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);


        $config["allowed_types"] = "jpg|jepg|png|png|pdf|doc|docx";
        $config["upload_path"] = ($gallery_type == "image")? "uploads/$this->viewFolder/images/$folder_name/" : "uploads/$this->viewFolder/files/$folder_name/";
        $config["file_name"] = $file_name;
        
        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if ($upload) {

            $uploaded_file = $this->upload->data("file_name");

            $model_name = ($gallery_type == "image") ? "image_model" : "file_model";


            $this->$model_name->add(
                array(
                    "url"           => "{$config["upload_path"]}$uploaded_file",
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "gallery_id"    => $gallery_id
                )
            );
        } else {
            echo   "Bir Hata Oluştu!";
        }

    }

    public function file_upload($gallery_id, $gallery_type, $folder_name){
        
        $file_name = convertToSeo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if($gallery_type == "image"){

            $image_252x156 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folder_name/", 251, 156, $file_name );
            $image_350x216 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folder_name/", 350, 216, $file_name );
            $image_851x606 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folder_name/", 851, 606, $file_name );

            if($image_252x156 && $image_350x216 && $image_851x606){

                $this->image_model->add(
                    array(
                        "url"           => $file_name,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
            } else{
                echo   "Bir Hata Oluştu!";                
            }

        } else{

            $config["allowed_types"] = "jpg|jepg|png|png|pdf|doc|docx|txt";
            $config["upload_path"] = "uploads/$this->viewFolder/files/$folder_name/";
            $config["file_name"] = $file_name;
            
            $this->load->library("upload", $config);
    
            $upload = $this->upload->do_upload("file");

            if ($upload) {

                $uploaded_file = $this->upload->data("file_name");
        
                $this->file_model->add(
                    array(
                        "url"           => $uploaded_file,
                        "rank"          => 0,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
               
            } else {
                echo   "Bir Hata Oluştu!";
            }

        }


    }

    public function refresh_file_list($gallery_id, $gallery_type, $folder_name){

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->folder_name = $folder_name;

        $model_name = ($gallery_type == "image") ? "image_model" : "file_model";

        $viewData->items = $this->$model_name->get_all(
            array(
                "gallery_id" => $gallery_id
            )
        );

        $viewData->gallery_type = $gallery_type;

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list_v", $viewData, true);

        echo $render_html;

    }

    //***************************** */ Video Galeri için Kullanılan Metotlar******************************

    public function gallery_video_list($id){

        $viewData = new stdClass();

        $gallery = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );
        

        // Tablodan verilerin getirilmesi..
        $items = $this->video_model->get_all(
            array(
                "gallery_id" => $id
            ), "rank ASC"
        );

        // View e gönderilecek değişkenlerin set edilmesi
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/list";
        $viewData->items = $items;
        $viewData->gallery = $gallery;


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_gallery_video_form($id){

        $viewData = new stdClass();

        $viewData->gallery_id = $id;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function gallery_video_save($id){
        
        $this->load->library("form_validation");

        //kurallar yazılır..
        $this->form_validation->set_rules("url", "Video Url", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();



        if ($validate) {


                    
            $insert = $this->video_model->add(
                array(
                    "url"           => $this->input->post("url"),
                    "gallery_id"   => $id,
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
            redirect(base_url("galleries/gallery_video_list/$id"));

        }else {
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "video/add";
            $viewData->form_error = true;
            $viewData->gallery_id = $id;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_gallery_video_form($id){

        $viewData = new stdClass();

        // Tablodan ilgili veri getiriliyor.
        $item = $this->video_model->get(
            array(
                "id"  => $id
            )
        );


        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    
    public function gallery_video_update($id, $gallery_id){
        
        $this->load->library("form_validation");

        //kurallar yazılır..
        $this->form_validation->set_rules("url", "Video Url", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır."
            )
        );

        //form validation çalıştırılır.
        $validate = $this->form_validation->run();



        if ($validate) {

            
            //$gallery_type = $this->input->post("gallery_type");
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";

        
            $update = $this->video_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "url"         => $this->input->post("url")
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
            redirect(base_url("galleries/gallery_video_list/$gallery_id"));                

        }else {
            $viewData = new stdClass();

            // Tablodan ilgili veri getiriliyor.
            $item = $this->video_model->get(
                array(
                    "id"    => $id
                )
            );

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "video/update";
            $viewData->form_error = true;
            $viewData->item = $item;

            

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function rankGalleryVideoSetter(){

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->video_model->update(
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
    
    public function galleryVideoisActiveSetter($id){
        
        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;

            $this->video_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );

            
        }
    }

    public function galleryVideoDelete($id, $gallery_id){

        $delete = $this->video_model->delete(
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
        redirect(base_url("galleries/gallery_video_list/$gallery_id"));
             
    }    

}