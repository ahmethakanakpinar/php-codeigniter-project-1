<?php

class Slides extends MY_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "slides";
        $this->viewFolder = "slides_v";
        $this->load->model("slide_model");
        if(!get_active_user())
		{
			redirect(base_url("login"));
		}
        $image_upload = array(
            "image_width" => 1920,
            "image_height" => 650,
            "image_aspect_ratio" => 192/65
        );
        $this->session->set_flashdata("image_upload", $image_upload);
    }
    public function index()
    {
        $viewData = new stdClass();
        $items = $this->slide_model->get_all(
            array(), "rank ASC"
        );
        $viewData->items = $items;
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
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
       
        if(($this->input->post("switch") == "on"))
        {
            $this->form_validation->set_rules("button_url","Buton Url","required|trim");
            $this->form_validation->set_rules("button_caption","Buton İsmi","required|trim");
        }
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            if($_FILES["img_url"]["name"] == "")
            {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Lütfen bir görsel Seçiniz!",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("{$this->viewTitle}/new_form"));
                die();
            }
            $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            image_upload("img_url","new_form");
            $input = array(
                        "title"             => $this->input->post("title"),
                        "description"       => $this->input->post("description"),
                        "img_url"           => $file_name,
                        "allowButton"       => ($this->input->post("switch") == "on") ? 1 : 0,
                        "rank"              =>0,
                        "isActive"          =>0,
                        "createdAt"         =>date("Y-m-d H:i:s")
                    );
            
            if(($this->input->post("switch") == "on"))
            {
                $input_switch = array(
                    "button_url"        => $this->input->post("button_url"),
                    "button_caption"    => $this->input->post("button_caption"),
                );
                $input = array_merge($input, $input_switch);
            }
           
            $insert = $this->slide_model->add($input);
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
       $item = $this->slide_model->get(
          array(
            "id" => $id
          )
        );
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->item = $item;
        $viewData->subViewFolder = "update";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        $this->load->library("form_validation");
        if(($this->input->post("switch") == "on"))
        {
            $this->form_validation->set_rules("button_url","Buton Url","required|trim");
            $this->form_validation->set_rules("button_caption","Buton İsmi","required|trim");
        }
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            if($_FILES["img_url"]["name"] != "")
            {
                $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                image_upload("img_url","update_form");
                $input = array(
                    "title"             => $this->input->post("title"),
                    "description"       => $this->input->post("description"),
                    "img_url"           => $file_name,
                    "allowButton"       => ($this->input->post("switch") == "on") ? 1 : 0,
                );
                if(($this->input->post("switch") == "on"))
                {
                    $input_switch = array(
                        "button_url"        => $this->input->post("button_url"),
                        "button_caption"    => $this->input->post("button_caption"),
                    );
                    $input = array_merge($input, $input_switch);
                }

                $insert = $this->slide_model->update(
                    array("id" => $id),
                    $input
                );
            }
            else
            {
                $input = array(
                    "title"             => $this->input->post("title"),
                    "description"       => $this->input->post("description"),
                    "allowButton"       => ($this->input->post("switch") == "on") ? 1 : 0,
                );
                if(($this->input->post("switch") == "on"))
                {
                    $input_switch = array(
                        "button_url"        => $this->input->post("button_url"),
                        "button_caption"    => $this->input->post("button_caption"),
                    );
                    $input = array_merge($input, $input_switch);
                }

                $insert = $this->slide_model->update(
                    array("id" => $id),
                    $input
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
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("{$this->viewTitle}"));
        }
        else
        {
            $viewData = new stdClass();
            $viewData->item = $this->slide_model->get(
                array(
                    "id" => $id
                )
            );
            $viewData->viewTitle = $this->viewTitle;
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
      
    }
    public function isActiveSetter($id)
    {
        if($id)
        {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->slide_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }
    public function rankSetter()
    {
        $data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach($items as $rank => $id)
		{
			$this->slide_model->update(
				array(
					"id" => $id,
					"rank !=" => $rank
				),
				array(
					"rank" => $rank
				)
			);
		}
    }
    public function delete($id)
    {
        $item = $this->slide_model->get(
            array(
                "id" => $id
            )
        );
        $delete = $this->slide_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete)
        {
            $alert = array(
				"title" => "İşlem Başarılı",
				"text" => "Kayıt başarılı bir şekilde silindi",
				"type" => "success"
			);
                unlink("uploads/{$this->viewFolder}/$item->img_url");
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
}
?>