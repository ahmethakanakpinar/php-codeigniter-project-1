<?php
class Our_team extends MY_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "our_team";
        $this->viewFolder = "our_team_v";
        $this->load->model("our_team_model");
        if(!get_active_user())
		{
			redirect(base_url("login"));
		}
        $image_upload = array(
            "image_width" => 300,
            "image_height" => 300,
            "image_aspect_ratio" => 1/1
        );
        $this->session->set_flashdata("image_upload", $image_upload);
    }
    public function index()
    {
        $items = $this->our_team_model->get_all(
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
        $this->form_validation->set_rules("full_name","Ad Soyad", "required|trim");
        $this->form_validation->set_rules("position","Pozisyon", "required|trim");
        $this->form_validation->set_rules("email","E-mail", "required|trim|is_unique[our_team.email]|valid_email");
        $this->form_validation->set_message(
            array(
                "is_unique"     => "{field} Benzersiz olmalıdır!",
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "valid_email"   => "Mail adresi kurallara uygun yazılmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $username = CharConvert($this->input->post("full_name"));
            $this->username = $username;
            $path = "uploads/{$this->viewFolder}";
            mkdir("{$path}/{$username}", 0755);
            if($_FILES["img_url"]["name"] != "")
            {
                $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                image_upload("img_url","new_form");
                $insert = $this->our_team_model->add(
                    array(
                        "full_name" => $this->input->post("full_name"),
                        "position" => $this->input->post("position"),
                        "email" => $this->input->post("email"),
                        "img_url" => $file_name,
                        "facebook" => $this->input->post("facebook"),
                        "instagram" => $this->input->post("instagram"),
                        "twitter" => $this->input->post("twitter"),
                        "isActive" => 0,
                        "createdAt" => date("Y-m-d H:i:s")
                    )
                );
            }
            else
            {
                $insert = $this->our_team_model->add(
                    array(
                        "full_name" => $this->input->post("full_name"),
                        "position" => $this->input->post("position"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "instagram" => $this->input->post("instagram"),
                        "twitter" => $this->input->post("twitter"),
                        "isActive" => 0,
                        "createdAt" => date("Y-m-d H:i:s")
                    )
                );
            }
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kullanıcı başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kullanıcı Ekleme sırasında bir problem oluştu",
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
        $item = $this->our_team_model->get(
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
        $old_user = $this->our_team_model->get(
            array("id" => $id)
        );
        $this->load->library("form_validation");
        if($old_user->email != $this->input->post("email"))
        {
            $this->form_validation->set_rules("email","E-mail", "required|trim|is_unique[our_team.email]|valid_email");
        }
        $this->form_validation->set_rules("full_name","Ad Soyad", "required|trim");
        $this->form_validation->set_rules("position","Pozisyon", "required|trim");
        $this->form_validation->set_message(
            array(
                "is_unique"     => "{field} Benzersiz olmalıdır!",
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "valid_email"   => "Mail adresi kurallara uygun yazılmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $username = CharConvert($this->input->post("full_name"));
            $this->username = $username;
            $path = "uploads/{$this->viewFolder}";
            $fullname = charConvert($old_user->full_name);
            rename("{$path}/{$fullname}","{$path}/{$username}");
            if($_FILES["img_url"]["name"] != "")
            {
                $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                image_upload("img_url","new_form");
                $insert = $this->our_team_model->update(
                    array("id" => $id),
                    array(
                        "full_name" => $this->input->post("full_name"),
                        "position" => $this->input->post("position"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "instagram" => $this->input->post("instagram"),
                        "twitter" => $this->input->post("twitter"),
                        "img_url" => $file_name
                    )
                );
            }
            else
            {
                $insert = $this->our_team_model->update(
                    array("id" => $id),
                    array(
                        "full_name" => $this->input->post("full_name"),
                        "position" => $this->input->post("position"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "instagram" => $this->input->post("instagram"),
                        "twitter" => $this->input->post("twitter")
                    )
                );
            }
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kullanıcı başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kullanıcı Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $user = $this->our_team_model->get(array("id" => $id));
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            
            $viewData = new stdClass();
            $item = $this->our_team_model->get(
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
        $user = $this->our_team_model->get(
			array(
				"id" => $id
			)
		);
        $fullname = CharConvert($user->full_name);
        $path = "uploads/$this->viewFolder/$fullname";
        
        $delete = $this->our_team_model->delete(
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
			$this->our_team_model->update(
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