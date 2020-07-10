<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $model;
    protected $time;
    protected $date;

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H');
        $end = "17";

        if ($time === $end) {
            $data = $this->model->findAll();

            $dataUsers = [
                'status' => 'ALPHA',
            ];
            foreach ($data as $d) {
                $this->model->update($d['uid'], $dataUsers);
            }

            return $this->respond($this->model->findAll());
        } else {
            return $this->respond($this->model->findAll());
        }
    }


    public function __construct()
    {
        $this->model = new UserModel;

        date_default_timezone_set('Asia/Jakarta');
        $this->date = date('Y-m-d');
        $this->time = date('H:i:s');
    }

    public function create()
    {
        $data = [
            'uid' => $this->request->getPost('id'),
            'date' => $this->date,
            'time' => $this->time,
        ];

        if ($data['uid'] == '') {
            $response =  [
                'status' => 400,
                'message' => 'Id tidak boleh kosong!',
            ];
            return $this->respond($response, 400);
        }

        $query = $this->model->insert($data);
        if ($query == 0) {
            $response =  [
                'status' => 200,
                'message' => 'Success insert new data!',
                'data' => ''
            ];
            return $this->respond($response, 200);
        } else {
            $response =  [
                'status' => 400,
                'message' => 'Failed insert new data!',
                'data' => ''
            ];
            return $this->respond($response, 400);
        }
    }


    public function show($id = NULL)
    {
        if ($this->model->find($id) != null) {
            $response = [
                'status' => 200,
                'nama_sekolah' => 'SMK WIRABUANA 2',
                'data' => $this->model->find($id)
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 404,
                'message' => 'Data siswa tidak ditemukan!',
            ];
            return $this->respond($response, 404);
        }
    }

    public function edit($id = NULL)
    {
        if ($this->model->find($id) != null) {
            $response = [
                'status' => 200,
                'nama_sekolah' => 'SMK WIRABUANA 2',
                'data' => $this->model->find($id)
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 404,
                'message' => 'Data siswa tidak ditemukan!',
            ];
            return $this->respond($response, 404);
        }
    }

    public function update($id = NULL)
    {
        $data = $this->request->getRawInput();
        $data['date'] = $this->date;
        $data['time'] = $this->time;

        if (!$this->model->find($id)) {
            $response = [
                'status' => 400,
                'message' => 'Id not found',
            ];
            return $this->respond($response, 400);
        } else {
            $dataUsers = [
                'status' => 'HADIR',
            ];
            if ($this->model->update($id, $dataUsers)) {
                $response = [
                    'status' => 200,
                    'message' => 'Update success',
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => 400,
                    'message' => 'Update failed',
                ];
                return $this->respond($response, 400);
            }
        }
    }
}
