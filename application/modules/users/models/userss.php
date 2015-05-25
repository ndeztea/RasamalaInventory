<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of users
 * @created on : Monday, 25-May-2015 07:40:18
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class userss extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data users
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('users', $limit, $offset);

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
     *  Count All users
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All users
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
                
        $this->db->like('username', $keyword);  
                
        $this->db->like('password', $keyword);  
                
        $this->db->like('nama', $keyword);  
                
        $this->db->like('alamat', $keyword);  
                
        $this->db->like('hp', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('users');

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
    * Search All users
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('users');        
                
        $this->db->like('username', $keyword);  
                
        $this->db->like('password', $keyword);  
                
        $this->db->like('nama', $keyword);  
                
        $this->db->like('alamat', $keyword);  
                
        $this->db->like('hp', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One users
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('users');

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
    *  Default form data users
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'username' => '',
            
                'password' => '',
            
                'nama' => '',
            
                'alamat' => '',
            
                'hp' => '',
            
                'id_akses' => '',
            
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
        
            'username' => strip_tags($this->input->post('username', TRUE)),
        
            'password' => strip_tags($this->input->post('password', TRUE)),
        
            'nama' => strip_tags($this->input->post('nama', TRUE)),
        
            'alamat' => strip_tags($this->input->post('alamat', TRUE)),
        
            'hp' => strip_tags($this->input->post('hp', TRUE)),
        
            'id_akses' => strip_tags($this->input->post('id_akses', TRUE)),
        
        );
        
        
        $this->db->insert('users', $data);
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
        
                'username' => strip_tags($this->input->post('username', TRUE)),
        
                'password' => strip_tags($this->input->post('password', TRUE)),
        
                'nama' => strip_tags($this->input->post('nama', TRUE)),
        
                'alamat' => strip_tags($this->input->post('alamat', TRUE)),
        
                'hp' => strip_tags($this->input->post('hp', TRUE)),
        
                'id_akses' => strip_tags($this->input->post('id_akses', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('users', $data);
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
        $this->db->delete('users');
        
    }







    
    
    // get barang_beli
    public function get_barang_beli() 
    {
      
        $result = $this->db->get('barang_beli')
                           ->result();

        $ret ['']= 'Pilih Barang Beli :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->kode_beli;
            }
        }
        
        return $ret;
    }


    



}
