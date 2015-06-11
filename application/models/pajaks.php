<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of pajak
 * @created on : Wednesday, 10-Jun-2015 15:17:54
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class pajaks extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data pajak
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
        $result = $this->db->get('pajak', $limit, $offset);

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
     *  Count All pajak
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('pajak');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All pajak
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
                
        $this->db->like('kode', $keyword);  
                
        $this->db->like('nama_pembeli_pajak', $keyword);  
                
        $this->db->like('alamat_pembeli_pajak', $keyword);  
                
        $this->db->like('npwp_pembeli_pajak', $keyword);  
                
        $this->db->like('nama_penjual_pajak', $keyword);  
                
        $this->db->like('alamat_penjual_pajak', $keyword);  
                
        $this->db->like('npwp_penjual_pajak', $keyword);  
                
        $this->db->like('data', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('pajak');

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
    * Search All pajak
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('pajak');        
                
        $this->db->like('kode', $keyword);  
                
        $this->db->like('nama_pembeli_pajak', $keyword);  
                
        $this->db->like('alamat_pembeli_pajak', $keyword);  
                
        $this->db->like('npwp_pembeli_pajak', $keyword);  
                
        $this->db->like('nama_penjual_pajak', $keyword);  
                
        $this->db->like('alamat_penjual_pajak', $keyword);  
                
        $this->db->like('npwp_penjual_pajak', $keyword);  
                
        $this->db->like('data', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One pajak
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('pajak');

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
    *  Default form data pajak
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'id_barang_jual' => '',
            
                'kode' => '',
            
                'nama_pembeli_pajak' => '',
            
                'alamat_pembeli_pajak' => '',
            
                'npwp_pembeli_pajak' => '',
            
                'nama_penjual_pajak' => 'RCP, PT.',
            
                'alamat_penjual_pajak' => 'JL. RAYA PANGALENGAN KM. 24.6 NO.66 KP. BATUREOK CIMAUNG BANDUNG',
            
                'npwp_penjual_pajak' => '02.736.480.1-445.000',
            
                'data' => '',
            
                'harga_jual' => '',
            
                'harga_potongan' => '',
            
                'uang_muka_diterima' => '',
            
                'dasar_pengenaan_pajak' => '',
            
                'ppn' => '',
            
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
        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');

        for($a=0;$a<count($nama_barang);$a++){
            $data_barang[$a]['nama_barang'] = $nama_barang[$a];
            $data_barang[$a]['harga'] = $harga[$a];
        }

        $data_barang = json_encode($data_barang);

        $data = array(
        
            'id_barang_jual' => strip_tags($this->input->post('id_barang_jual', TRUE)),
        
            'kode' => strip_tags($this->input->post('kode', TRUE)),
        
            'nama_pembeli_pajak' => strip_tags($this->input->post('nama_pembeli_pajak', TRUE)),
        
            'alamat_pembeli_pajak' => strip_tags($this->input->post('alamat_pembeli_pajak', TRUE)),
        
            'npwp_pembeli_pajak' => strip_tags($this->input->post('npwp_pembeli_pajak', TRUE)),
        
            'nama_penjual_pajak' => strip_tags($this->input->post('nama_penjual_pajak', TRUE)),
        
            'alamat_penjual_pajak' => strip_tags($this->input->post('alamat_penjual_pajak', TRUE)),
        
            'npwp_penjual_pajak' => strip_tags($this->input->post('npwp_penjual_pajak', TRUE)),
        
            'data' => $data_barang,
        
            'harga_jual' => strip_tags($this->input->post('harga_jual', TRUE)),
        
            'harga_potongan' => strip_tags($this->input->post('harga_potongan', TRUE)),
        
            'uang_muka_diterima' => strip_tags($this->input->post('uang_muka_diterima', TRUE)),
        
            'dasar_pengenaan_pajak' => strip_tags($this->input->post('dasar_pengenaan_pajak', TRUE)),
        
            'ppn' => strip_tags($this->input->post('ppn', TRUE)),
        
        );
        
        
        $this->db->insert('pajak', $data);
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
        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');

        for($a=0;$a<count($nama_barang);$a++){
            $data_barang[$a]['nama_barang'] = $nama_barang[$a];
            $data_barang[$a]['harga'] = $harga[$a];
        }

        $data_barang = json_encode($data_barang);

        $data = array(
        
                'id_barang_jual' => strip_tags($this->input->post('id_barang_jual', TRUE)),
        
                'kode' => strip_tags($this->input->post('kode', TRUE)),
        
                'nama_pembeli_pajak' => strip_tags($this->input->post('nama_pembeli_pajak', TRUE)),
        
                'alamat_pembeli_pajak' => strip_tags($this->input->post('alamat_pembeli_pajak', TRUE)),
        
                'npwp_pembeli_pajak' => strip_tags($this->input->post('npwp_pembeli_pajak', TRUE)),
        
                'nama_penjual_pajak' => strip_tags($this->input->post('nama_penjual_pajak', TRUE)),
        
                'alamat_penjual_pajak' => strip_tags($this->input->post('alamat_penjual_pajak', TRUE)),
        
                'npwp_penjual_pajak' => strip_tags($this->input->post('npwp_penjual_pajak', TRUE)),
        
                'data' => $data_barang,
        
                'harga_jual' => strip_tags($this->input->post('harga_jual', TRUE)),
        
                'harga_potongan' => strip_tags($this->input->post('harga_potongan', TRUE)),
        
                'uang_muka_diterima' => strip_tags($this->input->post('uang_muka_diterima', TRUE)),
        
                'dasar_pengenaan_pajak' => strip_tags($this->input->post('dasar_pengenaan_pajak', TRUE)),
        
                'ppn' => strip_tags($this->input->post('ppn', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('pajak', $data);
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
        $this->db->delete('pajak');
        
    }







    



}
