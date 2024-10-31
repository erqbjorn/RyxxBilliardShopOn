<?php 

  /**
   * summary
   */
    class Stick_model extends CI_model{
        public function getAllStick()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get->('Dosen');
        // return &query->result_array();
        // menggunakan cara cepat methode chaining // pemanggil data base
        return $this->db->get('stick')->result_array();
        
    }

        public function tambahDataStick()
        {
            $data =[
                "nama"=>$this->input->post('nama',true),
                "poto"=>$this->input->post('poto',true),
                "harga"=>$this->input->post('harga',true),
            ];
            $this->db->insert('stick', $data);
        }
        
        public function getStickById($id)
        {
            return $this->db->get_where('stick', ['id' =>$id])->row_array();
        }

        public function cariDataStick()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nama', $keyword);
            $this->db->or_like('harga', $keyword);
            return $this->db->get('Stick')->result_array();
        }
    

        
        public function ubahDataStick($id)
        {
            $data = [
                "nama" => $this->input->post('nama', true),
                "harga" => $this->input->post('harga', true),

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('stick',$data);
        }
        
        public function hapusDataStick($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('stick');

        }
    }

