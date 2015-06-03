<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of barang_jual
 * @created on : Monday, 25-May-2015 07:36:58
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class barang_juals extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data barang_jual
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {
        $this->db->order_by('id','desc');
        $result = $this->db->get('barang_jual', $limit, $offset);

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
     *  Count All barang_jual
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('barang_jual');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All barang_jual
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
                
        $this->db->like('nama', $keyword);  
                
        $this->db->like('alamat', $keyword);  
                
        $this->db->like('hp', $keyword);  
                
        $this->db->like('status', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('barang_jual');

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
    * Search All barang_jual
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('barang_jual');        
                
        $this->db->like('nama', $keyword);  
                
        $this->db->like('alamat', $keyword);  
                
        $this->db->like('hp', $keyword);  
                
        $this->db->like('status', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One barang_jual
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('barang_jual');

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
    *  Default form data barang_jual
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'kode_jual' => '',
            
                'nama' => '',
            
                'alamat' => '',
            
                'hp' => '',
            
                'total_diskon' => '',
            
                'total_ongkoskirim' => '',
            
                'total_upah' => '',
            
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
        
            'kode_jual' => strip_tags($this->input->post('kode_jual', TRUE)),
        
            'nama' => strip_tags($this->input->post('nama', TRUE)),
        
            'alamat' => strip_tags($this->input->post('alamat', TRUE)),
        
            'hp' => strip_tags($this->input->post('hp', TRUE)),
        
            'total_diskon' => strip_tags($this->input->post('total_diskon', TRUE)),
        
            'total_ongkoskirim' => strip_tags($this->input->post('total_ongkoskirim', TRUE)),
        
            'total_upah' => strip_tags($this->input->post('total_upah', TRUE)),
        
            'total' => strip_tags($this->input->post('total', TRUE)),
            'id_user'=>$this->session->userdata('id'),
        
            'status' => strip_tags($this->input->post('status', TRUE)),
        
        );
        
        
        $this->db->insert('barang_jual', $data);

        return $this->db->insert_id();
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
        
                'kode_jual' => strip_tags($this->input->post('kode_jual', TRUE)),
        
                'nama' => strip_tags($this->input->post('nama', TRUE)),
        
                'alamat' => strip_tags($this->input->post('alamat', TRUE)),
        
                'hp' => strip_tags($this->input->post('hp', TRUE)),
        
                'total_diskon' => strip_tags($this->input->post('total_diskon', TRUE)),
        
                'total_ongkoskirim' => strip_tags($this->input->post('total_ongkoskirim', TRUE)),
        
                'total_upah' => strip_tags($this->input->post('total_upah', TRUE)),
        
                'total' => strip_tags($this->input->post('total', TRUE)),
        
                'status' => strip_tags($this->input->post('status', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('barang_jual', $data);
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
        $this->db->delete('barang_jual');
        
    }







    
    
    // get barang_jual
    public function get_barang_jual() 
    {
      
        $result = $this->db->get('barang_jual')
                           ->result();

        $ret ['']= 'Pilih Barang Jual :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->kode_jual;
            }
        }
        
        return $ret;
    }


    



}
