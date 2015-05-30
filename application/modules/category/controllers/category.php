<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller category
 * @created on : Saturday, 23-May-2015 11:00:30
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class category extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('categorys');
       if(empty($this->session->userdata('level')))
            {  
                redirect(site_url('login/'));
            }     
    }
    

    /**
    * List all data category
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('category/index/'),
            'total_rows'        => $this->categorys->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['categorys']       = $this->categorys->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('category/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New category
    *
    */
    public function add() 
    {       
        $data['category'] = $this->categorys->add();
        $data['action']  = 'category/save';
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_category").parsley();
                        });','embed');
      
        $this->template->render('category/form',$data);

    }

    

    /**
    * Call Form to Modify category
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['category']      = $this->categorys->get_one($id);
            $data['action']       = 'category/save/' . $id;           
      
           $data['category'] = $this->categorys->get_category();
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_category").parsley();
                                    });','embed');
            
            $this->template->render('category/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('category'));
        }
    }


    
    /**
    * Save & Update data  category
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'id_parent',
                        'label' => 'Id Parent',
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
                          
                          $this->categorys->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('category');
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
                        $this->categorys->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('category');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail category
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['category'] = $this->categorys->get_one($id);            
            $this->template->render('category/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('category'));
        }
    }
    
    
    /**
    * Search category like ""
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
            'base_url'          => site_url('category/search/'),
            'total_rows'        => $this->categorys->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['categorys']       = $this->categorys->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('category/view',$data);
    }
    
    
    /**
    * Delete category by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->categorys->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('category');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('category');
        }       
    }

}

?>
