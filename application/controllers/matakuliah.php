<?php
class matakuliah extends CI_Controller
{
    public function index()
    {
        $this->load->model('matakuliah_models');
        $matakuliah = $this->matakuliah_models->getAll();
        $data['matakuliah'] = $matakuliah;
        // kirim data dan kirim ke dalam view 
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/index', $data);
        $this->load->view('layouts/footer');
    }

    public function form()
    {
        //render view
        $this->load->view('layouts/header');
        $this->load->view('matakuliah/form');
        $this->load->view('layouts/footer');
    }

    public function save()
    {
        $this->load->model('matakuliah_models', 'matakuliah');
        $_nama = $this->input->post('nama');
        $_sks = $this->input->post('sks');
        $_kode = $this->input->post('kode');

        $data_matakuliah['nama'] = $_nama;
        $data_matakuliah['sks'] = $_sks;
        $data_matakuliah['kode'] = $_kode;

        if ((!empty($_idedit))) {
            $data_matakuliah['id'] = $_idedit;
            $this->matakuliah->update($data_matakuliah);
        } else {
            $this->matakuliah->simpan($data_matakuliah);
        }

        redirect('matakuliah', 'refresh');
    }

    public function edit($id)
    {
        // akses model mahasiswa
        $this->load->model('matakuliah_models', 'matakuliah');
        $obj_matakuliah = $this->matakuliah->getById($id);
        $data['obj_matakuliah'] = $obj_matakuliah;

        $this->load->view('layouts/header');
        $this->load->view('matakuliah/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function delete($id)
    {
        $this->load->model('matakuliah_models', 'matakuliah');

        $data_matakuliah['id'] = $id;
        $this->matakuliah->delete($data_matakuliah);

        redirect('matakuliah', 'refresh');
    }

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('/login');
        }
    }
}