<?php
class Pelanggan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_pelanggan();
        $this->load->view('pelanggan/index', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('user_pppoe', 'User PPPOE', 'required');
        $this->form_validation->set_rules('password_pppoe', 'Password PPPOE', 'required');
        $this->form_validation->set_rules('paket_berlangganan', 'Paket Berlangganan', 'required');
        $this->form_validation->set_rules('sn', 'SN', 'required');
        $this->form_validation->set_rules('no_port_olt', 'No Port OLT', 'required');
        $this->form_validation->set_rules('no_onu', 'No ONU', 'required');
        $this->form_validation->set_rules('lokasi_pemasangan', 'Lokasi Pemasangan', 'required');
        $this->form_validation->set_rules('jenis_modem', 'Jenis Modem', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pelanggan/tambah');
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'user_pppoe' => $this->input->post('user_pppoe'),
                'password_pppoe' => $this->input->post('password_pppoe'),
                'paket_berlangganan' => $this->input->post('paket_berlangganan'),
                'sn' => $this->input->post('sn'),
                'no_port_olt' => $this->input->post('no_port_olt'),
                'no_onu' => $this->input->post('no_onu'),
                'lokasi_pemasangan' => $this->input->post('lokasi_pemasangan'),
                'jenis_modem' => $this->input->post('jenis_modem')
            );

            // VLAN Mapping
            $vlan_mapping = array(
                'Karangnanas' => 500,
                'Wiradadi' => 501,
                'Karangrau' => 502,
                'Karangkedawung' => 503,
                'Kutasari' => 504,
                'Rempoah' => 505,
                'Kebumen' => 506,
                'Karangmangu' => 507,
                'Kemutug Lor' => 508,
                'Pamijen' => 509,
                'Sudagaran' => 510,
                'Kalisube' => 511,
                'Pekunden' => 512,
                'Dawuhan' => 513,
                'Kedunguter' => 514,
                'Teluk' => 515,
                'Karangklesem' => 516,
                'Wlahar Wetan' => 517
            );

            $lokasi_pemasangan = $data['lokasi_pemasangan'];
            if (array_key_exists($lokasi_pemasangan, $vlan_mapping)) {
                $vlan = $vlan_mapping[$lokasi_pemasangan];
            } else {
                // Handle cases where Lokasi Pemasangan is not found in the mapping
                $vlan = 0; // Set a default VLAN or handle the error as needed
            }

            // Insert data into the database
            $this->Pelanggan_model->tambah_pelanggan($data);

            // Create CLI configuration
            $cli_config = "<br>conf t\n";
            $cli_config .= "interface gpon-olt_" . $data['no_port_olt'] . "\n";
            $cli_config .= "onu " . $data['no_onu'] . " type " . $data['jenis_modem'] . " sn " . $data['sn'] . "\n";
            $cli_config .= "exit\n";
            $cli_config .= "interface gpon-onu_" . $data['no_port_olt'] . ":" . $data['no_onu'] . "\n";
            $cli_config .= "name " . $data['nama_pelanggan'] . "\n";
            $cli_config .= "description $$" . $data['no_onu'] . "$$" . $data['user_pppoe'] . "\n";
            $cli_config .= "sn-bind enable sn\n";
            $cli_config .= "tcont 1 name T-01 profile SERVER\n";
            $cli_config .= "gemport 1 name T-01 tcont 1\n";
            $cli_config .= "service-port 1 vport 1 user-vlan " . $vlan . " vlan " . $vlan . "\n";
            $cli_config .= "exit\n";
            $cli_config .= "pon-onu-mng gpon-onu_" . $data['no_port_olt'] . ":" . $data['no_onu'] . "\n";
            $cli_config .= "service 1 gemport 1 cos 0 vlan " . $vlan . "\n";
            $cli_config .= "wan-ip 1 mode pppoe username " . $data['user_pppoe'] . " password " . $data['password_pppoe'] . " vlan-profile BROADBAND-" . strtoupper($data['lokasi_pemasangan']) . " host 1\n";
            $cli_config .= "security-mgmt 1 state enable mode forward protocol web\n";
            $cli_config .= "exit\n";
            $cli_config .= "end\n";
            $cli_config .= "write\n";

            // Load the view with the CLI configuration
            $data['cli_config'] = $cli_config;
            $this->load->view('pelanggan/cli_config', $data);
        }
    }


    public function edit($id) {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('user_pppoe', 'User PPPOE', 'required');
        $this->form_validation->set_rules('password_pppoe', 'Password PPPOE', 'required');
        $this->form_validation->set_rules('paket_berlangganan', 'Paket Berlangganan', 'required');
        $this->form_validation->set_rules('sn', 'SN', 'required');
        $this->form_validation->set_rules('no_port_olt', 'No Port OLT', 'required');
        $this->form_validation->set_rules('no_onu', 'No ONU', 'required');
        $this->form_validation->set_rules('lokasi_pemasangan', 'Lokasi Pemasangan', 'required');
        $this->form_validation->set_rules('jenis_modem', 'Jenis Modem', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['pelanggan'] = $this->Pelanggan_model->get_pelanggan_by_id($id);
            $this->load->view('pelanggan/edit', $data);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'user_pppoe' => $this->input->post('user_pppoe'),
                'password_pppoe' => $this->input->post('password_pppoe'),
                'paket_berlangganan' => $this->input->post('paket_berlangganan'),
                'sn' => $this->input->post('sn'),
                'no_port_olt' => $this->input->post('no_port_olt'),
                'no_onu' => $this->input->post('no_onu'),
                'lokasi_pemasangan' => $this->input->post('lokasi_pemasangan'),
                'jenis_modem' => $this->input->post('jenis_modem')
                // Lanjutkan dengan mengambil data lainnya
            );

            $this->Pelanggan_model->update_pelanggan($id, $data);
            redirect('pelanggan');
        }
    }

    public function hapus($id) {
        $this->Pelanggan_model->hapus_pelanggan($id);
        redirect('pelanggan');
    }

