<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of hutang
 * @created on : Monday, 25-May-2015 07:39:38
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class hutangs extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data hutang
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('hutang', $limit, $offset);

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
     *  Count All hutang
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('hutang');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All hutang
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
                
        $this->db->like('jenis_hutang', $keyword);  
                
        $this->db->like('status', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('hutang');

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
    * Search All hutang
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('hutang');        
                
        $this->db->like('jenis_hutang', $keyword);  
                
        $this->db->like('status', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One hutang
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('hutang');

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
    *  Default form data hutang
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'jenis_hutang' => '',
            
                'total' => '',
            
                'status' => '',
            
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
        
            'jenis_hutang' => strip_tags($this->input->post('jenis_hutang', TRUE)),
        
            'total' => strip_tags($this->input->post('total', TRUE)),
        
            'status' => strip_tags($this->input->post('status', TRUE)),
        
        );
        
        
        $this->db->insert('hutang', $data);
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
        
                'jenis_hutang' => strip_tags($this->input->post('jenis_hutang', TRUE)),
        
                'total' => strip_tags($this->input->post('total', TRUE)),
        
                'status' => strip_tags($this->input->post('status', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('hutang', $data);
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
        $this->db->delete('hutang');
        
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
