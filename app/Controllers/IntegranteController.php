<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IntegranteModel;
use App\Models\PaisModel;


class IntegranteController extends Controller
{
    public $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    protected $helpers = ['form', 'url'];
    protected $validation;

    public function index()
    {
        $integranteModel = new IntegranteModel();
        $integrantes = $integranteModel->findAllWithPais();

        foreach ($integrantes as $integrante) {
            if (!empty($integrante->fecha_muerte)) {
                $integrante->fecha_muerte = date('d-m-Y', strtotime($integrante->fecha_muerte));
            } else {
                $integrante->fecha_muerte = '';
            }

            $integrante->fecha_nacimiento = date('d-m-Y', strtotime($integrante->fecha_nacimiento));
        }

        $data['integrantes'] = $integrantes;
        return view('integrantes/index', $data);
    }

    public function create()
    {
        $paisModel = new PaisModel();
        $paises = $paisModel->orderBy('nombre', 'ASC')->findAll();

        $data['paises'] = $paises;
        return view('integrantes/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|valid_date',
            'fecha_muerte' => 'permit_empty|valid_date',
            'web_oficial' => 'permit_empty|valid_url',
            'pais_id' => 'required|integer',
        ];
        if ($this->validate($validationRules)) {
            $request = service('request');
            $postData = $request->getPost();

            $integrante = new IntegranteModel();
            $data = [
                'nombre' => $postData['nombre'],
                'apellido' => $postData['apellido'],
                'fecha_nacimiento' => $postData['fecha_nacimiento'],
                'fecha_muerte' => (!empty($postData['fecha_muerte'])) ? $postData['fecha_muerte'] : null,
                'web_oficial' => (!empty($postData['web_oficial'])) ? $postData['web_oficial'] : null,
                'pais_id' => $postData['pais_id']
            ];

            if ($integrante->insert($data)) {
                $this->session->setFlashdata('message', 'Integrante agregado exitosamente');
                $this->session->setFlashdata('alert-class', 'success');
                $integranteId = $integrante->getInsertID();
                return redirect()->to(site_url('integrantes/edit/' . $integranteId));
            } else {
                $this->session->setFlashdata('message', 'El integrante no se ha guardado');
                $this->session->setFlashdata('alert-class', 'danger');
                return redirect()->to(site_url('integrantes/create'));
            }
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function edit($integrante_id = 0)
    {
        $integranteModel = new IntegranteModel();
        $integrante = $integranteModel->find($integrante_id);
        $data['integrante'] = $integrante;

        $paisModel = new PaisModel();
        $paises = $paisModel->orderBy('nombre', 'ASC')->findAll();
        $data['paises'] = $paises;

        return view('integrantes/edit', $data);
    }

    public function update($integrante_id = 0)
    {
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            $validationRules = [
                'nombre' => 'required',
                'apellido' => 'required',
                'fecha_nacimiento' => 'required|valid_date',
                'fecha_muerte' => 'permit_empty|valid_date',
                'web_oficial' => 'permit_empty|valid_url',
                'pais_id' => 'required|integer',
            ];

            if ($this->validate($validationRules)) {
                $integranteModel = new IntegranteModel();
                $data = [
                    'nombre' => $postData['nombre'],
                    'apellido' => $postData['apellido'],
                    'fecha_nacimiento' => $postData['fecha_nacimiento'],
                    'fecha_muerte' => (!empty($postData['fecha_muerte'])) ? $postData['fecha_muerte'] : null,
                    'web_oficial' => (!empty($postData['web_oficial'])) ? $postData['web_oficial'] : null,
                    'pais_id' => $postData['pais_id']
                ];

                if ($integranteModel->update($integrante_id, $data)) {
                    session()->setFlashdata('message', 'Integrante actualizado exitosamente');
                    session()->setFlashdata('alert-class', 'success');
                    return redirect()->to(site_url('integrantes/edit/' . $integrante_id));
                } else {
                    session()->setFlashdata('message', 'El integrante no se ha actualizado');
                    session()->setFlashdata('alert-class', 'danger');
                }
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function delete($integrante_id = 0)
    {
        $integranteModel = new IntegranteModel();
        if ($integranteModel->find($integrante_id)) {
            $integranteModel->delete($integrante_id);
            session()->setFlashdata('message', 'Integrante eliminado!');
            session()->setFlashdata('alert-class', 'success');
        } else {
            session()->setFlashdata('message', '¡El integrante no se ha podido eliminar!');
            session()->setFlashdata('alert-class', '-danger');
        }
        return redirect()->to(site_url('integrantes/index'));
    }

    public function sql()
    {
        return view('integrantes/sql');
    }
}
