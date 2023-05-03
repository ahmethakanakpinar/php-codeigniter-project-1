<?php
class Galleries extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewTitle = "galleries";
		$this->viewFolder = "galleries_v";
		$this->load->model("gallery_model");
		$this->load->model("image_model");
		$this->load->model("video_model");
		$this->load->model("file_model");

	}

	public function index()
	{
        $viewData = new stdClass();

		$items = $this->gallery_model->get_all(
			array(), "rank ASC"
		);

		// View'e gönderilecek olan değişkenlerin set edilmesi
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
		//kuralların yazıldığı alan
		$this->form_validation->set_rules("title","Galeri Başlığı","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "{field} alanını doldurulmalıdır."
			)
		);
		//form validation çalıştırılır.
		$validate = $this->form_validation->run();
		if($validate)
		{
	
			$gallery_type = $this->input->post("gallery_type");
			$path = "uploads/{$this->viewFolder}";
			if($gallery_type == "image")
			{
				$folder_name = CharConvert($this->input->post("title"));
				$path = "{$path}/images/$folder_name";
			}
			else if($gallery_type == "file")
			{
				$folder_name = CharConvert($this->input->post("title"));
				$path = "{$path}/files/$folder_name";
			}
			
			if($gallery_type != "movie")
			{
				if(!mkdir($path, 0755))
				{
					$alert = array(
						"title" => "İşlem Başarısız",
						"text" => "Galeri Oluşturma sırasında bir problem oluştu! (Yetki Hatası)",
						"type" => "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("{$this->viewTitle}"));
				}
			}
	

			$insert = $this->gallery_model->add(
				array(
					"url"			=> CharConvert($this->input->post("title")),
					"title"			=> $this->input->post("title"),
					"gallery_type"  => $this->input->post("gallery_type"),
					"folder_name"	=> $folder_name,
 					"isActive"		=> 0,
					"rank"			=> 0,
					"createdAt"		=> date("Y-m-d H:i:s")
				)
			);
			if($insert)
			{
				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde eklendi",
					"type" => "success"
				);
			}
			else
			{
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt işlemi sırasında bir problem oluştu!",
					"type" => "error"
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
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function update_form($id)
	{
		$item = $this->gallery_model->get(
			array(
				"id" => $id
			)
		);	
		$viewData = new stdClass();
		$viewData->viewTitle = $this->viewTitle;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function update($id, $gallery_type, $old_folder_name = "")
	{
		$this->load->library("form_validation");
		//kuralların yazıldığı alan
		$this->form_validation->set_rules("title","Galeri Başlığı","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "{field} alanını doldurulmalıdır."
			)
		);
		//form validation çalıştırılır.
		$validate = $this->form_validation->run();
		if($validate)
		{
			
			if($gallery_type == "image")
			{
				$folder_name = CharConvert($this->input->post("title"));
				$path = "uploads/{$this->viewFolder}/images";
			}
			else if($gallery_type == "file")
			{
				$folder_name = CharConvert($this->input->post("title"));
				$path = "uploads/{$this->viewFolder}/files";
			}
			if($gallery_type != "movie")
			{
				if(!rename("$path/$old_folder_name","$path/$folder_name"))
				{
					$alert = array(
						"title" => "İşlem Başarısız",
						"text" => "Galeri Güncellemesi sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("$this->viewTitle"));
					die();
				}
			}
			$update = $this->gallery_model->update(
				array(
					"id" => $id
				),
				array(
					"url"			=> CharConvert($this->input->post("title")),
					"title"			=> $this->input->post("title"),
					"folder_name"	=> $folder_name,
				)
			);
			if($update)
			{
				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Güncelleme başarılı bir şekilde yapıldı",
					"type" => "success"
				);
			
			}
			else
			{
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Güncelleme sırasında bir problem oluştu!",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("$this->viewTitle"));
		}
		else
		{
			$viewData = new stdClass();
			$viewData->viewTitle = $this->viewTitle;
			$item = $this->gallery_model->get(
				array(
					"id" => $id,
				)
			);
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function delete($id)
	{
		$gallery = $this->gallery_model->get(
			array(
				"id" => $id
			)
		);
		if($gallery)
		{
			if($gallery->gallery_type == "image")
				$path = "uploads/$this->viewFolder/images/$gallery->folder_name";
			else if($gallery->gallery_type == "file")
				$path = "uploads/$this->viewFolder/files/$gallery->folder_name";
			if($gallery->gallery_type != "movie")
			{
				if(!rmdir($path))
				{
					$alert = array(
						"title" => "İşlem Başarısız",
						"text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
						"type" => "error"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url("$this->viewTitle"));
					die();
				}
			}
			$delete = $this->gallery_model->delete(
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
	public function fileDelete($id, $parent_id, $gallery_type)
	{
		$model = ($gallery_type == "image") ? "image_model" : "file_model";
		$fileName = $this->$model->get(
			array(
				"id" => $id
			)
		);
		$delete = $this->$model->delete(
			array(
				"id" => $id
			)
		);
		if($delete)
		{
			unlink($fileName->url);
			redirect(base_url("$this->viewTitle/image_form/$parent_id"));
		}
		else
		{
			redirect(base_url("$this->viewTitle"));
		}
	}
	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->gallery_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
	public function isCoverSetter($id, $parent_id)
	{
		if($id && $parent_id)
		{
			$isCover = ($this->input->post("data") === "true") ? 1 : 0;
			$this->product_image_model->update(
				array(
					"id" => $id,
					"product_id" => $parent_id
				),
				array(
					"isCover" => $isCover
				)
			);
			$this->product_image_model->update(
				array(
					"id !=" => $id,
					"product_id" => $parent_id
				),
				array(
					"isCover" => 0
				)
			);
			$viewData = new stdClass();
			$viewData->viewTitle = $this->viewTitle;
			/** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "image";
	
			$viewData->item_images = $this->product_image_model->get_all(
				array(
					"product_id"    => $parent_id
				), "rank ASC"
			);
	
			$render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
	
			echo $render_html;
			
		}
	}
	public function rankSetter()
	{
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach($items as $rank => $id)
		{
			$this->gallery_model->update(
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
	public function rankSetterFile($gallery_type)
	{
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach($items as $rank => $id)
		{
			$model = ($gallery_type == "image") ? "image_model":"file_model";
			$this->$model->update(
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
	public function image_form($id)
	{
		$item = $this->gallery_model->get(
			array(
				"id" => $id
			)
		);
		$viewData = new stdClass();
		$viewData->viewTitle = $this->viewTitle;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "image";
		$viewData->item = $item;
		if($item->gallery_type == "image")
		{
			$item_images = $this->image_model->get_all(
				array(
					"gallery_id" => $id
				), "rank ASC"
			);
		}
		else if($item->gallery_type == "file")
		{
			$item_images = $this->file_model->get_all(
				array(
					"gallery_id" => $id
				), "rank ASC"
			);
		}
		else if($item->gallery_type == "movie")
		{
			$item_images = $this->video_model->get_all(
				array(
					"gallery_id" => $id
				), "rank ASC"
			);
		}
		$viewData->gallery_type = $item->gallery_type; 
		$viewData->item_images = $item_images;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function file_upload($gallery_id,$gallery_type,$gallery_fileName)
	{
		$file_name = CharConvert(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)). "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
		$config["allowed_types"] = "jpg|jpeg|png|pdf|doc|docx|txt";
		$gallery_path = ($gallery_type == "image") ? "images" : "files";
		$config["upload_path"] = "uploads/$this->viewFolder/$gallery_path/$gallery_fileName/";
		$config["file_name"] = $file_name;

		$this->load->library("upload", $config);
		$upload = $this->upload->do_upload("file");
		if($upload)
		{
			$uploaded_file = $this->upload->data("file_name");
			$model = ($gallery_type == "image") ? "image_model" : "file_model";
			$this->$model->add(
				array(
					"url" 		=> "{$config["upload_path"]}$uploaded_file",
					"rank" 		=> 0,
					"isActive"	=> 0,
					"createdAt"	=> date("Y-m-d H:i:s"),
					"gallery_id"=> $gallery_id
				)
			);
		}
		else
		{
			echo "İşlem Başarısız";
		}
	}
	public function refresh_file_list($gallery_id,$gallery_type)
	{

        $viewData = new stdClass();
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
		$viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
		$model = ($gallery_type == "image") ? "image_model" : "file_model";
        $viewData->item_images = $this->$model->get_all(
            array(
                "gallery_id"    => $gallery_id
            )
        );
		$viewData->gallery_type = $gallery_type; 
        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list_v", $viewData, true);

        echo $render_html;

    }
	public function isActiveSetterFile($id, $gallery_type)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$model = ($gallery_type == "image") ? "image_model":"file_model";
			$this->$model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
	public function gallery_video_list($id)
	{
		$viewData = new stdClass();
		$gallery = $this->gallery_model->get(
			array(
				"id" => $id
			)
		);

		$items = $this->video_model->get_all(
			array(
				"gallery_id" => $id
			), "rank ASC"
		);

		// View'e gönderilecek olan değişkenlerin set edilmesi
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/list";
		$viewData->items = $items;
		$viewData->gallery = $gallery;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function new_video_form($id)
	{
		
		$viewData = new stdClass();
		$viewData->viewTitle = $this->viewTitle;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "video/add";
		$viewData->gallery_id = $id;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function gallery_video_save($id)
	{
		
		$this->load->library("form_validation");
		//kuralların yazıldığı alan
		$this->form_validation->set_rules("url","Video URL","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "{field} alanını doldurulmalıdır."
			)
		);
		//form validation çalıştırılır.
		$validate = $this->form_validation->run();
		if($validate)
		{	

			$insert = $this->video_model->add(
				array(
					"url"			=> $this->input->post("url"),
					"gallery_id"	=> $id,
 					"isActive"		=> 0,
					"rank"			=> 0,
					"createdAt"		=> date("Y-m-d H:i:s")
				)
			);
			if($insert)
			{
				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Kayıt başarılı bir şekilde eklendi",
					"type" => "success"
				);
			}
			else
			{
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Kayıt işlemi sırasında bir problem oluştu!",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("{$this->viewTitle}/gallery_video_list/$id"));
		}
		else
		{
			$viewData = new stdClass();
			$viewData->viewTitle = $this->viewTitle;
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->gallery_id = $id;
			$viewData->form_error = true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function gallery_update_form($id)
	{
		$item = $this->video_model->get(
			array(
				"id" => $id
			)
		);	
		$viewData = new stdClass();
		$viewData->viewTitle = $this->viewTitle;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "video/update";
		$viewData->item = $item;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function gallery_video_update($id, $gallery_id)
	{
		
		$this->load->library("form_validation");
		//kuralların yazıldığı alan
		$this->form_validation->set_rules("url","Video URL","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "{field} alanını doldurulmalıdır."
			)
		);
		//form validation çalıştırılır.
		$validate = $this->form_validation->run();
		if($validate)
		{
			
			$update = $this->video_model->update(
				array(
					"id" => $id
				),
				array(
					"url"			=> $this->input->post("url")
				)
			);
			if($update)
			{
				$alert = array(
					"title" => "İşlem Başarılı",
					"text" => "Güncelleme başarılı bir şekilde yapıldı",
					"type" => "success"
				);
			
			}
			else
			{
				$alert = array(
					"title" => "İşlem Başarısız",
					"text" => "Güncelleme sırasında bir problem oluştu!",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("$this->viewTitle/gallery_video_list/$gallery_id"));
		}
		else
		{
			$item = $this->video_model->get(
				array(
					"id" => $id
				)
			);
			$viewData = new stdClass();
			$viewData->viewTitle = $this->viewTitle;
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "video/update";
			$viewData->form_error = true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function gallery_video_delete($id, $gallery_id)
	{
		$delete = $this->video_model->delete(
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
			redirect(base_url("$this->viewTitle/gallery_video_list/$gallery_id"));
	}
	public function galleryVideoRankSetter()
	{
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach($items as $rank => $id)
		{
			$this->video_model->update(
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
	public function galleryVideoIsActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->video_model->update(
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
