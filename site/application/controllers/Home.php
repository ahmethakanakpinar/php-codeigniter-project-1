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
            $viewData->product = $this->product_model->get(
                array(
                    "isActive"  => 1,
                    "url"       => $url
                )
            );
            $viewData->product_images = $this->product_image_model->get_all(
                array(
                    "isActive"      => 1,
                    "product_id"    => $viewData->product->id,
                ), "rank ASC"
            );

            $viewData->other_products = $this->product_model->get_all(
                array(
                    "isActive"  => 1,
                    "id !="     => $viewData->product->id
                ), "rand()", array("start" => 0, "count" => 3)
            );
            $viewData->viewFolder = "product_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
        public function portfolios_list()
        {
            $this->load->model("portfolio_model");
            $this->load->helper("text");
            $portfolios = $this->portfolio_model->get_all(
                array(
                    "isActive"  => 1
                ), "rank ASC"
            );
            $viewData = new stdClass();
            $viewData->portfolios = $portfolios;
            $viewData->viewFolder = "portfolios_list_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
        public function portfolios_detail($url="")
        {
            $this->load->model("portfolio_model");
            $this->load->model("portfolio_image_model");
            $this->load->helper("text");
            $viewData = new stdClass();
            $portfolios = $this->portfolio_model->get(
                array(
                    "isActive"  => 1,
                    "url"       => $url
                )
            );
            $viewData->portfolios = $portfolios;

            $portfolio_images = $this->portfolio_image_model->get_all(
                array(
                    "isActive"  => 1,
                    "portfolio_id"   => $viewData->portfolios->id
                ), "rank ASC"
            );
            $viewData->portfolio_images = $portfolio_images;

            $other_portfolios = $this->portfolio_model->get_all(
                array(
                    "isActive"  => 1,
                    "id !="     => $viewData->portfolios->id
                ), "rand()", array("start" => 0, "count" => 3)
            );
            $viewData->other_portfolios = $other_portfolios;
            $viewData->viewFolder = "portfolios_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
        public function test()
        {
            default_image(5, "sa", "sa");
        }
    }


?>