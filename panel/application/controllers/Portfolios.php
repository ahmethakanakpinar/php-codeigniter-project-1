<?php
class Portfolios extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewTitle = "portfolios";
		$this->viewFolder = "portfolios_v";
		$this->load->model("portfolio_model");
		$this->load->model("portfolio_category_model");
		$this->load->model("portfolio_image_model");
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
        $viewData = new stdClass();

		$items = $this->portfolio_model->get_all(
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
		$categories = $this->portfolio_category_model->get_all(array("isActive" => 1));
		$viewData->categories = $categories;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function save()
	{
		$this->load->library("form_validation");
		//kuralların yazıldığı alan
		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "{field} alanını doldurulmalıdır."
			)
		);
		//form validation çalıştırılır.
		$validate = $this->form_validation->run();
		if($validate)
		{
			$insert = $this->portfolio_model->add(
				array(
					"url"			=> CharConvert($this->input->post("title")),
					"title"			=> $this->input->post("title"),
					"description"	=> $this->input->post("description"),
					"rank"			=> 0,
					"client"		=> $this->input->post("client"),
					"category_id"	=> $this->input->post("category_id"),
					"finishedAt"	=> $this->input->post("finishedAt"),
					"isActive"		=> 0,
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
			$categories = $this->portfolio_category_model->get_all(array("isActive" => 1));
			$viewData->categories = $categories;
			$viewData->viewTitle = $this->viewTitle;
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function update_form($id)
	{
		$categories = $this->portfolio_category_model->get_all(array("isActive" => 1));
		$item = $this->portfolio_model->get(
			array(
				"id" => $id
			)
		);	
		$viewData = new stdClass();
		$viewData->viewTitle = $this->viewTitle;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$viewData->categories = $categories;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function update($id)
	{
		$this->load->library("form_validation");
		//kuralların yazıldığı alan
		$this->form_validation->set_rules("title","Başlık","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "{field} alanını doldurulmalıdır."
			)
		);
		//form validation çalıştırılır.
		$validate = $this->form_validation->run();
		if($validate)
		{
			$update = $this->portfolio_model->update(
				array(
					"id" => $id
				),
				array(
					"url"			=> CharConvert($this->input->post("title")),
					"title"			=> $this->input->post("title"),
					"description"	=> $this->input->post("description"),
					"client"		=> $this->input->post("client"),
					"category_id"	=> $this->input->post("category_id"),
					"finishedAt"	=> $this->input->post("finishedAt"),
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
			redirect(base_url("{$this->viewTitle}"));
		}
		else
		{
			$viewData = new stdClass();
			$item = $this->portfolio_model->get(
				array(
					"id" => $id,
				)
			);
			$viewData->viewTitle = $this->viewTitle;
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$categories = $this->portfolio_category_model->get_all(array("isActive" => 1));
			$viewData->categories = $categories;
			$viewData->form_error = true;
			$viewData->item = $item;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function delete($id)
	{
		$delete = $this->portfolio_model->delete(
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
				"type" => "success"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url("{$this->viewTitle}"));
	}
	public function imageDelete($id, $parent_id)
	{
		$fileName = $this->portfolio_image_model->get(
			array(
				"id" => $id
			)
		);
		$delete = $this->portfolio_image_model->delete(
			array(
				"id" => $id
			)
		);
		if($delete)
		{
			unlink("uploads/{$this->viewFolder}/$fileName->img_url");
			redirect(base_url("{$this->viewTitle}/image_form/$parent_id"));
		}
		else
		{
			redirect(base_url("{$this->viewTitle}"));
		}
	}
	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->portfolio_model->update(
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
			$this->portfolio_image_model->update(
				array(
					"id" => $id,
					"portfolio_id" => $parent_id
				),
				array(
					"isCover" => $isCover
				)
			);
			$this->portfolio_image_model->update(
				array(
					"id !=" => $id,
					"portfolio_id" => $parent_id
				),
				array(
					"isCover" => 0
				)
			);
			$viewData = new stdClass();

			/** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
			$viewData->viewTitle = $this->viewTitle;
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "image";
	
			$viewData->item_images = $this->portfolio_image_model->get_all(
				array(
					"portfolio_id"    => $parent_id
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
			$this->portfolio_model->update(
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
	public function rankSetterImage()
	{
		$data = $this->input->post("data");
		parse_str($data,$order);
		$items = $order["ord"];
		foreach($items as $rank => $id)
		{
			$this->portfolio_image_model->update(
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
		$item = $this->portfolio_model->get(
			array(
				"id" => $id
			)
		);
		$viewData = new stdClass();
		$viewData->viewTitle = $this->viewTitle;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "image";
		$viewData->item = $item;
		$item_images = $this->portfolio_image_model->get_all(
			array(
				"portfolio_id" => $id
			), "rank ASC"
		);
		$viewData->item_images = $item_images;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function image_upload($id)
	{
		$file_name = CharConvert(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)). "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
		$config["allowed_types"] = "jpg|jpeg|png";
		$config["upload_path"] = "uploads/$this->viewFolder/";
		$config["file_name"] = $file_name;

		$this->load->library("upload",$config);
		$upload = $this->upload->do_upload("file");
		if($upload)
		{
			$uploaded_file = $this->upload->data("file_name");
			$this->portfolio_image_model->add(
				array(
					"img_url" 	=> $uploaded_file,
					"rank" 		=> 0,
					"isActive"	=> 0,
					"isCover"	=> 0,
					"createdAt"	=> date("Y-m-d H:i:s"),
					"portfolio_id"=> $id
				)
			);
		}
		else
		{
			echo "İşlem Başarısız";
		}
	}
	public function refresh_image_list($id){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
		$viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id"    => $id
            )
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render_html;

    }
	public function isActiveSetterImage($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->portfolio_image_model->update(
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
