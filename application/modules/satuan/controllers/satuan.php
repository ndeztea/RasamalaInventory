<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller satuan
 * @created on : Monday, 25-May-2015 07:39:54
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class satuan extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('satuans');
    }
    

    /**
    * List all data satuan
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('satuan/index/'),
            'total_rows'        => $this->satuans->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['satuans']       = $this->satuans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('satuan/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New satuan
    *
    */
    public function add() 
    {       
        $data['satuan'] = $this->satuans->add();
        $data['action']  = 'satuan/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_satuan").parsley();
                        });','embed');
      
        $this->template->render('satuan/form',$data);

    }

    

    /**
    * Call Form to Modify satuan
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['satuan']      = $this->satuans->get_one($id);
            $data['action']       = 'satuan/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_satuan").parsley();
                                    });','embed');
            
            $this->template->render('satuan/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('satuan'));
        }
    }


    
    /**
    * Save & Update data  satuan
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'satuan',
                        'label' => 'Satuan',
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
                          
                          $this->satuans->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('satuan');
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
                        $this->satuans->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('satuan');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail satuan
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['satuan'] = $this->satuans->get_one($id);            
            $this->template->render('satuan/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('satuan'));
        }
    }
    
    
    /**
    * Search satuan like ""
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
            'base_url'          => site_url('satuan/search/'),
            'total_rows'        => $this->satuans->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['satuans']       = $this->satuans->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('satuan/view',$data);
    }
    
    
    /**
    * Delete satuan by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->satuans->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('satuan');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('satuan');
        }       
    }

}

?>
