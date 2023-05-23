<?php
    class Home extends CI_Controller {
        public $viewFolder = "";
        public function __construct()
        {
            parent::__construct();
            $this->viewFolder = "homepage";
            $this->load->helper("text");
        }
        public function index()
        {
            echo $this->viewFolder;
        }
        public function product_list()
        {
            $this->load->model("product_model");
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
        public function courses_list()
        {
            $viewData = new stdClass();
            $this->load->model("course_model");
            $viewData->courses = $this->course_model->get_all(
                array(
                    "isActive"  => 1,
                ), "rank ASC, event_date ASC"
            );
            $viewData->image_folder_name = "courses_v"; 
            $viewData->viewFolder = "courses_list_v";
            $this->load->view($viewData->viewFolder, $viewData);
        }
        public function courses_detail($url = "")
        {
            $viewData = new stdClass();
            $this->load->model("course_model");
            $viewData->course = $this->course_model->get(
                array(
                    "url" => $url
                )
            );
            $viewData->other_courses = $this->course_model->get_all(
                array(
                    "isActive"  => 1,
                    "id !="     => $viewData->course->id,
                ),"rand()", array("start" => 0, "count" => 3)
            );
            $viewData->image_folder_name = "courses_v";
            $viewData->viewFolder = "courses_v";
            $this->load->view($viewData->viewFolder,$viewData);
        }
        public function references_list()
        {
            $viewData = new stdClass();
            $this->load->model("reference_model");
            $viewData->references = $this->reference_model->get_all(
                array(
                    "isActive"  => 1,
                ), "rank ASC"
            );
            $viewData->image_folder_name = "references_v"; 
            $viewData->viewFolder = "references_list_v";
            $this->load->view($viewData->viewFolder, $viewData);
        }
        public function brands_list()
        {
            $viewData = new stdClass();
            $this->load->model("brand_model");
            $viewData->brands = $this->brand_model->get_all(
                array(
                    "isActive"  => 1,
                ), "rank ASC"
            );
            $viewData->image_folder_name = "brands_v"; 
            $viewData->viewFolder = "brands_list_v";
            $this->load->view($viewData->viewFolder, $viewData);
        }
        public function services_list() 
        {
            $viewData = new stdClass();
            $this->load->model("service_model");
            $viewData->services = $this->service_model->get_all(
                array(
                    "isActive"  => 1,
                ), "rank ASC"
            );
            $viewData->image_folder_name = "services_v"; 
            $viewData->viewFolder = "services_list_v";
            $this->load->view($viewData->viewFolder, $viewData);
        }
        public function about_us_list()
        {
            $viewData = new stdClass();
            $this->load->model("setting_model");
            $this->load->model("our_team_model");
            $viewData->settings = $this->setting_model->get(array());
            $viewData->our_team = $this->our_team_model->get_all(array("isActive"=> 1));
            $viewData->image_folder_name = "settings_v"; 
            $viewData->viewFolder = "about_us_list_v";
            $this->load->view($viewData->viewFolder, $viewData);
        }
        public function test()
        {
            default_image(5, "sa", "sa");
        }
        public function contact_us()
        {
            $viewData = new stdClass();
            $viewData->viewFolder = "contact_v";
             $this->load->view($viewData->viewFolder, $viewData);
        }
        public function send_contact_message()
        {
           
            $this->load->library("form_validation");
            $this->form_validation->set_rules("name", "Ad Soyad", "required|trim");
            $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email");
            $this->form_validation->set_rules("subject", "Konu", "required|trim");
            $this->form_validation->set_rules("message", "Mesaj", "required|trim|min_length[10]|max_length[500]");
            $this->form_validation->set_message(
                array(
                    "required"  => "{field} Alanı Boş Geçilemez!",
                    "valid_email"   => "{field} Alanı Kurallara uygun bir şekilde yazılmalıdır!",
                    "min_length"    => "{field} Kısmı {param} karakterden az olamaz",
                    "max_length"    => "{field} Kısmı {param} karakterden fazla olamaz"
                )
            );
            $validation = $this->form_validation->run();
            if($validation)
            {
                $captcha = reCaptche("iletisim", '6Lc_2jAmAAAAANSynu4kSNwjKvZMbAwl43Vu24NC');
                if($captcha)
                {
                    $name = $this->input->post("name"); 
                    $email = $this->input->post("email"); 
                    $subject = $this->input->post("subject"); 
                    $message = $this->input->post("message"); 
                    $email_message = "{$name} isimli ziyaretçi. Mesaj Bıraktı <br> <b>Mesaj : </b> {$message} <br> <b>E-posta : </b> {$email}";
                    if(send_email("","Site İletişim Mesajı | $subject ",$email_message))
                    {
                        // $alert = array(
                        //     "title" => "İşlem Başarılı",
                        //     "text" => "Mesajınız Başarılı bir şekilde iletilmiştir!",
                        //     "type" => "success"
                        // );
                        // $this->session->set_flashdata("alert", $alert);
                        redirect(base_url("iletisim"));
                    }
                    else
                    {
                        echo "başarısız";
                    }
                }
              
            }
            else
            {
                $viewData = new stdClass();
                $viewData->viewFolder = "contact_v";
                $viewData->form_error = true;
                $this->load->view($viewData->viewFolder, $viewData);
            }
        }

    }


?>