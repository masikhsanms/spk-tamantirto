<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_data extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          check_login();
     }
     public function padukuhan()
     {
          $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          $data['title'] = 'Manajemen Data';
          $data['sub_title'] = 'padukuhan';
          $data['data_padukuhan'] = $this->db->get('padukuhan')->result_array();

          $this->load->view('templates/dashboard/dashboard_header', $data);
          $this->load->view('templates/dashboard/sidebar', $data);
          $this->load->view('templates/dashboard/topbar', $data);
          $this->load->view('manajemen_data/padukuhan', $data);
          $this->load->view('templates/dashboard/dashboard_footer');
     }

     public function tambah_padukuhan()
     {
          $this->form_validation->set_rules('nama_padukuhan', 'Padukhan', 'required|trim|is_unique[padukuhan.nama_padukuhan]', [
               'required' => 'Ups, Nama padukuhan harus terisi!',
               'is_unique' => 'Maaf, Padukuhan sudah ada!'
          ]);

          if ($this->form_validation->run() == false) {
               $data['title'] = 'Manajemen Data';
               $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
               $data['data_padukuhan'] = $this->db->get('padukuhan')->result_array();

               $this->load->view('templates/dashboard/dashboard_header', $data);
               $this->load->view('templates/dashboard/sidebar', $data);
               $this->load->view('templates/dashboard/topbar', $data);
               $this->load->view('manajemen_data/padukuhan', $data);
               $this->load->view('templates/dashboard/dashboard_footer');
          } else {
               $data = [
                    'nama_padukuhan' => htmlspecialchars($this->input->post('nama_padukuhan', true)),
               ];

               $this->db->insert('padukuhan', $data);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Padukuan berhasil ditambahkan!</div>');
               redirect('manajemen_data/padukuhan');
          }
     }

     public function hapus_padukuhan()
     {
          $id_user = $this->input->post('idPadukuhan', true);
          $this->db->where('id_padukuhan', $id_user);
          $this->db->delete('padukuhan');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Padukuhan berhasil dihapus!</div>');
          redirect('manajemen_data/padukuhan');
     }

     public function update_padukuhan()
     {
          $this->form_validation->set_rules('ubahNamaPadukuhan', 'Padukuhan', 'required|trim|is_unique[padukuhan.nama_padukuhan]', [
               'required' => 'Ups, Nama padukuhan harus terisi!',
               'is_unique' => 'Maaf, Padukuhan sudah ada!'
          ]);

          if ($this->form_validation->run() == false) {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Padukuhan sudah ada!</div>');
               $this->session->set_flashdata('message-update-padukuhan', ' <div id="errorNamaPadukuhan" class="invalid-feedback ml-1 errorUpdatePadukuhan" value="1">Padukuhan sudah ada!</div>');
               redirect('manajemen_data/padukuhan');
          } else {
               $id_padukuhan = $this->input->post('idUpdatePadukuhan', true);
               $data = [
                    'nama_padukuhan' => $this->input->post('ubahNamaPadukuhan', true),
               ];

               $this->db->where('id_padukuhan', $id_padukuhan);
               $this->db->update('padukuhan', $data);

               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Padukuhan berhasil diupdate!</div>');
               redirect('manajemen_data/padukuhan');
          }
     }
}
