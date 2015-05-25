<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of category
 * @created on : Saturday, 23-May-2015 11:00:30
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class categorys extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data category
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('category', $limit, $offset);

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
     *  Count All category
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('category');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All category
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
                
        $this->db->like('name', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('category');

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
    * Search All category
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('category');        
                
        $this->db->like('name', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One category
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('category');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    public function get_category_name($id){
        $data = $this->get_one($id);
        return $data['name'];
    }

    
    
    
    /**
    *  Default form data category
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'name' => '',
            
                'id_parent' => '',
            
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
        
            'name' => strip_tags($this->input->post('name', TRUE)),
        
            'id_parent' => strip_tags($this->input->post('id_parent', TRUE)),
        
        );
        
        
        $this->db->insert('category', $data);
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
        
                'name' => strip_tags($this->input->post('name', TRUE)),
        
                'id_parent' => strip_tags($this->input->post('id_parent', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('category', $data);
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
        $this->db->delete('category');
        
    }







    
    
    // get category
    public function get_category() 
    {
      
        $result = $this->db->get('category')
                           ->result();

        $ret ['']= 'Pilih Category :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->name;
            }
        }
        
        return $ret;
    }


    



}
