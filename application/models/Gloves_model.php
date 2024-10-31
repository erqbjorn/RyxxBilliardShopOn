<?php 

  /**
   * summary
   */
    class Gloves_model extends CI_model{
        public function getAllGloves()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get->('Dosen');
        // return &query->result_array();
        // menggunakan cara cepat methode chaining // pemanggil data base
        return $this->db->get('gloves')->result_array();
        
    }
      
        public function tambahDataGloves()
        {
            $data =[
                "nama"=>$this->input->post('nama',true),
                "poto"=>$this->input->post('poto',true),
                "harga"=>$this->input->post('harga',true),
            ];
            $this->db->insert('gloves', $data);
        }
        
        public function getGlovesById($id)
        {
            return $this->db->get_where('gloves', ['id' =>$id])->row_array();
        }

        public function cariDataGloves()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nama', $keyword);
            $this->db->or_like('harga', $keyword);
            return $this->db->get('gloves')->result_array();
        }
    

        
        public function ubahDataGloves($id)
        {
            $data = [
                "nama" => $this->input->post('nama', true),
                "harga" => $this->input->post('harga', true),

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('gloves',$data);
        }
        
        public function hapusDataGloves($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('gloves');

        }
    }

