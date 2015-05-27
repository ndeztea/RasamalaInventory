<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller piutang
 * @created on : Wednesday, 27-May-2015 16:59:43
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class piutang extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('piutangs');
        $this->load->model('statuss');
    }
    

    /**
    * List all data piutang
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('piutang/index/'),
            'total_rows'        => $this->piutangs->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['piutangs']       = $this->piutangs->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('piutang/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New piutang
    *
    */
    public function add() 
    {       
        $data['piutang'] = $this->piutangs->add();
        $data['action']  = 'piutang/save';
     
        $tmp_statuss = $this->statuss->get_all();
        foreach($tmp_statuss as $row){
            $statuss[$row['id']] = $row['status'];
        }
        $data['statuss'] = $statuss;
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_piutang").parsley();
                        });','embed');
      
        $this->template->render('piutang/form',$data);

    }

    

    /**
    * Call Form to Modify piutang
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['piutang']      = $this->piutangs->get_one($id);
            $data['action']       = 'piutang/save/' . $id;           
      
            $tmp_statuss = $this->statuss->get_all();
            foreach($tmp_statuss as $row){
                $statuss[$row['id']] = $row['status'];
            }
            $data['statuss'] = $statuss;
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_piutang").parsley();
                                    });','embed');
            
            $this->template->render('piutang/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('piutang'));
        }
    }


    
    /**
    * Save & Update data  piutang
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'jenis_piutang',
                        'label' => 'Jenis Piutang',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'total',
                        'label' => 'Total',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'jatuh_tempo',
                        'label' => 'Jatuh Tempo',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'keterangan',
                        'label' => 'Keterangan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'status',
                        'label' => 'Status',
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
                          
                          $this->piutangs->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('piutang');
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
                        $this->piutangs->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('piutang');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail piutang
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['piutang'] = $this->piutangs->get_one($id);            
            $this->template->render('piutang/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('piutang'));
        }
    }
    
    
    /**
    * Search piutang like ""
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
            'base_url'          => site_url('piutang/search/'),
            'total_rows'        => $this->piutangs->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['piutangs']       = $this->piutangs->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('piutang/view',$data);
    }
    
    
    /**
    * Delete piutang by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->piutangs->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('piutang');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('piutang');
        }       
    }

}

?>
