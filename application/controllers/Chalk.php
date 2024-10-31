<?php

class chalk extends CI_Controller
{

    public function __construct()
    {
    	parent::__construct();
        $this->load->model('chalk_model');
    
    }
	 public function index()
	{	
        if (empty($this->session->userdata('email'))) {
            redirect('login');
          }
          $data['judul'] = 'RyxxBilliardShop';
          $data['chalk']=$this->chalk_model->getAllchalk();
      $this->form_validation->set_rules('nama','nama','required');
      $this->form_validation->set_rules('poto','poto','required');
      $this->form_validation->set_rules('harga','harga','required');
      if($this->form_validation->run()==false){    
      $this->load->view('templates/header',$data);
      $this->load->view('chalk/index',$data);
      $this->load->view('templates/footer');
      }else {
          $data=[
              'nama' => $this->input->post('nama'),
              'poto' => $this->input->post('poto'),
              'harga' => $this->input->post('harga'),

                
          ];
            $this->db->insert('chalk',$data);
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('chalk');
        }
    }

    public function Ubah()
    {
        $this->chalk_model->ubahDatachalk($id);
        $this->session->set_flashdata('flash','diubah');
        redirect('chalk');
    }
    public function hapus($id)
    {
        $this->chalk_model->hapusDatachalk($id);
        $this->session->set_flashdata('flash','dihapus');
        redirect('chalk');
    }
 }