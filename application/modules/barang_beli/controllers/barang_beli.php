<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller barang_beli
 * @created on : Monday, 25-May-2015 07:36:58
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2015
 *
 *
 */


class barang_beli extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('barang_belis');
        $this->load->model('barang_beli_details');
        $this->load->model('statuss');
        $this->load->model('userss');

        if(!$this->session->userdata('level'))
            {  
                redirect(site_url('login/'));
            }     
       //     echo $this->session->flashdata('notif');
        $this->load->model('barang_stocks');
        $this->load->model('satuans');
        $this->load->model('hutangs');

    }
    

    /**
    * List all data barang_beli
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('barang_beli/index/'),
            'total_rows'        => $this->barang_belis->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['barang_belis']       = $this->barang_belis->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('barang_beli/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New barang_beli
    *
    */
    public function add() 
    {       
        $data['barang_beli'] = $this->barang_belis->add();
        $data['action']  = 'barang_beli/save';
            
        // list nama barang
        $nama_barangs_tmp = $this->barang_stocks->get_all(1000,0);
        $nama_barangs[0] = '-Pilih Barang-';
        foreach($nama_barangs_tmp as $row){
             $nama_barangs[$row['nama_barang']] = $row['nama_barang'].'|'.$row['kode_barang'].'|'.$this->satuans->get_satuan_name($row['id_satuan']).'|'.$row['harga_jual'];
        }
        $data['nama_barangs']  = $nama_barangs;
        $data['nama_barangs_tmp'] = $nama_barangs_tmp;

       // list status
        $user_status_temp = $this->statuss->get_all(100,0);
        foreach($user_status_temp as $row){
            $statuss[$row['id']] = $row['status'];
        }
        $data['statuss']  = $statuss;
     
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_barang_beli").parsley();
                        });','embed');
      
        $this->template->render('barang_beli/form',$data);

    }

    

    /**
    * Call Form to Modify barang_beli
    *
    */
    public function edit($id='') 
    {
        $data['barang_beli']      = $this->barang_belis->get_one($id);
        if (!empty($data['barang_beli'])) 
        {

            $data['action']       = 'barang_beli/save/' . $id;           
      
            // list nama barang
        $nama_barangs_tmp = $this->barang_stocks->get_all(1000,0);
        $nama_barangs[0] = '-Pilih Barang-';
        foreach($nama_barangs_tmp as $row){
             $nama_barangs[$row['nama_barang']] = $row['nama_barang'].'|'.$row['kode_barang'].'|'.$this->satuans->get_satuan_name($row['id_satuan']).'|'.$row['harga_jual'];
        }
        $data['nama_barangs']  = $nama_barangs;
        $data['nama_barangs_tmp'] = $nama_barangs_tmp;

       // list status
        $user_status_temp = $this->statuss->get_all(100,0);
        foreach($user_status_temp as $row){
            $statuss[$row['id']] = $row['status'];
        }
        $data['statuss']  = $statuss;

        $data['barang_beli_details'] = $this->barang_beli_details->get_barang_detail($id);
       
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_barang_beli").parsley();
                                    });','embed');
            
            $this->template->render('barang_beli/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_beli'));
        }
    }


    
    /**
    * Save & Update data  barang_beli
    *
    */
    public function save($id =NULL) 
    {
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'kode_beli',
                        'label' => 'Kode Beli',
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
                          
                          $id_barang_beli = $this->barang_belis->save();
                          
                           // save data barang detail
                          $nama_barang = $this->input->post('nama_barang');
                          $kode_barang = $this->input->post('kode_barang');
                          $jumlah = $this->input->post('jumlah');
                          $id_satuan = $this->input->post('id_satuan');
                          $harga = $this->input->post('harga');
                          $total_harga = $this->input->post('total_harga');

                          for($a=0;$a<count($nama_barang);$a++){
                            $data_barang_detail = array(
                                'id_barang_beli' => strip_tags($id_barang_beli),
                                'nama_barang' => strip_tags($nama_barang[$a]),
                                'kode_barang' => strip_tags($kode_barang[$a]),
                                'jumlah' => strip_tags($jumlah[$a]),
                                'id_satuan' => strip_tags($id_satuan[$a]),
                                'harga' => strip_tags($harga[$a]),
                                'total_harga' => strip_tags($total_harga[$a]),
                            
                            );
                            $this->barang_beli_details->save($data_barang_detail);

                            // min stock
                            $stock_now = $this->barang_stocks->get_stocks($kode_barang[$a]);
                            $stock_updated = $stock_now + $jumlah[$a];
                            $this->barang_stocks->update_stocks($kode_barang[$a],$stock_updated);
                          }
                          
                          // update hutang
                          $total_sisa = $this->input->post('total_sisa');
                          $status = $this->input->post('status');
                          $kode_beli = $this->input->post('kode_beli');
                          if($status==2){
                              $dataHutang = array(
                                    'jenis_hutang' => 'Hutang barang masuk '.$kode_beli,
                                    'total'        => $total_sisa,
                                    'status'        => $status,
                                    'keterangan'    => 'Hutang yang belum di bayar untuk barang masuk dengan kode '.$kode_beli,
                                    'jatuh_tempo'   => date('Y-m-d', strtotime("+30 days")),

                                );
                              $this->hutangs->save($dataHutang);
                            }

                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('barang_beli');
                      }
                  } 
                  else // If validation incorrect 
                  {
                        $this->session->set_flashdata('notif', notify('Data gagal di simpan','success'));
                        //redirect('barang_beli');
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
                        $this->barang_belis->update($id);
                        
                        // reset
                        $this->barang_beli_details->destroy_parent($id);
                         // save data barang detail
                          $nama_barang = $this->input->post('nama_barang');
                          $kode_barang = $this->input->post('kode_barang');
                          $jumlah = $this->input->post('jumlah');
                          $id_satuan = $this->input->post('id_satuan');
                          $harga = $this->input->post('harga');
                          $total_harga = $this->input->post('total_harga');

                          for($a=0;$a<count($nama_barang);$a++){
                            $data_barang_detail = array(
                                'id_barang_beli' => strip_tags($id),
                                'nama_barang' => strip_tags($nama_barang[$a]),
                                'kode_barang' => strip_tags($kode_barang[$a]),
                                'jumlah' => strip_tags($jumlah[$a]),
                                'id_satuan' => strip_tags($id_satuan[$a]),
                                'harga' => strip_tags($harga[$a]),
                                'total_harga' => strip_tags($total_harga[$a]),
                            
                            );
                            $this->barang_beli_details->save($data_barang_detail);
                          }
                          

                        // update hutang
                          $total_sisa = $this->input->post('total_sisa');
                          $status = $this->input->post('status');
                          $kode_beli = $this->input->post('kode_beli');
                          $id_hutang = $this->hutangs->get_id_by_id_beli($id);
                          if($status==2){
                            $dataHutang = array(
                                'jenis_hutang' => 'Hutang barang masuk '.$kode_beli,
                                'total'        => $total_sisa,
                                'status'        => $status,
                                'keterangan'    => 'Hutang yang belum di bayar untuk barang masuk dengan kode '.$kode_beli,
                                'jatuh_tempo'   => date('Y-m-d', strtotime("+30 days")),

                            );

                            $this->hutangs->destroy($id_hutang);
                            $this->hutangs->save($dataHutang);
                          }else{
                            $this->hutangs->destroy($id_hutang);
                          }
                          

                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('barang_beli');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    
    /**
    * Detail barang_beli
    *
    */
    public function show($id='',$print='') 
    {
        if ($id != '') 
        {

            $data['barang_beli'] = $this->barang_belis->get_one($id); 
            $data['barang_beli_details'] = $this->barang_beli_details->get_barang_detail($id);
            $data['print'] = $print;
            $this->template->render('barang_beli/_show',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('barang_beli'));
        }
    }
    
    
    /**
    * Search barang_beli like ""
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
            'base_url'          => site_url('barang_beli/search/'),
            'total_rows'        => $this->barang_belis->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['barang_belis']       = $this->barang_belis->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('barang_beli/view',$data);
    }
    
    
    /**
    * Delete barang_beli by ID
    *
    */
    public function destroy($id) 
    {        
        if ($id) 
        {
            $this->barang_belis->destroy($id);           
            $this->barang_beli_details->destroy_parent($id);
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('barang_beli');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('barang_beli');
        }       
    }

}

?>
