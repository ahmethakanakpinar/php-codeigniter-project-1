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
        $turkish_date = date('d F Y', strtotime($date));
        return $turkish_date;
    }
    function get_active_user()
    {
        $t = &get_instance();
        $user = $t->session->userdata("user");
        if($user)
            return $user;
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
        $t->email->from($email_settings->from, $email_settings->user_name);
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