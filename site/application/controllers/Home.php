<?php

class Home extends CI_Controller{

    public $viewFolder = "";

    public function __construct(){
        parent::__construct();

        $this->viewFolder = "product_list_v";
    }

    public function index(){
        echo $this->viewFolder;
    }

    public function product_list(){
    
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;

        $this->load->model("product_model");
        $this->load->helper('text');
        

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
        $this->load->helper('text');

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


}