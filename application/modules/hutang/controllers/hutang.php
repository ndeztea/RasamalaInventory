<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller hutang
 * @created on : Wednesday, 27-May-2015 04:02:05
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class hutang extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('hutangs');
        $this->load->model('statuss');
      if(empty($this->session->userdata('level')))
            {  
                redirect(site_url('login/'));
            }     
    }
    

    /**
    * List all data hutang
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('hutang/index/'),
            'total_rows'        => $this->hutangs->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['hutangs']       = $this->hutangs->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('hutang/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New hutang
    *
    */
    public function add() 
    {       
        $data['hutang'] = $this->hutangs->add();
        $data['action']  = 'hutang/save';
     
         $tmp_statuss = $this->statuss->get_all();
        foreach($tmp_statuss as $row){
            $statuss[$row['id']] = $row['status'];
        }
        $data['statuss'] = $statuss;
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_hutang").parsley();
                        });','embed');
      
        $this->template->render('hutang/form',$data);

    }

    

    /**
    * Call Form to Modify hutang
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['hutang']      = $this->hutangs->get_one($id);
            $data['action']       = 'hutang/save/' . $id;           
      
             $tmp_statuss = $this->statuss->get_all();
            foreach($tmp_statuss as $row){
                $statuss[$row['id']] = $row['status'];
            }
            $data['statuss'] = $statuss;
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_hutang").parsley();
                                    });','embed');
            
            $this->template->render('hutang/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('hutang'));
        }
    }


    
    /**
    * Save & Update data  hutang
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'jenis_hutang',
                        'label' => 'Jenis Hutang',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'total',
                        'label' => 'Total',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'keterangan',
                        'label' => 'Keterangan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'jatuh_tempo',
                        'label' => 'Jatuh Tempo',
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
                          
                          $this->hutangs->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('hutang');
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
                        $this->hutangs->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('hutang');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail hutang
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['hutang'] = $this->hutangs->get_one($id);            
            $this->template->render('hutang/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('hutang'));
        }
    }
    
    
    /**
    * Search hutang like ""
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
            'base_url'          => site_url('hutang/search/'),
            'total_rows'        => $this->hutangs->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['hutangs']       = $this->hutangs->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('hutang/view',$data);
    }
    
    
    /**
    * Delete hutang by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->hutangs->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('hutang');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('hutang');
        }       
    }

}

?>
