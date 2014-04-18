<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HH_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*
     * count all data
     * @access public
     * @params int
     * @return array
     */

    public function count_all_data($table) {
        $this->db->where('deleted', 0);
        return $this->db->count_all_results($table);
    }

    public function removeAsPermanent($where, $in_uid, $table) {
        $this->db->where_in($where, $in_uid);
        return $this->db->delete($table);
    }

}