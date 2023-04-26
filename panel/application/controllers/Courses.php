<?php 

class Courses extends CI_Controller{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewTitle = "courses";
        $this->viewFolder = "courses_v";
        $this->load->model("course_model");
    }
    public function index()
    {
        $items = $this->course_model->get_all(
            array(), "rank ASC"
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