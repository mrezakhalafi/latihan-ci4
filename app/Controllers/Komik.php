<?php

namespace App\Controllers;

use App\Models\KomikModel;
use Exception;

class Komik extends BaseController
{

    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {

        // $data['title'] = "Daftar Komik";

        $komik = $this->komikModel->getKomik();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $komik
        ];

        // $db = \Config\Database::connect();
        // $komik = $db->query('SELECT * FROM komik');

        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // $komikModel = new \App\Models\KomikModel();

        return view('komik/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik tidak ditemukan');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        // session();

        $validation = session()->getFlashdata('validation');

        if ($validation == null) {
            $validation = \Config\Services::validation();
        }

        $data = [
            'title' => 'Tambah Komik',
            'validation' => $validation
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        // $this->request->getPost('judul');
        // $this->request->getGet('judul');

        // dd($this->request->getVar());

        // if (!$this->validate(
        //     [
        //         'judul' => 'required|is_unique[komik.judul]',
        //         'penulis' => 'required'
        //     ]
        // )) {

        //     return redirect()->to('komik/create')->withInput();
        // }

        if (!$this->validate(
            [
                'Judul' => [
                    'rules' => 'required|is_unique[komik.Judul]',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'Penulis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'Penerbit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                // 'Sampul' => [
                //     'rules' => 'uploaded[Sampul]',
                //     'errors' => [
                //         'uploaded' => '{field} harus diisi.'
                //     ]
                // ]
            ]
        )) {

            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);

            return redirect()->to(base_url('komik/create'))->withInput();
        }

        $fileSampul = $this->request->getFile('Sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampulBaru = 'default.svg';
        } else {
            $namaSampulBaru = $fileSampul->getRandomName();
            $fileSampul->move('images', $namaSampulBaru);
        }

        // $namaSampul = $fileSampul->getName();

        $slug = url_title($this->request->getVar('Judul'), '-', true);

        $komik = [
            'judul' => $this->request->getVar('Judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('Penulis'),
            'penerbit' => $this->request->getVar('Penerbit'),
            'sampul' => $namaSampulBaru
        ];

        $this->komikModel->insert($komik);
        // $this->komikModel->save($komik);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {

        $komik = $this->komikModel->find($id);

        if ($komik['sampul'] != 'default.svg') {
            unlink('images/' . $komik['sampul']);
        }

        $this->komikModel->delete($id);

        session()->setFlashdata('pesan', 'Data telah dihapus!');

        return redirect()->to('/komik');
    }

    public function edit($slug)
    {

        $validation = session()->getFlashdata('validation');

        if ($validation == null) {
            $validation = \Config\Services::validation();
        }

        $data = [
            'title' => 'Ubah Komik',
            'validation' => $validation,
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('/komik/edit', $data);
    }

    public function update($id)
    {

        $slug = $this->request->getVar('Slug');

        $komikLama = $this->komikModel->getKomik($slug);

        if ($komikLama['judul'] == $this->request->getVar('Judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.Judul]';
        }

        if (!$this->validate(
            [
                'Judul' => [
                    'rules' => $rule_judul,
                    'errors' => [
                        'required' => '{field} harus diisi.',
                        'is_unique' => '{field} sudah terdaftar.'
                    ]
                ],
                'Penulis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                'Penerbit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.'
                    ]
                ],
                // 'Sampul' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} harus diisi.'
                //     ]
                // ]
            ]
        )) {

            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);

            return redirect()->to(base_url('/komik/edit/' . $slug))->withInput();
        }

        $fileSampul = $this->request->getFile('Sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('images', $namaSampul);
            unlink('images/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('Judul'), '-', true);

        $komik = [
            'id' => $id,
            'judul' => $this->request->getVar('Judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('Penulis'),
            'penerbit' => $this->request->getVar('Penerbit'),
            'sampul' => $namaSampul
        ];

        $this->komikModel->save($komik);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/komik');
    }
}
