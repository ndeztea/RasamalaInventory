<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of barang_beli_detail
 * @created on : Monday, 25-May-2015 07:38:12
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class barang_beli_details extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data barang_beli_detail
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('barang_beli_detail', $limit, $offset);

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
     *  Count All barang_beli_detail
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('barang_beli_detail');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All barang_beli_detail
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
                
        $this->db->like('nama_barang', $keyword);  
                
        $this->db->like('kode_barang', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('barang_beli_detail');

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
    * Search All barang_beli_detail
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('barang_beli_detail');        
                
        $this->db->like('nama_barang', $keyword);  
                
        $this->db->like('kode_barang', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One barang_beli_detail
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('barang_beli_detail');

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
    *  Default form data barang_beli_detail
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'id_barang_jual' => '',
            
                'nama_barang' => '',
            
                'kode_barang' => '',
            
                'jumlah' => '',
            
                'id_satuan' => '',
            
                'harga' => '',
            
                'total_harga' => '',
            
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
        
            'id_barang_jual' => strip_tags($this->input->post('id_barang_jual', TRUE)),
        
            'nama_barang' => strip_tags($this->input->post('nama_barang', TRUE)),
        
            'kode_barang' => strip_tags($this->input->post('kode_barang', TRUE)),
        
            'jumlah' => strip_tags($this->input->post('jumlah', TRUE)),
        
            'id_satuan' => strip_tags($this->input->post('id_satuan', TRUE)),
        
            'harga' => strip_tags($this->input->post('harga', TRUE)),
        
            'total_harga' => strip_tags($this->input->post('total_harga', TRUE)),
        
        );
        
        
        $this->db->insert('barang_beli_detail', $data);
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
        
                'id_barang_jual' => strip_tags($this->input->post('id_barang_jual', TRUE)),
        
                'nama_barang' => strip_tags($this->input->post('nama_barang', TRUE)),
        
                'kode_barang' => strip_tags($this->input->post('kode_barang', TRUE)),
        
                'jumlah' => strip_tags($this->input->post('jumlah', TRUE)),
        
                'id_satuan' => strip_tags($this->input->post('id_satuan', TRUE)),
        
                'harga' => strip_tags($this->input->post('harga', TRUE)),
        
                'total_harga' => strip_tags($this->input->post('total_harga', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('barang_beli_detail', $data);
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
        $this->db->delete('barang_beli_detail');
        
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
