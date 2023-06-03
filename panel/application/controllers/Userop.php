<?php
class Userop extends CI_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v"; 
        $this->viewTitle = "users";
        $this->load->model("user_model");
    }
    public function login_form()
    {
        if(get_active_user())
		{
			redirect(base_url());
		}
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
    }
    public function do_login()
    {
        if(get_active_user())
		{
			redirect(base_url());
		}
        $this->load->library("form_validation");
        $this->form_validation->set_rules("user_username","Kullanıcı Adı","required|trim");
        $this->form_validation->set_rules("user_password","Şifre","required|trim|min_length[5]");
        $this->form_validation->set_message(
            array(
                "required"      => "{field} alanı boş bırakılmamalıdır!",
                "min_length"    => "{field} {param} Karakterden az olmamalıdır!",
            )
        );
        $validate = $this->form_validation->run();
        if($validate)
        {
            $user = $this->user_model->get(
                array(
                    "user_name" => $this->input->post("user_username"),
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"  => 1
                )
            );
            if($user)
            {
                $alert = array(
                    "title" => "Giriş Yapılıyor",
                    "text" => "{$user->full_name} hoşgeldiniz.",
                    "type" => "success"
                );
                //User Role set ediyoruz.
                set_user_roles();
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url());
            }
            else
            {
                $alert = array(
                    "title" => "Giriş Yapılamadı ",
                    "text"  => "Kullanıcı Adı veya parola hatalı!",
                    "type"  => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }
        }
        else
        {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->viewTitle = $this->viewTitle;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }
    public function logout_form()
    {
        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }
    public function forget_password_form()
    {
        if(get_active_user())
		{
			redirect(base_url());
		}
        $viewData = new stdClass();
        $viewData->viewTitle = $this->viewTitle;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function reset_password()
    {
        if(get_active_user()) 
		{
			redirect(base_url());
		}
        $this->load->library("form_validation"); //Emaili hatalı girmemesi için form validation kullandım
        $this->form_validation->set_rules("email","E-posta","required|trim|valid_email"); //name i email olan bakıyor, field E-posta 
        $this->form_validation->set_message(                 //Kurallar required boş geçilemez, trim sağdan soldan boşlukları siliyor. 
            array(                                           //valid_email doğru email girilmesi için kullanılır.
                "required"      => "{field} alanı boş bırakılmamalıdır!",   //boş geçilirse bu metni verecek
                "valid_email"    => "{field} kurallarına göre yazılmalıdır!",   //valid_email yanlış yazılırsa bu mesajı verecek
            )
        );
        $validate = $this->form_validation->run();  //form_validation u çalıştıracak true veya false döndürecek
        if($validate)   //true döndürürse if e girer
        {
            $user = $this->user_model->get( //$user_model modelinden get fonksiyonunu çağırır 
                array(
                    "email" => $this->input->post("email"),     //eğer post a girilen email veritabanında ki email ile uyuşuyorsa
                    "isActive"  => 1                            //ve isActive 1 ise
                )
            );
            if($user)   //eğer veritabanında kullanıcı çekerse if e girer 
            {
                $this->load->helper("string");  //string helper i çağırdım
                $temp_password = random_string();   //random_string fonksiyonunu çağırdım değişkene attım
                $send = send_email($user->email, "Şifremi Unuttum", "CMS'e geçici olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz");
                    //send_email fonksiyonu ile şifrenin gönderilecek email i, başlığı ve gönderilecek mesajı parametre olarak atadım.
                if($send)   //başarı bir şekilde gönderildiyse if e girer
                {
                    $this->user_model->update(  //şifreyi geçici şifre ile güncellemek için update fonskiyonunu çağırdım
                        array(      
                            "id" => $user->id   //hangi kullanıcının şifresini güncelleyeceksek onun  id sini veri tabanından çektik
                        ),
                        array(
                            "password" => md5($temp_password)   //md5 ile güvenli bir şekilde geçici şifre ile parola mızı değiştirdik
                        )
                    );
                    $alert = array( 
                        "title" => "",  //alert değişkenine array girdik
                        "text"  => "<b>{$this->input->post("email")}</b> adresi ile oluşturulmuş bir üyelik sistemimizde bulunması durumunda e-posta adresinin size ait olduğunu doğrulamak için bir link tarafınıza e-posta ile gönderilecektir.",
                        "type"  => "success"    //hata mesajı ve başarılı olduğunu gönderdik
                    );
                    $this->session->set_flashdata("alert", $alert); //ve bu array ı session a gönderdik
                    redirect(base_url("forget-password"));  //sonra tekrar şifreyi unuttum sayfasına gidiyor uyarı ile
                }
            }
            $alert = array(
                "title" => "",
                "text"  => "<b>{$this->input->post("email")}</b> adresi ile oluşturulmuş bir üyelik sistemimizde bulunması durumunda e-posta adresinin size ait olduğunu doğrulamak için bir link tarafınıza e-posta ile gönderilecektir.",
                "type"  => "warner"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("forget-password"));
        }
        else
        {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->viewTitle = $this->viewTitle;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }


}



?>