<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;

class Tasks extends BaseController
{
    public function create(){
        $data = [
        'title' => 'Tambah Tugas Baru'
    ];
    return view('tasks/create', $data);
    }

    public function index()
    {
        $model = new TaskModel();

        $data = [
            'title' => 'Daftar Tugas',
            'semua_tugas' => $model->findAll()
        ];
        return view('tasks/index', $data);
    }

    public function store()
    {
    $model = new \App\Models\TaskModel();

    // Mengambil data dari form dan menyimpannya ke database
    $model->save([
        'judul'     => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'status'    => 'pending' // Default status untuk tugas baru
    ]);

    // Setelah simpan, arahkan kembali ke halaman daftar tugas
    return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $model = new TaskModel();
        
        $data = [
            'title' => 'Edit Tugas',
            'task'  => $model->find($id) // Mencari 1 data spesifik berdasarkan ID
        ];

        if (empty($data['task'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tugas tidak ditemukan: ' . $id);
        }

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $model = new TaskModel();

        // Memperbarui data berdasarkan ID
        $model->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status'    => $this->request->getPost('status')
        ]);

        return redirect()->to('/tasks');
    }
}
