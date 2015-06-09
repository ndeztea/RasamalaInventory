<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller barang_jual
 * @created on : Monday, 25-May-2015 07:36:58
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
        $this->load->model('barang_jual_details');
        $this->load->model('statuss');
        $this->load->model('userss');

        if(!$this->session->userdata('level'))
            {  
                redirect(site_url('login/'));
            }     
       //     echo $this->session->flashdata('notif');
        $this->load->model('barang_stocks');
        $this->load->model('satuans');
        $this->load->model('piutangs');
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
            
        // list nama barang
        $nama_barangs_tmp = $this->barang_stocks->get_all(1000,0);
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
        $data['barang_jual']      = $this->barang_juals->get_one($id);
        if (!empty($data['barang_jual'])) 
        {

            $data['action']       = 'barang_jual/save/' . $id;           
      
            // list nama barang
        $nama_barangs_tmp = $this->barang_stocks->get_all(1000,0);
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

        $data['barang_jual_details'] = $this->barang_jual_details->get_barang_detail($id);
       
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
                          
                          $id_barang_jual = $this->barang_juals->save();
                          
                           // save data barang detail
                          $nama_barang = $this->input->post('nama_barang');
                          $kode_barang = $this->input->post('kode_barang');
                          $jumlah = $this->input->post('jumlah');
                          $id_satuan = $this->input->post('id_satuan');
                          $harga = $this->input->post('harga');
                          $total_harga = $this->input->post('total_harga');

                          for($a=0;$a<count($nama_barang);$a++){
                            $data_barang_detail = array(
                                'id_barang_jual' => strip_tags($id_barang_jual),
                                'nama_barang' => strip_tags($nama_barang[$a]),
                                'kode_barang' => strip_tags($kode_barang[$a]),
                                'jumlah' => strip_tags($jumlah[$a]),
                                'id_satuan' => strip_tags($id_satuan[$a]),
                                'harga' => strip_tags($harga[$a]),
                                'total_harga' => strip_tags($total_harga[$a]),
                            
                            );
                            $this->barang_jual_details->save($data_barang_detail);

                            // min stock
                            $stock_now = $this->barang_stocks->get_stocks($kode_barang[$a]);
                            $stock_updated = $stock_now - $jumlah[$a];
                            $this->barang_stocks->update_stocks($kode_barang[$a],$stock_updated);
                          }
                          
                          // update piutang
                          $total_sisa = $this->input->post('total_sisa');
                          $status = $this->input->post('status');
                          $kode_jual = $this->input->post('kode_jual');
                          if($status==2){
                              $dataPiutang = array(
                                    'jenis_hutang' => 'Piutang barang keluar '.$kode_jual,
                                    'total'        => $total_sisa,
                                    'status'        => $status,
                                    'keterangan'    => 'Hutang yang belum di bayar untuk barang keluar dengan kode '.$kode_jual,
                                    'jatuh_tempo'   => date('Y-m-d', strtotime("+30 days")),

                                );
                              $this->piutangs->save($dataPiutang);
                            }

                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('barang_jual');
                      }
                  } 
                  else // If validation incorrect 
                  {
                        $this->session->set_flashdata('notif', notify('Data gagal di simpan','success'));
                        //redirect('barang_jual');
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
                        
                        // reset
                        $this->barang_jual_details->destroy_parent($id);
                         // save data barang detail
                          $nama_barang = $this->input->post('nama_barang');
                          $kode_barang = $this->input->post('kode_barang');
                          $jumlah = $this->input->post('jumlah');
                          $id_satuan = $this->input->post('id_satuan');
                          $harga = $this->input->post('harga');
                          $total_harga = $this->input->post('total_harga');

                          for($a=0;$a<count($nama_barang);$a++){
                            $data_barang_detail = array(
                                'id_barang_jual' => strip_tags($id),
                                'nama_barang' => strip_tags($nama_barang[$a]),
                                'kode_barang' => strip_tags($kode_barang[$a]),
                                'jumlah' => strip_tags($jumlah[$a]),
                                'id_satuan' => strip_tags($id_satuan[$a]),
                                'harga' => strip_tags($harga[$a]),
                                'total_harga' => strip_tags($total_harga[$a]),
                            
                            );
                            $this->barang_jual_details->save($data_barang_detail);
                          }
                          
                          // update piutang
                          $total_sisa = $this->input->post('total_sisa');
                          $status = $this->input->post('status');
                          $kode_jual = $this->input->post('kode_jual');
                          $id_piutang = $this->piutangs->get_id_by_id_jual($id);
                          if($status==2){
                              $dataPiutang = array(
                                    'jenis_piutang' => 'Piutang barang keluar '.$kode_jual,
                                    'total'        => $total_sisa,
                                    'status'        => $status,
                                    'keterangan'    => 'Hutang yang belum di bayar untuk barang keluar dengan kode '.$kode_jual,
                                    'jatuh_tempo'   => date('Y-m-d', strtotime("+30 days")),

                                );
                              $this->piutangs->destroy($id_piutang);
                              $this->piutangs->save($dataPiutang);
                            }else{
                                $this->piutangs->destroy($id_piutang);
                            }

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
    public function show($id='',$print='',$kwitansi='') 
    {
        if ($id != '') 
        {

            $data['barang_jual'] = $this->barang_juals->get_one($id); 
            $data['barang_jual_details'] = $this->barang_jual_details->get_barang_detail($id);
            $data['print'] = $print;
            if(!$kwitansi){
                $this->template->render('barang_jual/_show',$data);
            }else{
                $this->template->render('barang_jual/_show_kwitansi',$data);
            }
            
            
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
            $this->barang_jual_details->destroy_parent($id);
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
