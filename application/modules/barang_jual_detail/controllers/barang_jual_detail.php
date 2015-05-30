<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller barang_jual_detail
 * @created on : Monday, 25-May-2015 07:39:06
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class barang_jual_detail extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('barang_jual_details');
        if(empty($this->session->userdata('level')))
            {  
                redirect(site_url('login/'));
            }     
    }
    

    /**
    * List all data barang_jual_detail
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('barang_jual_detail/index/'),
            'total_rows'        => $this->barang_jual_details->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['barang_jual_details']       = $this->barang_jual_details->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('barang_jual_detail/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New barang_jual_detail
    *
    */
    public function add() 
    {       
        $data['barang_jual_detail'] = $this->barang_jual_details->add();
        $data['action']  = 'barang_jual_detail/save';
     
       $data['barang_jual'] = $this->barang_jual_details->get_barang_jual();
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_barang_jual_detail").parsley();
                        });','embed');
      
        $this->template->render('barang_jual_detail/form',$data);

    }

    

    /**
    * Call Form to Modify barang_jual_detail
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['barang_jual_detail']      = $this->barang_jual_details->get_one($id);
            $data['action']       = 'barang_jual_detail/save/' . $id;           
      
           $data['barang_jual'] = $this->barang_jual_details->get_barang_jual();
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_barang_jual_detail").parsley();
                                    });','embed');
            
            $this->template->render('barang_jual_detail/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_jual_detail'));
        }
    }


    
    /**
    * Save & Update data  barang_jual_detail
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'id_barang_jual',
                        'label' => 'Id Barang Jual',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'nama_barang',
                        'label' => 'Nama Barang',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'kode_barang',
                        'label' => 'Kode Barang',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'jumlah',
                        'label' => 'Jumlah',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'id_satuan',
                        'label' => 'Id Satuan',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'harga',
                        'label' => 'Harga',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'total_harga',
                        'label' => 'Total Harga',
                        'rules' => 'trim|xss_clean|required'
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
                          
                          $this->barang_jual_details->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('barang_jual_detail');
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
                        $this->barang_jual_details->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('barang_jual_detail');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail barang_jual_detail
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['barang_jual_detail'] = $this->barang_jual_details->get_one($id);            
            $this->template->render('barang_jual_detail/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_jual_detail'));
        }
    }
    
    
    /**
    * Search barang_jual_detail like ""
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
            'base_url'          => site_url('barang_jual_detail/search/'),
            'total_rows'        => $this->barang_jual_details->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['barang_jual_details']       = $this->barang_jual_details->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('barang_jual_detail/view',$data);
    }
    
    
    /**
    * Delete barang_jual_detail by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->barang_jual_details->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('barang_jual_detail');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('barang_jual_detail');
        }       
    }

}

?>
