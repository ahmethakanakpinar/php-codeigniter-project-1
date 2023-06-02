<?php

class MY_Model extends CI_Model {

    public $tableName;
    public function __construct()
    {
        parent::__construct();
    }
    //tüm kayıtları bura da getirecek olan method
    public function get_all($where = array(), $order = "id ASC")
    {
        
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }
    public function add($data = array())
    {
        if(!isAllowViewModule($this->router->fetch_class(), "write"))
        {
            return false;
        }
        return $this->db->insert($this->tableName, $data);
    }
    public function update($where = array(),$data = array())
    {
        if(!isAllowViewModule($this->router->fetch_class(), "update"))
        {
            return false;
        }
        return $this->db->where($where)->update($this->tableName, $data);
    }
    public function delete($where = array())
    {
        if(!isAllowViewModule($this->router->fetch_class(), "delete"))
        {
            return false;
        }
        return $this->db->where($where)->delete($this->tableName);
    }
}

?>