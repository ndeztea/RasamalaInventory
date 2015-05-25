<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of users_akses
 * @created on : Monday, 25-May-2015 07:40:22
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class users_aksess extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data users_akses
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('users_akses', $limit, $offset);

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
     *  Count All users_akses
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('users_akses');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All users_akses
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
                
        $this->db->like('akses', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('users_akses');

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
    * Search All users_akses
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('users_akses');        
                
        $this->db->like('akses', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One users_akses
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('users_akses');

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
    *  Default form data users_akses
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'akses' => '',
            
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
        
            'akses' => strip_tags($this->input->post('akses', TRUE)),
        
        );
        
        
        $this->db->insert('users_akses', $data);
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
        
                'akses' => strip_tags($this->input->post('akses', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('users_akses', $data);
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
        $this->db->delete('users_akses');
        
    }







    



}
