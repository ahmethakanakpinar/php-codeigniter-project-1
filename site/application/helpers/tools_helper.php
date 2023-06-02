<?php 
    function CharConvert($string) {
        $search = array('ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü');
        $replace = array('c', 'C', 'g', 'G', 'i', 'I', 'o', 'O', 's', 'S', 'u', 'U');
        $string = str_replace($search, $replace, $string);
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);
        return  strtolower($string);
    }
    function get_product_cover_image($id,$sa)
    {
        $t = &get_instance();
        $model = "{$sa}_image_model";
        
        $t->load->model($model);
        $isCover = $t->$model->get(
            array(
                "isCover"       => 1,
                "{$sa}_id"    => $id
            )
        );
        if(empty($isCover))
        {
            $isCover = $t->$model->get(
                array(
                    "{$sa}_id"    => $id
                )
            );
        }
        return(!empty($isCover) ? $isCover->img_url : "");

    }
    function default_image($model, $model_name, $model_isim, $img_alt="")
    {
        $image = get_product_cover_image($model->id,$model_isim);
        if($img_alt == "img_alt")
        {
            $image = pathinfo($image, PATHINFO_FILENAME);
            return !empty($image) ? $image : "default";
        }
        else
        {
            return !empty($image) ? base_url("panel/uploads/$model_name/{$image}") : base_url("assets/images")."/portfolio-1.jpg";
        }
    }
    function get_readable_date($date)
    {
        if(!empty($date))
        {
            setlocale(LC_ALL, 'tr_TR.UTF-8');
            $turkish_date = date('d F Y', strtotime($date));
            return $turkish_date;
        }
    }
    function get_category_title($category_id = 0)
    {
        $t = &get_instance();
        $t->load->model("portfolio_category_model");
        $category = $t->portfolio_category_model->get(
            array(
                "id" => $category_id
            )
        );
        if($category)
            return $category->title;
        else
            return "<b class='text-danger'>Belirtilmedi</b>";        

    }
    function get_settings()
    {
        $t = &get_instance();
        // $settings = $t->session->userdata("settings");
        // if(empty($settings))
        // {
            $t->load->model("setting_model");
            $settings = $t->setting_model->get(array());
            // $t->session->set_userdata("settings", $settings);
        // }
        return $settings;
    }
    function send_email($toEmail = "", $subject = "", $message= "")
    {
        $t = &get_instance();
        $t->load->model("Email_Setting_model");
        $email_settings = $t->Email_Setting_model->get(
            array(
                "isActive"  => 1
            )
        );
        if(empty($toEmail))
            $toEmail = $email_settings->email_to;
        $config = array(
            "protocol"  => $email_settings->protocol,
            "smtp_host" => $email_settings->host,
            "smtp_port" => $email_settings->port,
            "smtp_user" => $email_settings->user,
            "smtp_pass" => $email_settings->password,
            "starttls"  => true,
            "charset"   => "utf-8",
            "mailtype"  => "html",
            "wordwrap"  => true,
            "newline"   => "\r\n"
        );
        $t->load->library("email", $config);
        $t->email->from($email_settings->email_from, $email_settings->user_name);
        $t->email->to($toEmail);
        $t->email->subject($subject);
        $t->email->message($message);
        return $t->email->send();
    }
    function reCaptche($come_back, $secret)
    {
        $t = &get_instance();
        $response = $t->input->post('g-recaptcha-response');
        if($response != "")
            $captcha_response = trim($response);
        else
            $captcha_response = "";
        
        if($captcha_response == "")
        {
            $alert = "error";
            $t->session->set_flashdata("alert", $alert);            
            redirect($come_back);
        }
        $check = array(
        'secret' => $secret,
        "response" => $response,
        );
        $startProcess = curl_init();
        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($startProcess, CURLOPT_POST, true);
        curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
        curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
        $receiveData = curl_exec($startProcess);
        $finalResponse = json_decode($receiveData, true);
        if(!$finalResponse['success'])
        {
            redirect($come_back);
            die();
        }
        return $finalResponse;



    }

?>