<?php

namespace App\Controllers;

use App\Models\TaskModel; // Pastikan model dipanggil

class Tasks extends BaseController
{
    // --- LANGKAH 1: DAFTARKAN PROPERTI (PENTING!) ---
    // Baris ini memberitahu PHP bahwa Class ini punya properti bernama $taskModel
    protected $taskModel;

    // --- LANGKAH 2: ISI PROPERTI DI CONSTRUCTOR ---
    public function __construct()
    {
        // Baris ini mengisi properti tadi dengan "mesin" TaskModel
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        // Sekarang $this->taskModel sudah dikenal di seluruh Class
        $filterStatus = $this->request->getGet('status');
        $totalData = $this->taskModel->findAll();

        if($filterStatus){
            $semua = $this->taskModel->where('status', $filterStatus)->findAll();
        } else {
            $semua = $totalData;
        }
        
        $data = [
            'title'           => 'Dashboard FocusFlow',
            'semua_tugas'     => $semua,
            'current_filter'  => $filterStatus,
            'total_tugas'     => count($totalData),
            'tugas_pending'   => count(array_filter($semua, fn($t) => $t['status'] == 'pending')),
            'tugas_completed' => count(array_filter($semua, fn($t) => $t['status'] == 'completed')),
        ];

        return view('tasks/index', $data);
    }



    public function create()
    {
        $data = [
            'title' => 'Tambah Tugas Baru'
        ];
        return view('tasks/create', $data);
    }

    public function store()
    {
        $this->taskModel->save([
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status'    => 'pending'
        ]);

        session()->setFlashdata('pesan', 'Tugas berhasil ditambahkan!');
        return redirect()->to('/tasks');
    }

    public function complete($id){
        $this->taskModel->update($id, [
            'status' => 'completed'
        ]);
    session()->setFlashData('Satu Tugas sudah diselesaikan');
    return redirect()->to('/tasks');    
    }

}