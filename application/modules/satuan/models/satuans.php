<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of satuan
 * @created on : Monday, 25-May-2015 07:39:54
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class satuans extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data satuan
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('satuan', $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    

    /**
     *  Count All satuan
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('satuan');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All satuan
    *
    *  @param limit   : Integer
    *  @param offset  : Integer
    *  @param keyword : mixed
    *
    *  @return array
    *
    */
    public function get_search($limit, $offset) 
    {
        $keyword = $this->session->userdata('keyword');
                
        $this->db->like('satuan', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('satuan');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    
    
    /**
    * Search All satuan
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('satuan');        
                
        $this->db->like('satuan', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One satuan
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('satuan');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    /**
    *  Default form data satuan
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'satuan' => '',
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save() 
    {
        $data = array(
        
            'satuan' => strip_tags($this->input->post('satuan', TRUE)),
        
        );
        
        
        $this->db->insert('satuan', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id)
    {
        $data = array(
        
                'satuan' => strip_tags($this->input->post('satuan', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('satuan', $data);
    }


    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function destroy($id)
    {       
        $this->db->where('id', $id);
        $this->db->delete('satuan');
        
    }







    



}
