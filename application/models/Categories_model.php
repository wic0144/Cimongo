<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Categories_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll($condition=[])
    {
		if (sizeof($condition) >0){
			$this->mongo_db->where($condition);
		}
    	$test = $this->mongo_db->get('categorise');
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
  
}
