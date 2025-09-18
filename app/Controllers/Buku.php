<?php
namespace App\Controllers;
use App\Models\Bukumodel;

class Buku extends BaseController
{
    protected $Bukumodel;
    public function __construct()
    {
        $this->Bukumodel = new Bukumodel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->Bukumodel->getBuku()
        ];
        return view('layout/header')
            . view('buku/index', $data)
            . view('layout/footer');
    }

    public function detail($idbuku)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->Bukumodel->getBuku($idbuku)
        ];
        return view('layout/header')
            . view('buku/detail', $data)
            . view('layout/footer');
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/tambah', $data);
    }

    public function simpan()
    {
        if ($this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,10000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar Wajib Dipilih',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File Wajib Gambar',
                    'mime_in' => 'Tipe File Gambar Tidak Sesuai'
                ]
            ]
        ])) {
            $filesampul = $this->request->getFile('sampul');
            $filesampul->move('img');
            $nmsampul = $filesampul->getName();

            $this->Bukumodel->save([
                'judul' => $this->request->getVar('judul'),
                'pengarang' => $this->request->getVar('pengarang'),
                'penerbit' => $this->request->getVar('penerbit'),
                'tahun_terbit' => $this->request->getVar('tahun'),
                'sampul' => $nmsampul
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/buku');
        }

        return redirect()->to('/buku/tambah')->withInput();
    }

    public function hapus($idbuku)
    {
        $this->Bukumodel->delete($idbuku);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/buku');
    }

    public function ubah($idbuku)
    {
        $data = [
            'title' => 'Form Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->Bukumodel->getBuku($idbuku)
        ];

        return view('buku/ubah', $data);
    }

    public function update($idbuku)
    {
        if ($this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,10000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File Wajib Gambar',
                    'mime_in' => 'Tipe File Gambar Tidak Sesuai'
                ]
            ]
        ])) {
            $filesampul = $this->request->getFile('sampul');
            // Cek gambar, jika tidak upload gambar, pakai sampul lama
            if ($filesampul->getError() == 4) {
                $nmsampul = $this->request->getVar('sampulLama');
            } else {
                $nmsampul = $filesampul->getName();
                $filesampul->move('img', $nmsampul);
            }

            $this->Bukumodel->save([
                'id_buku' => $idbuku,
                'judul' => $this->request->getVar('judul'),
                'pengarang' => $this->request->getVar('pengarang'),
                'penerbit' => $this->request->getVar('penerbit'),
                'tahun_terbit' => $this->request->getVar('tahun'),
                'sampul' => $nmsampul
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');
            return redirect()->to('/buku');
        }

        return redirect()->to('/buku/ubah/' . $idbuku)->withInput();
    }
}
