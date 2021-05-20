<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;

class Project extends BaseController
{
	public function index()
	{
		$berkas = new ProjectModel();
		$data['berkas'] = $berkas->findAll();
		return view('project/index', $data);
	}

	public function create()
	{
		return view('project/upload');
	}

	public function save()
	{
		if (!$this->validate([
			'nama_project' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'deskripsi_project' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'owner' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'no_telp' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'thumbnail' => [
				'rules' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,2048]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
					'max_size' => 'Ukuran File Maksimal 2 MB'
				]
 
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
 
		$berkas = new ProjectModel();
		$dataBerkas = $this->request->getFile('thumbnail');
		$fileName = $dataBerkas->getRandomName();
		$berkas->insert([
			'thumbnail' => $fileName,
			'nama_project' => $this->request->getPost('nama_project'),
			'deskripsi_project' => $this->request->getPost('deskripsi_project'),
			'owner' => $this->request->getPost('owner'),
			'no_telp' => $this->request->getPost('no_telp'),
			'email' => $this->request->getPost('email'),
			'alamat' => $this->request->getPost('alamat')
		]);
		$dataBerkas->move('uploads/berkas/', $fileName);
		session()->setFlashdata('success', 'Project Berhasil ditambah!');
		return redirect()->to(base_url('project'));
	}
}
