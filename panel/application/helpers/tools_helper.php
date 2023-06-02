<?php 
    function CharConvert($string) {
        $search = array('ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü');
        $replace = array('c', 'C', 'g', 'G', 'i', 'I', 'o', 'O', 's', 'S', 'u', 'U');
        $string = str_replace($search, $replace, $string);
        $string = preg_replace('/[^a-zA-Z0-9]/', '-', $string);
        return  strtolower($string);
    }
    function get_readable_date($date)
    {
        if(!empty($date))
        {
            $turkish_date = date('d F Y', strtotime($date));
            return $turkish_date;
        }
    }
    function get_active_user()
    {
        $t = &get_instance();
        $user = $t->session->userdata("user");
        if($user)
        {
            return $user;
        }
        else
            return false;
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
    function get_settings()
    {
        $t = &get_instance();
        $t->load->model("setting_model");

        if($t->session->userdata("settings"))
        {
            $settings = $t->session->userdata("settings");;
        }
        else
        {
            $settings = $t->setting_model->get();
            if(!$settings)
            {
                $settings = new stdClass();
                $settings->company_name = "Default";
                $settings->logo = "";
            }
            $t->session->set_userdata("settings", $settings);
        }
        return $settings;
    }
    function get_category_title($category_id = 0, $model="")
    {
        $t = &get_instance();
        $t->load->model("$model");
        $category = $t->$model->get(
            array(
                "id" => $category_id
            )
        );
        if($category)
            return $category->title;
        else
            return "<b class='text-danger'>Belirtilmedi</b>";        

    }
    function image_upload($img_url,$turn)
    {
        $t = &get_instance();
        $base64strcount = count($_POST["base64str"]);
        $img_name = CharConvert(pathinfo($_FILES[$img_url]["name"], PATHINFO_FILENAME)). "." .pathinfo($_FILES[$img_url]["name"], PATHINFO_EXTENSION);
        if(isset($t->username))
        {
            $img_path = "uploads/$t->viewFolder/$t->username/$img_name";
            $file_path = "uploads/$t->viewFolder/$t->username/";
        }
        else
        {
            $img_path = "uploads/$t->viewFolder/$img_name";
            $file_path = "uploads/$t->viewFolder/";
        }
        $img = $_POST["base64str"][0];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace('data:image/jpg;base64,', '', $img);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace('data:image/gif;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $img_data = base64_decode($img);

        $im = imagecreatefromstring($img_data);
        if ($im !== false) {
            //header('Content-Type: image/png');
            imagesavealpha($im, true);
            imagepng($im, $img_path);
            imagedestroy($im);
            
        }
        else 
        {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Görsel Yükleme de problem yaşandı!",
                "type" => "error"
            );
            $t->session->set_flashdata("alert", $alert);
            redirect(base_url("{$t->viewTitle}/$turn"));
            die();
        }
    }
    function getControllerList()
    {
        $t = &get_instance();
        $controllers = array();
        $t->load->helper("file");
        $files = get_dir_file_info(APPPATH."controllers",false);
        foreach(array_keys($files) as $file)
        {
            if($file != "index.html")
            {
                $controllers[] = strtolower(str_replace(".php","",$file));
            }
        }
        return $controllers;
    }
    function get_user_Role()
    {
        $t = &get_instance();
        $t->load->model("user_role_model");
        $user_roles = $t->user_role_model->get_all(
            array("isActive" => 1)
        );
        $roles = array();
        foreach($user_roles as $role)
        {
            $roles[$role->id] = $role->permissions;
        }
        return $t->session->set_userdata("user_roles", $roles);
    }
    