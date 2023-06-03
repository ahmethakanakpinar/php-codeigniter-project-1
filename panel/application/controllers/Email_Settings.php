<?php
class Email_Settings extends MY_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "email_settings";
        $this->viewFolder = "email_settings_v";
        $this->load->model("email_setting_model");
        if(!get_active_user())
		{
			redirect(base_url("login"));
		}
    }
    public function index()
    {
        $items = $this->email_setting_model->get_all(
            array()
        );
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form()
    {
        if(!isAllowViewModule($this->viewTitle, "write"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        if(!isAllowViewModule($this->viewTitle, "write"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("protocol","Protokol Numarası", "required|trim");
        $this->form_validation->set_rules("host","E-posta Sunucusu", "required|trim");
        $this->form_validation->set_rules("port","Port Numarası", "required|trim");
        $this->form_validation->set_rules("user_name","Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("user","E-posta (User)", "required|trim|valid_email");
        $this->form_validation->set_rules("email_from","Kimden Gidecek (from)", "required|trim|valid_email");
        $this->form_validation->set_rules("email_to","Kime Gidecek (to)", "required|trim|valid_email");
        $this->form_validation->set_rules("password","Şifre", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "valid_email"   => "Mail adresi kurallara uygun yazılmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $insert = $this->email_setting_model->add(
                array(
                    "protocol" => $this->input->post("protocol"),
                    "host" => $this->input->post("host"),
                    "port" => $this->input->post("port"),
                    "user_name" => $this->input->post("user_name"),
                    "user" => $this->input->post("user"),
                    "email_from" => $this->input->post("email_from"),
                    "email_to" => $this->input->post("email_to"),
                    "password" => $this->input->post("password"),
                    "isActive" => 0,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Mail Adresi başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Mail Adresi Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            $viewData = new stdClass();
            $viewData->viewTitle = $this->viewTitle;
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    public function update_form($id)
    {
        if(!isAllowViewModule($this->viewTitle, "update"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $item = $this->email_setting_model->get(
            array(
                "id"    => $id
            )
        );
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        if(!isAllowViewModule($this->viewTitle, "update"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("protocol","Protokol Numarası", "required|trim");
        $this->form_validation->set_rules("host","E-posta Sunucusu", "required|trim");
        $this->form_validation->set_rules("port","Port Numarası", "required|trim");
        $this->form_validation->set_rules("user_name","Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("user","E-posta (User)", "required|trim|valid_email");
        $this->form_validation->set_rules("email_from","Kimden Gidecek (from)", "required|trim|valid_email");
        $this->form_validation->set_rules("email_to","Kime Gidecek (to)", "required|trim|valid_email");
        $this->form_validation->set_rules("password","Şifre", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "valid_email"   => "Mail adresi kurallara uygun yazılmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $insert = $this->email_setting_model->update(
                array("id" => $id),
                array(
                    "protocol" => $this->input->post("protocol"),
                    "host" => $this->input->post("host"),
                    "port" => $this->input->post("port"),
                    "user_name" => $this->input->post("user_name"),
                    "user" => $this->input->post("user"),
                    "email_from" => $this->input->post("email_from"),
                    "email_to" => $this->input->post("email_to"),
                    "password" => $this->input->post("password"),
                    "isActive" => 0,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Mail Adresi başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Mail Adresi Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            
            $viewData = new stdClass();
            $item = $this->email_setting_model->get(
                array("id" => $id)
            );
            $viewData->viewTitle = $this->viewTitle;
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    public function delete($id)
    {   
        if(!isAllowViewModule($this->viewTitle, "delete"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $delete = $this->email_setting_model->delete(
            array("id" => $id)
        );
        if($delete)
        {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type" => "success"
            );
        }
        else
        {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("$this->viewTitle"));
    }
    public function isActiveSetter($id)
    {
        if(!isAllowViewModule($this->viewTitle, "update"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->email_setting_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
    }
  

}


?>