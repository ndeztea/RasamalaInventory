<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of penggajian
 * @created on : Tuesday, 09-Jun-2015 16:35:38
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class penggajians extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data penggajian
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
        $result = $this->db->get('penggajian', $limit, $offset);

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
     *  Count All penggajian
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('penggajian');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All penggajian
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
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('data', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('penggajian');

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
    * Search All penggajian
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('penggajian');        
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('data', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One penggajian
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('penggajian');

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
    *  Default form data penggajian
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'tanggal_awal' => '',
            
                'tanggal_akhir' => '',
            
                'keterangan' => '',
            
                'data' => '',
            
                'total' => '',
            
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
        $nama_mandor = $this->input->post('nama_mandor');
        $jumlah_pekerja = $this->input->post('jumlah_pekerja');
        $total = $this->input->post('per_total');

        for($a=0;$a<count($nama_mandor);$a++){
            $data_mandor[$a]['nama_mandor'] = $nama_mandor[$a];
            $data_mandor[$a]['jumlah_pekerja'] = $jumlah_pekerja[$a];
            $data_mandor[$a]['total'] = $total[$a];
        }

        $data_mandor = json_encode($data_mandor);

        $data = array(
        
            'tanggal_awal' => strip_tags($this->input->post('tanggal_awal', TRUE)),
        
            'tanggal_akhir' => strip_tags($this->input->post('tanggal_akhir', TRUE)),
        
            'keterangan' => strip_tags($this->input->post('keterangan', TRUE)),
        
            'data' => $data_mandor,
        
            'total' => strip_tags($this->input->post('total', TRUE)),
        
        );
        
        
        $this->db->insert('penggajian', $data);
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

        $nama_mandor = $this->input->post('nama_mandor');
        $jumlah_pekerja = $this->input->post('jumlah_pekerja');
        $total = $this->input->post('per_total');

        for($a=0;$a<count($nama_mandor);$a++){
            $data_mandor[$a]['nama_mandor'] = $nama_mandor[$a];
            $data_mandor[$a]['jumlah_pekerja'] = $jumlah_pekerja[$a];
            $data_mandor[$a]['total'] = $total[$a];
        }
        $data_mandor = json_encode($data_mandor);

        $data = array(
        
                'tanggal_awal' => strip_tags($this->input->post('tanggal_awal', TRUE)),
        
                'tanggal_akhir' => strip_tags($this->input->post('tanggal_akhir', TRUE)),
        
                'keterangan' => strip_tags($this->input->post('keterangan', TRUE)),
        
                'data' => $data_mandor,
        
                'total' => strip_tags($this->input->post('total', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('penggajian', $data);
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
        $this->db->delete('penggajian');
        
    }







    



}