public function view_cli_config($id) {
    $data['pelanggan'] = $this->Pelanggan_model->get_pelanggan_by_id($id);

    // Pastikan data pelanggan ditemukan
    if (empty($data['pelanggan'])) {
        show_404();
    }

    // Mengisi variabel dengan data pelanggan
    $no_port_olt = $data['pelanggan']->no_port_olt;
    $no_onu = $data['pelanggan']->no_onu;
    $jenis_modem = $data['pelanggan']->jenis_modem;
    $sn = $data['pelanggan']->sn;
    $nama_pelanggan = $data['pelanggan']->nama_pelanggan;
    $user_pppoe = $data['pelanggan']->user_pppoe;
    $password_pppoe = $data['pelanggan']->password_pppoe;

    if ($jenis_modem === 'Huawei' || $jenis_modem === 'Fiberhome') {
        $jenis_modem = 'ALL-ONT';
    }

    // VLAN Mapping
    $vlan_mapping = array(
        'Karangnanas' => 500,
        'Wiradadi' => 501,
        'Karangrau' => 502,
        'Karangkedawung' => 503,
        'Kutasari' => 504,
        'Rempoah' => 505,
        'Kebumen' => 506,
        'Karangmangu' => 507,
        'Kemutug Lor' => 508,
        'Pamijen' => 509,
        'Sudagaran' => 510,
        'Kalisube' => 511,
        'Pekunden' => 512,
        'Dawuhan' => 513,
        'Kedunguter' => 514,
        'Teluk' => 515,
        'Karangklesem' => 516,
        'Wlahar Wetan' => 517
    );

    $lokasi_pemasangan = $data['pelanggan']->lokasi_pemasangan;
    if (array_key_exists($lokasi_pemasangan, $vlan_mapping)) {
        $vlan = $vlan_mapping[$lokasi_pemasangan];
    } else {
        // Handle cases where Lokasi Pemasangan is not found in the mapping
        $vlan = 0; // Set a default VLAN or handle the error as needed
    }

    // Membuat konfigurasi CLI sesuai dengan template
    $cli_config = "<br>conf t\n";
    $cli_config .= "interface gpon-olt_" . $no_port_olt . "\n";
    $cli_config .= "onu " . $no_onu . " type " . $jenis_modem . " sn " . $sn . "\n";
    $cli_config .= "exit\n";
    $cli_config .= "interface gpon-onu_" . $no_port_olt . ":" . $no_onu . "\n";
    $cli_config .= "name " . $nama_pelanggan . "\n";
    $cli_config .= "description $$" . $no_onu . "$$" . $user_pppoe . "\n";
    $cli_config .= "sn-bind enable sn\n";
    $cli_config .= "tcont 1 name T-01 profile SERVER\n";
    $cli_config .= "gemport 1 name T-01 tcont 1\n";
    $cli_config .= "service-port 1 vport 1 user-vlan " . $vlan . " vlan " . $vlan . "\n";
    $cli_config .= "exit\n";
    $cli_config .= "pon-onu-mng gpon-onu_" . $no_port_olt . ":" . $no_onu . "\n";
    $cli_config .= "service 1 gemport 1 cos 0 vlan " . $vlan . "\n";
    $cli_config .= "wan-ip 1 mode pppoe username " . $user_pppoe . " password " . $password_pppoe . " vlan-profile BROADBAND-" . strtoupper($lokasi_pemasangan) . " host 1\n";
    $cli_config .= "security-mgmt 1 state enable mode forward protocol web\n";
    $cli_config .= "exit\n";
    $cli_config .= "end\n";
    $cli_config .= "write\n";

    // Menampilkan tampilan hasil konfigurasi CLI
    $data['cli_config'] = $cli_config;
    $this->load->view('pelanggan/cli_config', $data);
}




}
