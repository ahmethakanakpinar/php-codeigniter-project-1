<?php
class Users extends CI_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "users";
        $this->viewFolder = "users_v";
        $this->load->model("user_model");
        if(!get_active_user())
		{
			redirect(base_url("login"));
		}
    }
    public function index()
    {
        $items = $this->user_model->get_all(
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
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("user_name","Kullanıcı Adı", "required|trim|is_unique[users.user_name]|max_length[20]");
        $this->form_validation->set_rules("full_name","Ad Soyad", "required|trim");
        $this->form_validation->set_rules("email","E-mail", "required|trim|is_unique[users.email]|valid_email");
        $this->form_validation->set_rules("password","Parola", "required|trim|min_length[5]|max_length[20]");
        $this->form_validation->set_rules("password-repeat","Şifre Tekrar", "required|trim|min_length[5]|max_length[20]|matches[password]");
        $this->form_validation->set_message(
            array(
                "is_unique"     => "{field} Benzersiz olmalıdır!",
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "max_length"    => "{field} {param} Karakterden fazla olmamalıdır!",
                "min_length"    => "{field} {param} Karakterden az olmamalıdır!",
                "matches"       => "Şifreler Birbirleri ile uyuşmuyor!",
                "valid_email"   => "Mail adresi kurallara uygun yazılmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $username = CharConvert($this->input->post("user_name"));
            $path = "uploads/{$this->viewFolder}";
            mkdir("{$path}/{$username}", 0755);
            if($_FILES["img_url"]["name"] != "")
            {
                $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                $config["file_name"] = $file_name;
                $config["upload_path"] = "{$path}/{$username}/";
                $config["allowed_types"] = "jpg|jpeg|png";
                $this->load->library("upload",$config);
                $upload = $this->upload->do_upload("img_url");
                if($upload)
                {
                    $insert = $this->user_model->add(
                        array(
                            "user_name" => $username,
                            "full_name" => $this->input->post("full_name"),
                            "email" => $this->input->post("email"),
                            "password" => md5($this->input->post("password")),
                            "img_url" => $file_name,
                            "isActive" => 0,
                            "createdAt" => date("Y-m-d H:i:s")
                        )
                    );
                }
                else
                {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel Yükleme de problem yaşandı!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("{$this->viewTitle}/new_form"));
                    die();
                }
              
            }
            else
            {
                $insert = $this->user_model->add(
                    array(
                        "user_name" => $username,
                        "full_name" => $this->input->post("full_name"),
                        "email" => $this->input->post("email"),
                        "password" => md5($this->input->post("password")),
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
        $item = $this->user_model->get(
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
        $old_user = $this->user_model->get(
            array("id" => $id)
        );
        $this->load->library("form_validation");
        if($old_user->user_name != $this->input->post("user_name"))
        {
            $this->form_validation->set_rules("user_name","Kullanıcı Adı", "required|trim|is_unique[users.user_name]|max_length[20]");
        }
        if($old_user->email != $this->input->post("email"))
        {
            $this->form_validation->set_rules("email","E-mail", "required|trim|is_unique[users.email]|valid_email");
        }
        $this->form_validation->set_rules("full_name","Ad Soyad", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "is_unique"     => "{field} Benzersiz olmalıdır!",
                "max_length"    => "{field} {param} Karakterden fazla olmamalıdır!",
                "valid_email"   => "Mail adresi kurallara uygun yazılmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $username = CharConvert($this->input->post("user_name"));
            $path = "uploads/{$this->viewFolder}";
            rename("{$path}/{$old_user->user_name}","{$path}/{$username}");
            if($_FILES["img_url"]["name"] != "")
            {
                $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                $config["file_name"] = $file_name;
                $config["upload_path"] = "{$path}/{$username}/";
                $config["allowed_types"] = "jpg|jpeg|png";
                $this->load->library("upload",$config);
                $upload = $this->upload->do_upload("img_url");
                if($upload)
                {
                    $insert = $this->user_model->update(
                        array("id" => $id),
                        array(
                            "user_name" => $username,
                            "full_name" => $this->input->post("full_name"),
                            "email" => $this->input->post("email"),
                            "img_url" => $file_name,
                        )
                    );
                }
                else
                {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel güncelleme sırasında problem yaşandı!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("{$this->viewTitle}/update_form/$id"));
                    die();
                }
              
            }
            else
            {
                $insert = $this->user_model->update(
                    array("id" => $id),
                    array(
                        "user_name" => $username,
                        "full_name" => $this->input->post("full_name"),
                        "email" => $this->input->post("email"),
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
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            
            $viewData = new stdClass();
            $item = $this->user_model->get(
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
    public function password_form($id)
    {
        $item = $this->user_model->get(
            array(
                "id"    => $id
            )
        );
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function password_update($id)
    {
       
        $this->load->library("form_validation");
        $this->form_validation->set_rules("password","Parola", "required|trim|min_length[5]|max_length[20]");
        $this->form_validation->set_rules("password-repeat","Şifre Tekrar", "required|trim|min_length[5]|max_length[20]|matches[password]");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} Alanı Boş bırakılmamalıdır!",
                "max_length"    => "{field} {param} Karakterden fazla olmamalıdır!",
                "min_length"    => "{field} {param} Karakterden az olmamalıdır!",
                "matches"       => "Şifreler Birbirleri ile uyuşmuyor!",
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $insert = $this->user_model->update(
                array("id" => $id),
                array(
                    "password" => md5($this->input->post("password")),
                )
            );
            if($insert)
            {
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kullanıcının şifresi başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            }
            else
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kullanıcının şifresini Güncellerken bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            
            $viewData = new stdClass();
            $item = $this->user_model->get(
                array("id" => $id)
            );
            $viewData->viewTitle = $this->viewTitle;
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    public function delete($id)
    {
        $user = $this->user_model->get(
			array(
				"id" => $id
			)
		);
        $path = "uploads/$this->viewFolder/$user->user_name";
        
        $delete = $this->user_model->delete(
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
        if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->user_model->update(
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