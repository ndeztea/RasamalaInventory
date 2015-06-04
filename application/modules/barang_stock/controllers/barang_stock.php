<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller barang_stock
 * @created on : Monday, 25-May-2015 08:13:23
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class barang_stock extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('barang_stocks');
        $this->load->model('satuans');
        $this->load->model('categorys');
        if(!$this->session->userdata('level'))
        {  
            redirect(site_url('login/'));
        }     
    }
    

    /**
    * List all data barang_stock
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('barang_stock/index/'),
            'total_rows'        => $this->barang_stocks->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['barang_stocks']       = $this->barang_stocks->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('barang_stock/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New barang_stock
    *
    */
    public function add() 
    {       
        $data['barang_stock'] = $this->barang_stocks->add();
        $data['action']  = 'barang_stock/save';
     
        $data['satuan'] = $this->barang_stocks->get_satuan();
        
        // list category
        $id_category_temp = $this->categorys->get_all(100,0);
        foreach($id_category_temp as $row){
            $categories[$row['id']] = $row['name'];
        }

        // list satuan
        $id_satuan_temp = $this->satuans->get_all(100,0);
        foreach($id_satuan_temp as $row){
            $id_satuan[$row['id']] = $row['satuan'];
        }
    
        $data['id_satuan'] = $id_satuan;
        $data['categories'] = $categories;

        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_barang_stock").parsley();
                        });','embed');
      
        $this->template->render('barang_stock/form',$data);

    }

    

    /**
    * Call Form to Modify barang_stock
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['barang_stock']      = $this->barang_stocks->get_one($id);
            $data['action']       = 'barang_stock/save/' . $id;           
      
            // list category
            $id_category_temp = $this->categorys->get_all(100,0);
            foreach($id_category_temp as $row){
                $categories[$row['id']] = $row['name'];
            }

            // list satuan
            $id_satuan_temp = $this->satuans->get_all(100,0);
            foreach($id_satuan_temp as $row){
                $id_satuan[$row['id']] = $row['satuan'];
            }
        
            $data['id_satuan'] = $id_satuan;
            $data['categories'] = $categories;
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_barang_stock").parsley();
                                    });','embed');
            
            $this->template->render('barang_stock/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_stock'));
        }
    }


    
    /**
    * Save & Update data  barang_stock
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
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
                        'field' => 'id_category',
                        'label' => 'Id Category',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'jumlah_stocks',
                        'label' => 'Jumlah Stocks',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    
                    array(
                        'field' => 'id_satuan',
                        'label' => 'Id Satuan',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    array(
                        'field' => 'harga_jual',
                        'label' => 'Harga Jual',
                        'rules' => 'trim|xss_clean|required'
                        ),
                    array(
                        'field' => 'harga_beli',
                        'label' => 'Harga Beli',
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
                          
                          $this->barang_stocks->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('barang_stock');
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
                        $this->barang_stocks->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('barang_stock');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }



    
    
    /**
    * Detail barang_stock
    *
    */
    public function show($id='') 
    {
        if ($id != '') 
        {

            $data['barang_stock'] = $this->barang_stocks->get_one($id);            
            $this->template->render('barang_stock/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_stock'));
        }
    }
    
    
    /**
    * Search barang_stock like ""
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
            'base_url'          => site_url('barang_stock/search/'),
            'total_rows'        => $this->barang_stocks->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['barang_stocks']       = $this->barang_stocks->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('barang_stock/view',$data);
    }
    
    
    /**
    * Delete barang_stock by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->barang_stocks->destroy($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('barang_stock');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('barang_stock');
        }       
    }

}

?>
