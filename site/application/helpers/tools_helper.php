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
    function send_email($toEmail = "", $subject = "", $message= "") //mail göndermek için 3 parametre aldım 
    {                                              //ilk parametre Alıcı kim, 2.parametre Mesaj Başlığı 3.parametre giden mesaj. 
        $t = &get_instance();   //saf php de codeigniter kodlarını kullanmak için yazmak zorundayız. 
        $t->load->model("Email_Setting_model"); //model kısmından Email_Setting_model adlı modeli çağırıyoruz
        $email_settings = $t->Email_Setting_model->get( //Email_Setting_model içinde get fonksiyonlu veritabanı kodumuzu çağırıyoruz
            array(
                "isActive"  => 1    //1 tane Email işlemleri olduğu için get fonskiyonu kullandım onunda isActive 1
            )
        );
        if(empty($toEmail)) //toEmail boş ise girer
            $toEmail = $email_settings->email_to;   //ilk parametreyi veri tabanından alır
        $config = array(    //$config değişkeninde array oluşturdum
            "protocol"  => $email_settings->protocol,   //veritabanından protocol ü
            "smtp_host" => $email_settings->host,       //veritabanından host u
            "smtp_port" => $email_settings->port,       //veritabanından port u
            "smtp_user" => $email_settings->user,       //veritabanından user i 
            "smtp_pass" => $email_settings->password,   //şifrelenmiş password u
            "starttls"  => true,            //TLS güvenlik kontrolü dür true verdim
            "charset"   => "utf-8",         //karakter utf-8 ingilizce karakterler için
            "mailtype"  => "html",          //mail türü html şeklinde
            "wordwrap"  => true,           
            "newline"   => "\r\n"
        );
        $t->load->library("email", $config);    //email kütüphanesini çağırır
        $t->email->from($email_settings->email_from, $email_settings->user_name); //mesaj bana geldiği için veritabanından çekliyor
        $t->email->to($toEmail);    //veritabanından çekiliyor
        $t->email->subject($subject);   //başlık fonksiyon parametresinden çekiliyor
        $t->email->message($message);   //mesaj fonksiyon parametresinden çekiliyor
        return $t->email->send();       //en sonra send ile mail gönderiliyor
    }
    function reCaptche($come_back, $secret) //reCaptche adlı fonksiyon oluşturdum
    {
        $t = &get_instance();   //saf php de codeigniter kodlarını kullanmak için yazmak zorundayız. 
        $response = $t->input->post('g-recaptcha-response');    //g-recaptcha nın tıklanıp tıklanmadığını true veya false şeklinde değişkene atar
        if($response != "") //$response boş değilse aşağı koda girer
            $captcha_response = trim($response);    //$response doluysa sağda solda boşluk varsa trim ile siler
        else
            $captcha_response = "";
        
        if($captcha_response == "") //değişken eğer boşsa if e girer
        {
            $alert = "error";   //alert e error yazar java script te kırmızı alert getirir
            $t->session->set_flashdata("alert", $alert); //error şeklinde session a atar.
            redirect($come_back);   //iletişim kısmına geri döner
        }
        $check = array( 
        'secret' => $secret,        //google 2 tane parametre istiyor biri verilen gizi api kodu
        "response" => $response,    //response ise recaptcha onaylıgında verilen kodu istiyor. onaylanmazsa boş gidiyor direk
        );
        $startProcess = curl_init();
        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify"); //google nin dinamik kodları
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
        return $finalResponse;  //success olursa return ediyor
    }

?>