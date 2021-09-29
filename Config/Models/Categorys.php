<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categorys extends CI_Model{ 
    /*
     * Get posts
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('category_master', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('category_master');
            return $query->result_array();
        }
    }
    
    /*
     * Insert post
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('cits', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update post
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('cits', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete post
     */
    public function delete($id){
        $delete = $this->db->delete('cits',array('id'=>$id));
        return $delete?true:false;
    }

    // product

     public function insertpro($data = array()) {
        $insert = $this->db->insert('citss', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }


     function getpro($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('citss', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('citss');
            return $query->result_array();
        }
    }

      public function deletepro($id){
        $delete = $this->db->delete('citss',array('id'=>$id));
        return $delete?true:false;
    }




}