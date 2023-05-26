<?php

class News extends CI_Controller{
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
            "image_width" => 1140,
            "image_height" => 705,
            "image_aspect_ratio" => 1.62/1
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
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->viewTitle = $this->viewTitle;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
   
    }
    public function save()
    {
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
    public function upload()
	{
		    $base64strcount = count($_POST["base64str"]);
            $img_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
			$img_path = "uploads/$this->viewFolder/$img_name";
			$file_path = "uploads/$this->viewFolder/";
			$img = $_POST["base64str"][0];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace('data:image/jpg;base64,', '', $img);
			$img = str_replace('data:image/jpeg;base64,', '', $img);
			$img = str_replace('data:image/gif;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$img_data = base64_decode($img);

			$im = imagecreatefromstring($img_data);
			if ($im !== false) {
				//header('Content-Type: image/png');
				imagepng($im, $img_path);
				imagedestroy($im);
			}
			else 
			{
				echo 'hata';
				exit();
			}

			// // Get new sizes
			// list($width, $height) = getimagesize($img_path);
			// $extension = pathinfo($img_path, PATHINFO_EXTENSION);

			// $resize_image_arr = array();
			// array_push($resize_image_arr, array("width" => "75", "height" => "75", "base_path" => $file_path."75"));
			// array_push($resize_image_arr, array("width" => "120", "height" => "120", "base_path" => $file_path."120"));
			// array_push($resize_image_arr, array("width" => "256", "height" => "256", "base_path" => $file_path."256"));

			// foreach ($resize_image_arr as $row) 
			// {
			// 	// CREATE IMAGES
			// 	$newwidth = $row['width'];
			// 	$newheight = $row['height'];

			// 	// Load
			// 	$destination = imagecreatetruecolor($newwidth, $newheight);
			// 	$source = imagecreatefromstring($img_data);
				
			// 	// Resize
			// 	imagecopyresized($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			// 	// Output
			// 	imagepng($destination, $row['base_path'].$img_name);
			// }
	}
    public function update_form($id)
    {
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
                    $config["allowed_types"] = "jpg|jpeg|png";
                    $config["upload_path"] = "uploads/$this->viewFolder/";
                    $config["file_name"] = $file_name;
                    $this->load->library("upload",$config);
                    $upload = $this->upload->do_upload("img_url");
                    if($upload)
                    {
                        $uploaded_file = $this->upload->data("file_name");
                    
                        $data = array(
                            "url"           => CharConvert($this->input->post("title")),
                            "title"         => $this->input->post("title"),
                            "description"   => $this->input->post("description"),
                            "news_type"     => $news_type,
                            "img_url"       => $uploaded_file,
                            "video_url"     => "#",
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
                        redirect(base_url("{$this->viewTitle}/update_form/$id"));
                    }
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
                    "img_url"       => "#",
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