<?php

class MY_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        if(!isAllowViewModule())
        {
            redirect(base_url());
        }
    }

}

?>