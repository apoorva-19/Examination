<?php
 
class Data_model extends CI_Model {
 
    /**
     * @desc load  db
     */
    function __construct() {
        parent::__Construct();
        $this->db = $this->load->database('project', TRUE, TRUE);
    }
 
    /**
     * @desc: Get data from company_performance table
     * @return: Array()
     */
    function getdata(){
        $this->db->select('*');
        $query = $this->db->get('rank');
        return $query->result_array();
 
    }
}