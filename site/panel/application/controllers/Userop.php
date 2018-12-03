<?php

class Userop extends CI_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");

    }

    public function login(){

        if (get_active_user()) {
            redirect(base_url());
        }

        $viewData = new stdClass();
        
        // View e gönderilecek değişkenlerin set edilmesi
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login(){

        if (get_active_user()) {
            redirect(base_url());
        }

        $this->load->library("form_validation");

        //kurallar yazılır..            

        $this->form_validation->set_rules("user_email", "E-posta", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[6]|max_length[8]");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz.",
                "min_length"    => "{field} en az {param} karakter olmalı.",
                "max_length"    => "{field} en çok {param} karakter olmalı."
            )
        );
    
        //form validation çalıştırılır.
        if ($this->form_validation->run() == FALSE) {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }else {

            $user = $this->user_model->get(
                array(
                    "email"     => $this->input->post("user_email"),
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"  => 1
                )
            );

            if ($user) {

                $alert = array(
                    "title"      =>"İşlem Başarılı",
                    "message"    =>"$user->full_name hoşgeldiniz",
                    "type"      =>"success"
                );

                /*********** Kullnıcı Yetkilerinin Session'a Aktarılması **************/
                setUserRoles();
                /*********** ****************************************** **************/

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {
                $alert = array(
                    "title"      =>"İşlem Başarısız",
                    "message"    =>"Lütfen giriş bilgilierinizi kontrol ediniz.",
                    "type"      =>"error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));

            }
            
            
        }
    }

    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));
        
    }

    public function forget_password(){

        if (get_active_user()) {
            redirect(base_url());
        }

        $viewData = new stdClass();
        
        // View e gönderilecek değişkenlerin set edilmesi
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function reset_password(){

        $this->load->library("form_validation");

        //kurallar yazılır..            

        $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email");
        
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir e-posta adresi giriniz.",
            )
        );

        if ($this->form_validation->run() === FALSE) {
            
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }else {
            
            $user = $this->user_model->get(
                array(
                    "isActive"  => 1,
                    "email"     => $this->input->post("email")
                )
            );

            if ($user) {

                $this->load->helper("string");
                $temp_password = random_string();

        
                $send = send_email($user->email, "Şifremi unuttum!", "CMS'e geçici olarak <b>{$temp_password}</b> şifresi ile giriş yapabilirsiniz.");
        
                if ($send == true) {
                    echo "E-posta gönderilmiştir.";

                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );

                    $alert = array(
                        "title"      =>"İşlem Başarılı",
                        "message"    =>"Şifreniz E-posta Adresine Gönderilmiştir.",
                        "type"      =>"success"
                    );
    
                    $this->session->set_flashdata("alert", $alert);
    
                    redirect(base_url("login"));

                    die();

                } else {

                    //echo $this->email->print_debugger();

                    $alert = array(
                        "title"      =>"İşlem Başarısız",
                        "message"    =>"E-posta gönderilirken bir problem oluştu",
                        "type"      =>"error"
                    );
    
                    $this->session->set_flashdata("alert", $alert);
    
                    redirect(base_url("reset_password"));

                    die();

                }
                    
            } else {

                $alert = array(
                    "title"      =>"İşlem Başarısız",
                    "message"    =>"Böyle bir kullanıcı bulunamadı",
                    "type"      =>"error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("reset_password"));
                    
            }


        }

    }


}

