<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$page_data['page'] = "home";
		return view('front/index',$page_data);
	}
	public function page($page)
	{
		$page_data['page'] = 'pages/'.$page;
		return view('front/index', $page_data);
	}

	//--------------------------------------------------------------------

}
