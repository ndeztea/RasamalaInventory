<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller Dashboard
 * @created on : 16-05-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class dashboard extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('barang_juals');
        $this->load->model('barang_belis');
        $this->load->model('hutangs');
        $this->load->model('piutangs');
        $this->load->model('statuss');
        if(!$this->session->userdata('level'))
            {  
                redirect(site_url('login/'));
            }         
       
    }
    

    /**
    * List all data pegawai
    *
    */
    public function index() 
    {
        $data['total_jual'] = $this->barang_juals->get_total_jual();
        $data['total_beli'] = $this->barang_belis->get_total_beli();
        $data['total_hutang'] = $this->hutangs->get_total_hutang();
        $data['total_piutang'] = $this->piutangs->get_total_piutang();

        $data['list_barang_juals'] = $this->barang_juals->get_all(5,0);
        $data['list_barang_belis'] = $this->barang_belis->get_all(5,0);
        $data['list_hutangs'] = $this->hutangs->get_all(5,0);
        $data['list_piutangs'] = $this->piutangs->get_all(5,0);
    	
        $this->template->render('dashboard/view',$data);
	      
    }
    
    
    

    
}

?>
