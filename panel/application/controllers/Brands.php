<?php

class Brands extends CI_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "brands";
        $this->viewFolder = "brands_v";
        $this->load->model("brand_model");
    }
    public function index()
    {
        $viewData = new stdClass();
        $items = $this->brand_model->get_all(
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
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        $this->load->library("form_validation");
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
        $this->form_validation->set_rules("title","Başlık","required|trim");
        $this->form_validation->set_message(
            array(
                "required" => "{field} alanı doldurulmalıdır!"
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $file_name = CharConvert(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            $config["file_name"] = $file_name;
            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"] = "uploads/{$this->viewFolder}/";
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("img_url");
            if($upload)
            {
                $uploaded_file = $this->upload->data("file_name");
                $insert = $this->brand_model->add(
                    array(
                        "title"     => $this->input->post("title"),
                        "img_url"   => $uploaded_file,
                        "rank"      => 0,
                        "isActive"  => 0,
                        "createdAt" => date("Y-m-d H:i:s")
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

}

?>