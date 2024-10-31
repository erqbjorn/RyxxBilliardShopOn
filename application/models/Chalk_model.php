<?php 

  /**
   * summary
   */
    class Chalk_model extends CI_model{
        public function getAllChalk()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get->('Dosen');
        // return &query->result_array();
        // menggunakan cara cepat methode chaining // pemanggil data base
        return $this->db->get('chalk')->result_array();
        
    }

        public function tambahDataChalk()
        {
            $data =[
                "nama"=>$this->input->post('nama',true),
                "poto"=>$this->input->post('poto',true),
                "harga"=>$this->input->post('harga',true),
            ];
            $this->db->insert('chalk', $data);
        }
        
        public function getChalkById($id)
        {
            return $this->db->get_where('chalk', ['id' =>$id])->row_array();
        }

        public function cariDataChalk()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nama', $keyword);
            $this->db->or_like('harga', $keyword);
            return $this->db->get('chalk')->result_array();
        }
    

        
        public function ubahDataChalk($id)
        {
            $data = [
                "nama" => $this->input->post('nama', true),
                "harga" => $this->input->post('harga', true),

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('chalk',$data);
        }
        
        public function hapusDataChalk($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('chalk');

        }
    }

