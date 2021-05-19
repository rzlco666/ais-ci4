<?php

namespace App\Controllers;

class Landing extends BaseController
{

	public function index()
	{
		return view('landing/index');
	}

	public function profil()
    {
        echo 'Ini adalah method profil di controller Siswa';
    }
}
