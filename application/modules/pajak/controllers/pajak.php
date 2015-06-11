<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller pajak
 * @created on : Wednesday, 10-Jun-2015 15:17:54
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class pajak extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('pajaks');
        if(!($this->session->userdata('level')))
            {  
                redirect(site_url('login/'));
            }   
    }
    

    /**
    * List all data pajak
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('pajak/index/'),
            'total_rows'        => $this->pajaks->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pajaks']       = $this->pajaks->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('pajak/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New pajak
    *
    */
    public function add($id_barang_jual='') 
    {       
        $data['pajak'] = $this->pajaks->add($id_barang_jual);
        $data['action']  = 'pajak/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_pajak").parsley();
                        });','embed');
      
        $this->template->render('pajak/form',$data);

    }

    

    /**
    * Call Form to Modify pajak
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['pajak']      = $this->pajaks->get_one($id);
            $data['action']       = 'pajak/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_pajak").parsley();
                                    });','embed');
            
            $this->template->render('pajak/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('pajak'));
        }
    }


    
    /**
    * Save & Update data  pajak
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'id_barang_jual',
                        'label' => 'Id Barang Jual',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'kode',
                        'label' => 'Kode',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nama_pembeli_pajak',
                        'label' => 'Nama Pembeli Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'alamat_pembeli_pajak',
                        'label' => 'Alamat Pembeli Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'npwp_pembeli_pajak',
                        'label' => 'Npwp Pembeli Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nama_penjual_pajak',
                        'label' => 'Nama Penjual Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'alamat_penjual_pajak',
                        'label' => 'Alamat Penjual Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'npwp_penjual_pajak',
                        'label' => 'Npwp Penjual Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'harga_jual',
                        'label' => 'Harga Jual',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'harga_potongan',
                        'label' => 'Harga Potongan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'uang_muka_diterima',
                        'label' => 'Uang Muka Diterima',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'dasar_pengenaan_pajak',
                        'label' => 'Dasar Pengenaan Pajak',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'ppn',
                        'label' => 'Ppn',
                        'rules' => 'trim|xss_clean'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post()) 
                      {
                          
                          $this->pajaks->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('pajak');
                      }
                  } 
                  else // If validation incorrect 
                  {
                      $this->add();
                  }
         }
         else // Update data if Form Edit send Post and ID available
         {               
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == TRUE) 
                {
                    if ($this->input->post()) 
                    {
                        $this->pajaks->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('pajak');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail pajak
    *
    */
    public function show($id='',$print='') 
    {
        if ($id != '') 
        {

            $data['pajak'] = $this->pajaks->get_one($id);
            $data['print'] = $print;            
            $this->template->render('pajak/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('pajak'));
        }
    }
    
    
    /**
    * Search pajak like ""
    *
    */   
    public function search()
    {
        if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
            
            $this->session->set_userdata(
                        array('keyword' => $this->input->post('q',TRUE))
                    );
        }
        
         $config = array(
            'base_url'          => site_url('pajak/search/'),
            'total_rows'        => $this->pajaks->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['pajaks']       = $this->pajaks->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('pajak/view',$data);
    }
    
    
    /**
    * Delete pajak by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->pajaks->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('pajak');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('pajak');
        }       
    }

}

?>
