<?php
class Settings extends MY_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "settings";
        $this->viewFolder = "settings_v";
        $this->load->model("setting_model");
        if(!get_active_user())
		{
			redirect(base_url("login"));
		}
        $image_upload = array(
            "image_width" => 200,
            "image_height" => 200,
            "image_aspect_ratio" => 1/1
        );
        $this->session->set_flashdata("image_upload", $image_upload);
    }
    public function index()
    {
        $item = $this->setting_model->get(array());
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        if(empty($item))
            $viewData->subViewFolder = "none_blog";
        else
            $viewData->subViewFolder = "update";
        
        $viewData->item = $item;
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
        if($_FILES["logo"]["name"] == "")
        {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Lütfen Logo kısmından bir görsel Seçiniz!",
                "type" => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}/new_form"));
            die();
        }
        $this->form_validation->set_rules("company_name","Şirket Adı","required|trim");
        $this->form_validation->set_rules("phone_1","Şirket Numarası","required|trim");
        $this->form_validation->set_rules("email","Şirket E-postası","required|trim|valid_email");
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $file_name = CharConvert(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
            image_upload("logo","new_form");
            $insert = $this->setting_model->add(
                array(
                    "company_name"  => $this->input->post("company_name"),
                    "adress"        => $this->input->post("adress"),
                    "about_us"      => $this->input->post("about_us"),
                    "mission"       => $this->input->post("mission"),
                    "vission"       => $this->input->post("vission"),
                    "phone_1"       => $this->input->post("phone_1"),
                    "phone_2"       => $this->input->post("phone_2"),
                    "email"         => $this->input->post("email"),
                    "facebook"      => $this->input->post("facebook"),
                    "twitter"       => $this->input->post("twitter"),
                    "instagram"    => $this->input->post("instagram"),
                    "linkedin"      => $this->input->post("linkedin"),
                    "logo"          => $file_name,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
           
            $settings = $this->setting_model->get();
            $this->session->set_userdata("settings", $settings);
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
        $item = $this->setting_model->get(
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
        $this->form_validation->set_rules("company_name","Şirket Adı","required|trim");
        $this->form_validation->set_rules("phone_1","Şirket Numarası","required|trim");
        $this->form_validation->set_rules("email","Şirket E-postası","required|trim|valid_email");
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            if($_FILES["logo"]["name"] != "")
            {
                $file_name = CharConvert(pathinfo($_FILES["logo"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                image_upload("logo","update_form");
                $insert = $this->setting_model->update(array("id" => $id),
                    array(
                        "company_name"  => $this->input->post("company_name"),
                        "adress"        => $this->input->post("adress"),
                        "about_us"      => $this->input->post("about_us"),
                        "mission"       => $this->input->post("mission"),
                        "vission"       => $this->input->post("vission"),
                        "phone_1"       => $this->input->post("phone_1"),
                        "phone_2"       => $this->input->post("phone_2"),
                        "email"         => $this->input->post("email"),
                        "facebook"      => $this->input->post("facebook"),
                        "twitter"       => $this->input->post("twitter"),
                        "instagram"    => $this->input->post("instagram"),
                        "linkedin"      => $this->input->post("linkedin"),
                        "logo"          => $file_name,
                        "createdAt"     => date("Y-m-d H:i:s")
                    )
                );
            }
            else
            {
                $insert = $this->setting_model->update(array("id" => $id),
                    array(
                        "company_name"  => $this->input->post("company_name"),
                        "adress"        => $this->input->post("adress"),
                        "about_us"      => $this->input->post("about_us"),
                        "mission"       => $this->input->post("mission"),
                        "vission"       => $this->input->post("vission"),
                        "phone_1"       => $this->input->post("phone_1"),
                        "phone_2"       => $this->input->post("phone_2"),
                        "email"         => $this->input->post("email"),
                        "facebook"      => $this->input->post("facebook"),
                        "twitter"       => $this->input->post("twitter"),
                        "instagram"    => $this->input->post("instagram"),
                        "linkedin"      => $this->input->post("linkedin"),
                        "updatedAt"     => date("Y-m-d H:i:s")
                    )
                );
            }
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $settings = $this->setting_model->get();
            $this->session->set_userdata("settings", $settings);

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            $viewData = new stdClass();
            $viewData->viewTitle = $this->viewTitle;
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
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
        $user = $this->setting_model->get(
			array(
				"id" => $id
			)
		);
        $path = "uploads/$this->viewFolder/$user->user_name";
        
        $delete = $this->setting_model->delete(
            array("id" => $id)
        );
        if($delete)
        {
            rmdir($path);
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
			$this->setting_model->update(
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