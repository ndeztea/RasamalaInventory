<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller barang_jual
 * @created on : Monday, 25-May-2015 07:36:14
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class barang_jual extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('barang_juals');
    }
    

    /**
    * List all data barang_jual
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('barang_jual/index/'),
            'total_rows'        => $this->barang_juals->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['barang_juals']       = $this->barang_juals->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('barang_jual/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New barang_jual
    *
    */
    public function add() 
    {       
        $data['barang_jual'] = $this->barang_juals->add();
        $data['action']  = 'barang_jual/save';
     
       $data['barang_beli'] = $this->barang_juals->get_barang_beli();
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_barang_jual").parsley();
                        });','embed');
      
        $this->template->render('barang_jual/form',$data);

    }

    

    /**
    * Call Form to Modify barang_jual
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['barang_jual']      = $this->barang_juals->get_one($id);
            $data['action']       = 'barang_jual/save/' . $id;           
      
           $data['barang_beli'] = $this->barang_juals->get_barang_beli();
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_barang_jual").parsley();
                                    });','embed');
            
            $this->template->render('barang_jual/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_jual'));
        }
    }


    
    /**
    * Save & Update data  barang_jual
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'kode_jual',
                        'label' => 'Kode Jual',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'nama',
                        'label' => 'Nama',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'alamat',
                        'label' => 'Alamat',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'hp',
                        'label' => 'Hp',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'total_diskon',
                        'label' => 'Total Diskon',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'total_ongkoskirim',
                        'label' => 'Total Ongkoskirim',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'total_upah',
                        'label' => 'Total Upah',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'total',
                        'label' => 'Total',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'status',
                        'label' => 'Status',
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
                          
                          $this->barang_juals->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('barang_jual');
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
                        $this->barang_juals->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('barang_jual');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail barang_jual
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['barang_jual'] = $this->barang_juals->get_one($id);            
            $this->template->render('barang_jual/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_jual'));
        }
    }
    
    
    /**
    * Search barang_jual like ""
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
            'base_url'          => site_url('barang_jual/search/'),
            'total_rows'        => $this->barang_juals->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['barang_juals']       = $this->barang_juals->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('barang_jual/view',$data);
    }
    
    
    /**
    * Delete barang_jual by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->barang_juals->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('barang_jual');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('barang_jual');
        }       
    }

}

?>
