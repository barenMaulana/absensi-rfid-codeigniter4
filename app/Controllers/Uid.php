<?php

namespace App\Controllers;

use App\Models\UidModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Uid extends ResourceController
{

    public function index()
    {
        $model = new UidModel;
        $userModel = new UserModel;
        $data = $model->getData();
        foreach ($data as $d) {
            $userModel->insert($d);
        }
    }

    public function create()
    {
        $model = new UidModel;

        $data = $this->request->getPost();

        if ($model->insert($data)) {
            $response = [
                'status' => true,
                'message' => 'Success'
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => false,
                'message' => 'Failed'
            ];
            return $this->respond($response, 400);
        }
    }
}
