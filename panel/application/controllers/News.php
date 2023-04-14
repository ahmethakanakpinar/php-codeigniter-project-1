<?php

class News extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "news";
        $this->viewFolder = "news_v";
        $this->load->model("news_model");
    }

    public function index()
    {
        $viewData = new stdClass();
        $items = $this->news_model->get_all(
            array(), "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->viewTitle = $this->viewTitle;
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
        $insert = $this->news_model->add(
            array(
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "news_type" => "",
                "img_url" => "",
                "video_url" => "",
                "rank" => "",
                

            )
        );
    }
    

}

?>