<?php
class Userop extends CI_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v"; 
        $this->viewTitle = "users";
        $this->load->model("user_model");
    }
    public function login_form()
    {
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function do_login()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("user_username","Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("user_password","Şifre","required|trim|min_length[5]");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı boş bırakılmamalıdır!",
                "min_length"    => "{field} {param} Karakterden az olmamalıdır!",
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $user = $this->user_model->get(
                array(
                    "user_name" => $this->input->post("user_username"),
                    "password"  => md5($this->input->post("user_password"))
                )
            );
            if($user)
            {
                $alert = array(
                    "title" => "Giriş Yapılıyor",
                    "text" => "{$user->full_name} hoşgeldiniz.",
                    "type" => "success"
                );
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url());
            }
            else
            {
                $alert = array(
                    "title" => "Giriş Yapılamadı ",
                    "text"  => "Kullanıcı Adı veya parola hatalı!",
                    "type"  => "error"
                );
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }
        }
        else
        {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->viewTitle = $this->viewTitle;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
}



?>