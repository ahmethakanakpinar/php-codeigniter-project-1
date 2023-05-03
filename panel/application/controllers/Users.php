<?php
class Users extends CI_Controller{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "users";
        $this->viewFolder = "users_v";
        $this->load->model("user_model");
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


}


?>