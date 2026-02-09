<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'      => 'Belajar CodeIgniter 4',
                'deskripsi'  => 'Mempelajari Controller, Model, dan Migration.',
                'status'     => 'completed',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Membuat Fitur Task Manager',
                'deskripsi'  => 'Membangun fitur CRUD untuk aplikasi FocusFlow.',
                'status'     => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Deploy Aplikasi',
                'deskripsi'  => 'Mengunggah hasil project ke server hosting.',
                'status'     => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Menggunakan Query Builder untuk memasukkan data ke tabel 'tasks'
        $this->db->table('tasks')->insertBatch($data);
    }
}