<?php

class News extends MY_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "news";
        $this->viewFolder = "news_v";
        $this->load->model("news_model");
        if(!get_active_user())
		{
			redirect(base_url("login"));
		}
        $image_upload = array(
            "image_width" => 1280,
            "image_height" => 720,
            "image_aspect_ratio" => 16/9
        );
        $this->session->set_flashdata("image_upload", $image_upload);
    }

    public function index()
    {
        $viewData = new stdClass();
        $items = $this->news_model->get_all(
            array(), "rank ASC"
        );
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
        $viewData->viewFolder = $this->viewFolder;
        $viewData->viewTitle = $this->viewTitle;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
   
    }
    public function save()
    {
        if(!isAllowViewModule($this->viewTitle, "write"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $this->load->library("form_validation");
        
        //kurallar
        $news_type = $this->input->post("news_type");
        if($news_type == "image")
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
            }
          
        }
      
        else if($news_type == "movie")
        {
            $this->form_validation->set_rules("video_url","Video Url","required|trim");
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
            if($news_type == "image")
            {
               
                $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                image_upload("img_url","new_form");
                $data = array(
                    "url"           => CharConvert($this->input->post("title")),
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "news_type"     => $news_type,
                    "img_url"       => $file_name,
                    "video_url"     => "#",
                    "rank"          => 0,
                    "isActive"      => 0,
                    "createdAt"     => date("Y-m-d H:i:s")
                );
                
              
            }
            else if($news_type == "movie")
            {
                $data = array(
                    "url"           => CharConvert($this->input->post("title")),
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "news_type"     => $news_type,
                    "img_url"       => "#",
                    "video_url"     => $this->input->post("video_url"),
                    "rank"          => 0,
                    "isActive"      => 0,
                    "createdAt"     => date("Y-m-d H:i:s")
                );
            }
            $insert = $this->news_model->add($data);

            //
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
            $viewData->news_type = $news_type;
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
        $item = $this->news_model->get(
            array(
                "id" => $id
            )
        );
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
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
            $this->news_model->update(
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
        if(!isAllowViewModule($this->viewTitle, "update"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach($items as $rank => $id)
		{
			$this->news_model->update(
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
        if(!isAllowViewModule($this->viewTitle, "delete"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $item = $this->news_model->get(
            array(
                "id" => $id
            )
        );
        $delete = $this->news_model->delete(
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
            if($item->news_type == "image")
            {
                unlink("uploads/{$this->viewFolder}/$item->img_url");
            }
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
    public function update($id)
    {
        if(!isAllowViewModule($this->viewTitle, "update"))
        {
            redirect(base_url($this->viewTitle));
            die();
        }
        $this->load->library("form_validation");
        
        //kurallar
        $news_type = $this->input->post("news_type");
        if($news_type == "movie")
        {
            $this->form_validation->set_rules("video_url","Video Url","required|trim");
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
            if($news_type == "image")
            {
                if($_FILES["img_url"]["name"] != "")
                {
                    $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                    image_upload("img_url","update_form");
                    $data = array(
                        "url"           => CharConvert($this->input->post("title")),
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "news_type"     => $news_type,
                        "img_url"       => $file_name,
                        "video_url"     => "",
                    );
                   
                }
                else
                {
                    $data = array(
                        "url"           => CharConvert($this->input->post("title")),
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                    );
                }
            }
            else if($news_type == "movie")
            {
                $data = array(
                    "url"           => CharConvert($this->input->post("title")),
                    "title"         => $this->input->post("title"),
                    "description"   => $this->input->post("description"),
                    "news_type"     => $news_type,
                    "img_url"       => "",
                    "video_url"     => $this->input->post("video_url"),
                );
            }
            $insert = $this->news_model->update(array("id" => $id), $data);

            //
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
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
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
            $viewData->subViewFolder = "update";
            $viewData->item = $this->news_model->get(
                array(
                    "id" => $id
                )
            );
            $viewData->form_error = true;
            $viewData->news_type = $news_type;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
   
}

?>