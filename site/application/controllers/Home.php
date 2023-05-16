<?php
    class Home extends CI_Controller {
        public $viewFolder = "";
        public function __construct()
        {
            parent::__construct();
            $this->viewFolder = "homepage";
        }
        public function index()
        {
            echo $this->viewFolder;
        }
        public function product_list()
        {
            $this->load->model("product_model");
            $this->load->helper("text");
            $products = $this->product_model->get_all(
                array(
                    "isActive"  => 1
                ), "rank ASC"
            );
            $viewData = new stdClass();
            $viewData->products = $products;
            $viewData->viewFolder = "product_list_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
        public function product_detail()
        {
            $this->load->model("product_model");
            $this->load->helper("text");
            $products = $this->product_model->get_all(
                array(
                    "isActive"  => 1
                ), "rank ASC"
            );
            $viewData = new stdClass();
            $viewData->products = $products;
            $viewData->viewFolder = "product_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
    }


?>