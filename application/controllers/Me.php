<?php
/** 
 * summary
*/
class Me extends CI_Controller
{
  public function index()
   {
      if (empty($this->session->userdata('email'))) {
        redirect('login');
      }
        $data['judul']='RyxxBilliardShop';
        $this->load->view('templates/header',$data);
        $this->load->view('Me/index',$data);
        $this->load->view('templates/footer');
   }
}
 ?>