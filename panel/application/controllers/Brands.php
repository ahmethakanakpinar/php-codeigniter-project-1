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

}

?>