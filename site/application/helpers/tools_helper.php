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
        $settings = $t->session->userdata("settings");
        if(empty($settings))
        {
            $t->load->model("setting_model");
            $settings = $t->setting_model->get(array());
            $t->session->set_userdata("settings", $settings);
        }
        return $settings;
    }

?>