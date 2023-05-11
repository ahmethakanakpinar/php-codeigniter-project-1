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
        if(get_active_user())
		{
			redirect(base_url());
		}
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
    }
    public function do_login()
    {
        if(get_active_user())
		{
			redirect(base_url());
		}
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
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"  => 1
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
    public function logout_form()
    {
        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }
    public function forget_password_form()
    {
        if(get_active_user())
		{
			redirect(base_url());
		}
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function reset_password()
    {
        if(get_active_user())
		{
			redirect(base_url());
		}
        $this->load->library("form_validation");
        $this->form_validation->set_rules("email","E-posta","required|trim|valid_email");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı boş bırakılmamalıdır!",
                "valid_email"    => "{field} kurallarına göre yazılmalıdır!",
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $user = $this->user_model->get(
                array(
                    "email" => $this->input->post("email"),
                    "isActive"  => 1
                )
            );
            if($user)
            {
                $this->load->helper("string");
                $temp_password = random_string();
                $send = send_email($user->email, "Şifremi Unuttum", "CMS'e geçici olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz");
              
                if($send)
                {
                    $this->user_model->update(
                        array(
                            "id" => $user->id
                        ),
                        array(
                            "password" => md5($temp_password)
                        )
                    );
                    $alert = array(
                        "title" => "",
                        "text"  => "<b>{$this->input->post("email")}</b> adresi ile oluşturulmuş bir üyelik sistemimizde bulunması durumunda e-posta adresinin size ait olduğunu doğrulamak için bir link tarafınıza e-posta ile gönderilecektir.",
                        "type"  => "success"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("forget-password"));
                }
            }
            $alert = array(
                "title" => "",
                "text"  => "<b>{$this->input->post("email")}</b> adresi ile oluşturulmuş bir üyelik sistemimizde bulunması durumunda e-posta adresinin size ait olduğunu doğrulamak için bir link tarafınıza e-posta ile gönderilecektir.",
                "type"  => "warner"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("forget-password"));
        }
        else
        {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->viewTitle = $this->viewTitle;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }


}



?>