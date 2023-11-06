<?php
class Pelanggan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_pelanggan() {
        return $this->db->get('pelanggan')->result();
    }

    public function tambah_pelanggan($data) {
        $this->db->insert('pelanggan', $data);
    }

    public function get_pelanggan_by_id($id) {
        return $this->db->get_where('pelanggan', array('id' => $id))->row();
    }

    public function update_pelanggan($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('pelanggan', $data);
    }

    public function hapus_pelanggan($id) {
        $this->db->where('id', $id);
        $this->db->delete('pelanggan');
    }
}
