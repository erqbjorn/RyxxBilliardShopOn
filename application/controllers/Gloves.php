<?php

class gloves extends CI_Controller
{

    public function __construct()
    {
    	parent::__construct();
        $this->load->model('gloves_model');
    
    }
	 public function index()
	{	
        if (empty($this->session->userdata('email'))) {
            redirect('login');
          }
          $data['judul'] = 'RyxxBilliardShop';
          $data['gloves']=$this->gloves_model->getAllgloves();
      $this->form_validation->set_rules('nama','nama','required');
      $this->form_validation->set_rules('poto','poto','required');
      $this->form_validation->set_rules('harga','harga','required');
      if($this->form_validation->run()==false){    
      $this->load->view('templates/header',$data);
      $this->load->view('gloves/index',$data);
      $this->load->view('templates/footer');
      }else {
          $data=[
              'nama' => $this->input->post('nama'),
              'poto' => $this->input->post('poto'),
              'harga' => $this->input->post('harga'),

                
          ];
            $this->db->insert('gloves',$data);
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('gloves');
        }
    }

    public function Ubah()
    {
        $this->gloves_model->ubahDatagloves($id);
        $this->session->set_flashdata('flash','diubah');
        redirect('gloves');
    }
    public function hapus($id)
    {
        $this->gloves_model->hapusDatagloves($id);
        $this->session->set_flashdata('flash','dihapus');
        redirect('gloves');
    }
 }