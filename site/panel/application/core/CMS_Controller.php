<?php 
class CMS_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if(!get_active_user()){
			redirect(base_url("login"));
		}

        if (!isAllowedViewModule()) {
			redirect(base_url());            
        }
    }

}