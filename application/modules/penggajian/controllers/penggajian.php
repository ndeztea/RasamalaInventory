<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller penggajian
 * @created on : Tuesday, 09-Jun-2015 16:35:38
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class penggajian extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('penggajians');

        if(!$this->session->userdata('level'))
        {  
            redirect(site_url('login/'));
        }     
    }
    

    /**
    * List all data penggajian
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('penggajian/index/'),
            'total_rows'        => $this->penggajians->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['penggajians']       = $this->penggajians->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('penggajian/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New penggajian
    *
    */
    public function add() 
    {       
        $data['penggajian'] = $this->penggajians->add();
        $data['action']  = 'penggajian/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_penggajian").parsley();
                        });','embed');
      
        $this->template->render('penggajian/form',$data);

    }

    

    /**
    * Call Form to Modify penggajian
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['penggajian']      = $this->penggajians->get_one($id);
            $data['action']       = 'penggajian/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_penggajian").parsley();
                                    });','embed');
            
            $this->template->render('penggajian/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('penggajian'));
        }
    }


    
    /**
    * Save & Update data  penggajian
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'tanggal_awal',
                        'label' => 'Tanggal Awal',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'tanggal_akhir',
                        'label' => 'Tanggal Akhir',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'keterangan',
                        'label' => 'Keterangan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'total',
                        'label' => 'Total',
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
                          
                          $this->penggajians->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('penggajian');
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
                        $this->penggajians->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('penggajian');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail penggajian
    *
    */
    public function show($id='',$print='') 
    {
        if ($id != '') 
        {

            $data['penggajian'] = $this->penggajians->get_one($id);  
            $data['print'] = $print;          
            $this->template->render('penggajian/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('penggajian'));
        }
    }
    
    
    /**
    * Search penggajian like ""
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
            'base_url'          => site_url('penggajian/search/'),
            'total_rows'        => $this->penggajians->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['penggajians']       = $this->penggajians->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('penggajian/view',$data);
    }
    
    
    /**
    * Delete penggajian by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->penggajians->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('penggajian');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('penggajian');
        }       
    }

}

?>
