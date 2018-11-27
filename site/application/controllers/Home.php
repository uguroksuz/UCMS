<?php

class Home extends CI_Controller{

    public $viewFolder = "home";

    public function __construct(){
        parent::__construct();
        $this->load->helper('text');
    }

    public function index(){
        echo $this->viewFolder;
    }

    public function product_list(){
    
        $viewData = new stdClass();
        $viewData->viewFolder = "product_list_v";

        $this->load->model("product_model");
        
        

        $viewData->products = $this->product_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );
        

        $this->load->view($viewData->viewFolder, $viewData);

    }

    
    public function product_detail($url = ""){
    
        $viewData = new stdClass();
        $viewData->viewFolder = "product_V";

        $this->load->model("product_model");
        $this->load->model("product_image_model");
        

        $viewData->product = $this->product_model->get(
            array(
                "isActive"  => 1,
                "url"       => $url
            )
        );

        $viewData->product_images = $this->product_image_model->get_all(
            array(
                "isActive" =>  1,
                "product_id" => $viewData->product->id,
            ), "rank ASC"
        );

        $viewData->products = $this->product_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $viewData->product->id,
            ), "rand()", array("start" =>0, "count" => 3)
        );
        

        $this->load->view($viewData->viewFolder, $viewData);

    }

    
    public function portfolio_list(){
    
        $viewData = new stdClass();
        $viewData->viewFolder = "portfolio_list_v";

        $this->load->model("portfolio_model");
        
        

        $viewData->portfolios = $this->portfolio_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function portfolio_detail($url = ""){
    
        $viewData = new stdClass();
        $viewData->viewFolder = "portfolio_V";

        $this->load->model("portfolio_model");
        $this->load->model("portfolio_image_model");
        

        $viewData->portfolio = $this->portfolio_model->get(
            array(
                "isActive"  => 1,
                "url"       => $url
            )
        );

        $viewData->portfolio_images = $this->portfolio_image_model->get_all(
            array(
                "isActive" =>  1,
                "portfolio_id" => $viewData->portfolio->id,
            ), "rank ASC"
        );

        $viewData->portfolios = $this->portfolio_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $viewData->portfolio->id,
            ), "rand()", array("start" =>0, "count" => 3)
        );
        

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function course_list()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "course_list_v";

        $this->load->model('course_model');

        $viewData->courses = $this->course_model->get_all(
            array(
                "isActive"  => 1,
            ), "rank ASC, event_date ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
        
    }

    public function course_detail($url = ""){
    
        $viewData = new stdClass();
        $viewData->viewFolder = "course_V";

        $this->load->model("course_model");
        

        $viewData->course = $this->course_model->get(
            array(
                "isActive"  => 1,
                "url"       => $url
            )
        );

        $viewData->courses = $this->course_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $viewData->course->id,
            ), "rand()", array("start" =>0, "count" => 3)
        );
        

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function reference_list()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "reference_list_v";

        $this->load->model('reference_model');

        $viewData->references = $this->reference_model->get_all(
            array(
                "isActive"  => 1,
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
        
    }

    public function brand_list()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "brand_list_v";

        $this->load->model('brand_model');

        $viewData->brands = $this->brand_model->get_all(
            array(
                "isActive"  => 1,
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);
        
    }
    
    public function service_list()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "service_list_v";

        $this->load->model('service_model');

        $viewData->services = $this->service_model->get_all(
            array(
                "isActive"  => 1,
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);

    }
    
    public function about_us()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "about_v";

        $this->load->model('setting_model');

        $viewData->settings = $this->setting_model->get();

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function contact()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "contact_v";

        $this->load->helper('captcha');
        
        $config = array(
            "word"          => '',
            "img_path"      => 'captcha/',
            "img_url"       => base_url("captcha"),
            "font_path"     => base_url() . 'fonts/corbel.ttf',
            "img_width"     => 150,
            "img_height"    => 50,
            "expiration"    => 7200,
            "word_length"   => 5,
            "font_size"     => 16,
            "img_id"        => "captcha_img",
            "pool"          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            "colors"        => array(
                "background" => array(56,255,45),
                "border"     => array(255,255,255),
                "text"       => array(0,0,0),
                "grid"       => array(255,40,40)
            )

        );

        $viewData->captcha = create_captcha($config);

        
        $array = array(
            'captcha' => $viewData->captcha["word"]
        );
        
        $this->session->set_userdata( $array );
        

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function send_contact_message()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name', 'Ad', 'trim|required');
        $this->form_validation->set_rules('email', 'E-posta', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Konu', 'trim|required');
        $this->form_validation->set_rules('message', 'Mesaj', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Doğrulama Kodu', 'trim|required');
        
        
        if ($this->form_validation->run() === FALSE) {

            //TODO: Alert sistemi yapılacak

            redirect(base_url("iletisim"));
        } else {
            
            
            if ($this->session->userdata('captcha') == $this->input->post("captcha")) {
                
                $name = $this->input->post("name");
                $email = $this->input->post("email");
                $subject = $this->input->post("subject");
                $message = $this->input->post("message");

                $email_message = "{$name} isimli ziyaretçi bir mesaj bıraktı. <br> <b>Mesaj:</b> {$message} <br> <b>E-posta : </b> {$email}";

                if(send_email("", "Site İletişim Mesajı | {$subject}", $email_message)) {

                    echo "mail başarılı";
                } else{

                    echo "mail başarısız";
                }

            } else{
                echo "hata";
                //Alert
                //redirect(base_url("iletisim"));

            }

        }
        
    }

    public function make_me_member(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('subscribe_email', 'E-posta Adresi', 'trim|required|valid_email');

        
        if ($this->form_validation->run() === FALSE) {
            redirect(base_url());
        } else {
            $this->load->model('member_model');

            $insert = $this->member_model->add(
                array(
                    "email"         => $this->input->post("subscribe_email"),
                    "ip_address"    => $this->input->ip_address(),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            if ($insert) {
                //TODO: Alert
            } else {
                //TODO: Alert
            }

            redirect(base_url("iletisim"));
            
            
        }
        
        
        
        
    }

}