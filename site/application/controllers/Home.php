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
        public function product_detail($url="")
        {
            $this->load->model("product_model");
            $this->load->model("product_image_model");
            $this->load->helper("text");
            $viewData = new stdClass();
            $product = $this->product_model->get(
                array(
                    "isActive"  => 1,
                    "url"       => $url
                )
            );
            $viewData->product = $product;

            $product_images = $this->product_image_model->get_all(
                array(
                    "isActive"  => 1,
                    "product_id"   => $viewData->product->id
                ), "rank ASC"
            );
            $viewData->product_images = $product_images;

            $other_products = $this->product_model->get_all(
                array(
                    "isActive"  => 1,
                    "id !="     => $viewData->product->id
                ), "rand()", array("start" => 0, "count" => 3)
            );
            $viewData->other_products = $other_products;
            $viewData->viewFolder = "product_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
    }


?>