<?php

namespace App\Controllers;

use App\Controllers\BaseControllers;
use App\Models\UserModel;


class User extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }
    public function index()
    {
        $userModel = new UserModel();
        $data =
        [
            'nama' => "Administrator",
            'nav' => "user",
            'list' => $userModel->findAll()
        ];
      return view('user/index', $data);
    }
    public function detail($id)
    {
        $userModel = new UserModel();
        $data =
        [
            'nav' => "user",
            'nama' => "Boboiboy",
            // 'item' => $userModel->where(['id' => $id])->first(),
            'item' => $this->usermodel->getDetail($id)
        ];
        return view('user/detail', $data);
    }
    public function create()
    {
        $data = [
            'nav' => 'user',
            'nama' => 'Boboboy',
        ];
        // var_dump($data);
        return view('user/tambah', $data);
    }
    public function insert()
    {

        $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $namaavatar = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/img/avatar', $namaavatar);
        } else {
            $namaavatar = 'default.jpg';
        }
        $input = [
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar
        ];
        $this->usermodel->save($input);

        session()->setFlashdata('label', 'Data anggota berhasil ditambahkan');
        return redirect()->to('/user');
    }
    public function insertAjax()
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 10 karakter'
                ]
            ],
            'namabelakang' => [
                'label' => 'Nama Belakang',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'namabelakang' => $validasi->getError('namabelakang'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/img/avatar', $namaavatar);
            } else {
                $namaavatar = 'default.jpg';
            }
            $input = [
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),
                'tempat_lahir' => $this->request->getVar('tempatlahir'),
                'tanggal_lahir' => $this->request->getVar('tanggallahir'),
                'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
                'telepon' => $this->request->getVar('telepon'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                'avatar' => $namaavatar
            ];
            $this->usermodel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diinput'
            ];
            return $this->response->setJSON($pesan);
        }
    }
    public function edit($id)
    {
        if ($this->request->isAJAX()) {
            $item = $this->usermodel->find($id);
            $nama = explode(" ", $item['nama']);
            $data = [
                'id' => $item['id'],
                'nama_depan' => $nama[0],
                'nama_belakang' => $nama[1],
                'alamat' => $item['alamat'],
                'tempat_lahir' => $item['tempat_lahir'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'telepon' => $item['telepon'],
                'email' => $item['email'],
                'username' => $item['username'],
                'password' => $item['password'],
                'avatar' => $item['avatar']
            ];
            $hasil = [
                'data' => view('user/edit', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }
    public function update($id)
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 10 karakter'
                ]
            ],
            'namabelakang' => [
                'label' => 'Nama Belakang',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ]
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'namabelakang' => $validasi->getError('namabelakang'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/img/avatar', $namaavatar);
            } else {
                $namaavatar = $this->request->getVar('avalama');
            }
            if ($this->request->getVar('password') != $this->request->getVar('passlama')) {
                $pass = md5($this->request->getVar('password'));
            } else {
                $pass = $this->request->getVar('passlama');
            }

            $input = [
                'id' => $id,
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),
                'tempat_lahir' => $this->request->getVar('tempatlahir'),
                'tanggal_lahir' => $this->request->getVar('tanggallahir'),
                'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
                'telepon' => $this->request->getVar('telepon'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => $pass,
                'avatar' => $namaavatar
            ];
            $this->usermodel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diupdate'
            ];
            return $this->response->setJSON($pesan);
        }
    }
    public function hapus($id){
        if ($this->request->isAJAX()){
            $userModel = new userModel;
            $userModel->delete($id);
            $pesan = [
                'Sukses' => "Anggota dengan ID=$id berhasil dihapus"
            ];
            echo json_encode($pesan);
        } else {
            exit('Data tidak bisa dihapus');
        }
    }
    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'list' => $this->usermodel->find()
            ];
            $hasil = [
                'data' => view('user/list', $data)
            ];
            // echo json_encode($hasil);
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }
    public function getForm()
    {
        if ($this->request->isAJAX()) {
            $hasil = [
                'data' => view('user/form')
            ];
            // echo json_encode($hasil);
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }


}