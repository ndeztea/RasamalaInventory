<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller users_akses
 * @created on : Monday, 25-May-2015 07:40:22
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class users_akses extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('users_aksess');
    }
    

    /**
    * List all data users_akses
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('users_akses/index/'),
            'total_rows'        => $this->users_aksess->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['users_aksess']       = $this->users_aksess->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('users_akses/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New users_akses
    *
    */
    public function add() 
    {       
        $data['users_akses'] = $this->users_aksess->add();
        $data['action']  = 'users_akses/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_users_akses").parsley();
                        });','embed');
      
        $this->template->render('users_akses/form',$data);

    }

    

    /**
    * Call Form to Modify users_akses
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['users_akses']      = $this->users_aksess->get_one($id);
            $data['action']       = 'users_akses/save/' . $id;           
      
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_users_akses").parsley();
                                    });','embed');
            
            $this->template->render('users_akses/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('users_akses'));
        }
    }


    
    /**
    * Save & Update data  users_akses
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'akses',
                        'label' => 'Akses',
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
                          
                          $this->users_aksess->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('users_akses');
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
                        $this->users_aksess->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('users_akses');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail users_akses
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['users_akses'] = $this->users_aksess->get_one($id);            
            $this->template->render('users_akses/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('users_akses'));
        }
    }
    
    
    /**
    * Search users_akses like ""
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
            'base_url'          => site_url('users_akses/search/'),
            'total_rows'        => $this->users_aksess->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['users_aksess']       = $this->users_aksess->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('users_akses/view',$data);
    }
    
    
    /**
    * Delete users_akses by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->users_aksess->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('users_akses');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('users_akses');
        }       
    }

}

?>
