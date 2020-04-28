<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Products_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function findAll($condition =[])
    {
    	if (sizeof($condition) >0){
    		$this->mongo_db->where($condition);
		}
    	$test = $this->mongo_db->get('product');
    	return $test;
    }
    public function findOne($condition =[])
    {
    	if (sizeof($condition) >0){
    		$this->mongo_db->where($condition);
		}
        $test = $this->mongo_db->get('categorise');
        $test=$this->mongo_db->row_array($test);
    	return $test;
    }
    public function insert($data)
    {
        $insertId = $this->mongo_db->insert('product', $data);
        return $insertId;
    }
    
}
