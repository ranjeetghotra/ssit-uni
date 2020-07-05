<?php namespace App\Controllers;

class Manage extends BaseController
{
	public function index()
	{
		// $page_data['page'] = "home";
		return view('back/index');
	}
	public function login()
	{
		return view('back/login');
	}
	public function page($page)
	{
		$page_data['page'] = $page;
		return view('front/index', $page_data);
	}

	//--------------------------------------------------------------------

}
