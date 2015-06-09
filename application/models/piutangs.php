<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of piutang
 * @created on : Wednesday, 27-May-2015 16:59:43
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2015    
 */
 
 
class piutangs extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data piutang
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('piutang', $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    public function get_total_piutang($day=7){
        $sql = " SELECT sum(total) as total FROM piutang WHERE status = 2 ".
            " AND (DATEDIFF(tanggal_update,now()) <= $day) ";

        $data = $this->db->query($sql)->row_array();

        return $data['total'];
    }

    

    /**
     *  Count All piutang
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('piutang');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All piutang
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
                
        $this->db->like('jenis_piutang', $keyword);  
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('status', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('piutang');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    public function get_id_by_id_jual($id_barang_jual){

        $this->db->where('id_barang_jual', $id_barang_jual);  
        $result = $this->db->get('piutang');

        if ($result->num_rows() > 0) 
        {
            $data = $result->row_array();
            return $data['id'];
        } 
        else 
        {
            return 0;
        }
    }
    
    
    /**
    * Search All piutang
    * @param keyword : mixed
    *
    * @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('piutang');        
                
        $this->db->like('jenis_piutang', $keyword);  
                
        $this->db->like('keterangan', $keyword);  
                
        $this->db->like('status', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One piutang
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('piutang');

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
    *  Default form data piutang
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'jenis_piutang' => '',
            
                'total' => '',
            
                'jatuh_tempo' => '',
            
                'keterangan' => '',
            
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
    public function save($data='') 
    {
        if(empty($data)){
            $data = array(
        
                'jenis_piutang' => strip_tags($this->input->post('jenis_piutang', TRUE)),
        
                'total' => strip_tags($this->input->post('total', TRUE)),
        
                'jatuh_tempo' => strip_tags($this->input->post('jatuh_tempo', TRUE)),
        
                'keterangan' => strip_tags($this->input->post('keterangan', TRUE)),
        
                'status' => strip_tags($this->input->post('status', TRUE)),
        
            );
        }
        
        
        $this->db->insert('piutang', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id,$data='')
    {
        if(empty($data)){
            $data = array(
        
                'jenis_piutang' => strip_tags($this->input->post('jenis_piutang', TRUE)),
        
                'total' => strip_tags($this->input->post('total', TRUE)),
        
                'jatuh_tempo' => strip_tags($this->input->post('jatuh_tempo', TRUE)),
        
                'keterangan' => strip_tags($this->input->post('keterangan', TRUE)),
        
                'status' => strip_tags($this->input->post('status', TRUE)),
        
            );
        }
        
        $this->db->where('id', $id);
        $this->db->update('piutang', $data);
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
        $this->db->delete('piutang');
        
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
