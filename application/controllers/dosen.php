<?php
class dosen extends CI_Controller
{
    public function index()
    {
        $this->load->model('dosen_models');
        $dosen = $this->dosen_models->getAll();
        $data['dosen'] = $dosen;
        // kirim data dan kirim ke dalam view  
        $this->load->view('layouts/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('layouts/footer');
    }

    public function detail($id)
    {
        //akses model mahasiswa
        $this->load->model('dosen_models');
        $ddosen = $this->dosen_models->getById($id);
        $data['ddosen'] = $ddosen;
        $this->load->view('layouts/header');
        $this->load->view('dosen/detail', $data);
        $this->load->view('layouts/footer');
    }

    public function form()
    {
        //render view
        $this->load->view('layouts/header');
        $this->load->view('dosen/form');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->load->model('dosen_models', 'dosen');
        $_nama = $this->input->post('nama');
        $_gender = $this->input->post('gender');
        $_tmp_lahir = $this->input->post('tmp_lahir');
        $_tgl_lahir = $this->input->post('tgl_lahir');
        $_nidn = $this->input->post('nidn');
        $_pendidikan = $this->input->post('pendidikan');

        $data_dosen['nama'] = $_nama;
        $data_dosen['gender'] = $_gender;
        $data_dosen['tmp_lahir'] = $_tmp_lahir;
        $data_dosen['tgl_lahir'] = $_tgl_lahir;
        $data_dosen['nidn'] = $_nidn;
        $data_dosen['pendidikan'] = $_pendidikan;

        if ((!empty($_idedit))) {
            $data_dosen['id'] = $_idedit;
            $this->dosen->update($data_dosen);
        } else {
            $this->dosen->simpan($data_dosen);
        }

        redirect('dosen', 'refresh');
    }

    public function edit($id)
    {
        // akses model mahasiswa
        $this->load->model('dosen_models', 'dosen');
        $obj_dosen = $this->dosen->getById($id);
        $data['obj_dosen'] = $obj_dosen;

        $this->load->view('layouts/header');
        $this->load->view('dosen/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function delete($id)
    {
        $this->load->model('dosen_models', 'dosen');

        $data_dosen['id'] = $id;
        $this->dosen->delete($data_dosen);

        redirect('dosen', 'refresh');
    }

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
    }
}