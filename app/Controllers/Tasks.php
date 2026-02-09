<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Tasks extends BaseController {
    protected $taskModel;

    public function __construct() {
        // Inisialisasi model agar siap digunakan di semua fungsi
        $this->taskModel = new TaskModel();
    }

    public function index() {
        // Menangkap input dari pencarian dan filter tab
        $filterStatus = $this->request->getGet('status');
        $keyword      = $this->request->getGet('search');

        // AMBIL DATA UTUH untuk statistik (agar angka di kotak atas tetap akurat)
        $totalData = $this->taskModel->findAll();

        // QUERY BUILDER untuk daftar tugas di bawah
        $builder = $this->taskModel;
        if ($keyword) $builder = $builder->like('judul', $keyword);
        if ($filterStatus) $builder = $builder->where('status', $filterStatus);
        
        $semua = $builder->findAll();

        $data = [
            'title'           => 'Dashboard FocusFlow',
            'semua_tugas'     => $semua,
            'current_filter'  => $filterStatus,
            'keyword'         => $keyword,
            // LOGIKA STATISTIK: Menghitung jumlah data berdasarkan status
            'total_tugas'     => count($totalData),
            'tugas_pending'   => count(array_filter($totalData, fn($t) => $t['status'] == 'pending')),
            'tugas_completed' => count(array_filter($totalData, fn($t) => $t['status'] == 'completed')),
        ];
        return view('tasks/index', $data);
    }

    public function store() {
        $this->taskModel->save([
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status'    => 'pending'
        ]);
        session()->setFlashdata('pesan', 'Tugas baru berhasil ditambahkan!');
        return redirect()->to('/tasks');
    }

    public function edit($id) {
        $data = [
            'title' => 'Edit Tugas',
            'task'  => $this->taskModel->find($id)
        ];
        return view('tasks/edit', $data);
    }

    public function update($id) {
        $this->taskModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'status'    => $this->request->getPost('status')
        ]);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan!');
        return redirect()->to('/tasks');
    }

    public function complete($id) {
        $this->taskModel->update($id, ['status' => 'completed']);
        session()->setFlashdata('pesan', 'Mantap! Tugas selesai.');
        return redirect()->to('/tasks');
    }

    public function delete($id) {
        $this->taskModel->delete($id);
        session()->setFlashdata('pesan', 'Tugas telah dihapus.');
        return redirect()->to('/tasks');
    }
}