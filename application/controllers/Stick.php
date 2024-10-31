<?php

class stick extends CI_Controller
{

    public function __construct()
    {
    	parent::__construct();
        $this->load->model('Stick_model');
    
    }
	 public function index()
	{	
        if (empty($this->session->userdata('email'))) {
            redirect('login');
          }
          $data['judul'] = 'RyxxBilliardShop';
          $data['stick']=$this->Stick_model->getAllStick();
      $this->form_validation->set_rules('nama','nama','required');
      $this->form_validation->set_rules('poto','poto','required');
      $this->form_validation->set_rules('harga','harga','required');
      if($this->form_validation->run()==false){    
      $this->load->view('templates/header',$data);
      $this->load->view('stick/index',$data);
      $this->load->view('templates/footer');
      }else {
          $data=[
              'nama' => $this->input->post('nama'),
              'poto' => $this->input->post('poto'),
              'harga' => $this->input->post('harga'),

                
          ];
            $this->db->insert('stick',$data);
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('stick');
        }
    }

    public function Ubah()
    {
        $this->Stick_model->ubahDataStick($id);
        $this->session->set_flashdata('flash','diubah');
        redirect('stick');
    }
    public function hapus($id)
    {
        $this->stick_model->hapusDataStick($id);
        $this->session->set_flashdata('flash','dihapus');
        redirect('stick');
    }
 }