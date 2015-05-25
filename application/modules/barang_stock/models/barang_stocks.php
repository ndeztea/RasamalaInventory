<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of barang_stock
 * @created on : Monday, 25-May-2015 08:13:23
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class barang_stocks extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data barang_stock
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('barang_stock', $limit, $offset);

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
     *  Count All barang_stock
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('barang_stock');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All barang_stock
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
        $result = $this->db->get('barang_stock');

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
    * Search All barang_stock
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('barang_stock');        
                
        $this->db->like('nama_barang', $keyword);  
                
        $this->db->like('kode_barang', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One barang_stock
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('barang_stock');

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
    *  Default form data barang_stock
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nama_barang' => '',
            
                'kode_barang' => '',
            
                'id_category' => '',
            
                'jumlah_stocks' => '',
            
                'id_satuan' => '',
            
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
        
            'nama_barang' => strip_tags($this->input->post('nama_barang', TRUE)),
        
            'kode_barang' => strip_tags($this->input->post('kode_barang', TRUE)),
        
            'id_category' => strip_tags($this->input->post('id_category', TRUE)),
        
            'jumlah_stocks' => strip_tags($this->input->post('jumlah_stocks', TRUE)),
        
            'id_satuan' => strip_tags($this->input->post('id_satuan', TRUE)),
        
        );
        
        
        $this->db->insert('barang_stock', $data);
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
        
                'nama_barang' => strip_tags($this->input->post('nama_barang', TRUE)),
        
                'kode_barang' => strip_tags($this->input->post('kode_barang', TRUE)),
        
                'id_category' => strip_tags($this->input->post('id_category', TRUE)),
        
                'jumlah_stocks' => strip_tags($this->input->post('jumlah_stocks', TRUE)),
        
                'id_satuan' => strip_tags($this->input->post('id_satuan', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('barang_stock', $data);
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
        $this->db->delete('barang_stock');
        
    }







    
    
    // get satuan
    public function get_satuan() 
    {
      
        $result = $this->db->get('satuan')
                           ->result();

        $ret ['']= 'Pilih Satuan :';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->satuan;
            }
        }
        
        return $ret;
    }


    



}
