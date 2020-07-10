<?php

namespace App\Controllers;

class Manage extends BaseController
{
	function __construct()
	{
		$this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
	}
	public function index()
	{
		$page_data['page'] = "home";
		return view('back/index', $page_data);
	}
	public function login($para1 = '')
	{
		if ($para1 == 'submit') {
			$data['admin_email']  =   $this->request->getPost('user');
			$data['admin_password']  = md5($this->request->getPost('password'));
			$output['data'] = $data;
			$result = $this->db->table('admin')->getWhere($data);
			if (count($result->getResult())) {
				$array_items = array('admin_logged' => true, 'admin_id' => $result->getRow()->admin_id, 'admin_name' => $result->getRow()->admin_name);
				$this->session->set($array_items);
				$output['success'] = true;
				$output['message'] = 'Login Successful';
			} else {
				$output['success'] = false;
				$output['message'] = 'Login Failed';
			}
			echo json_encode($output);
		} else {
			if ($this->session->get('admin_logged')) {
				return redirect()->to('/manage');
			}
			return view('back/login');
		}
	}
	public function logout()
	{
		$array_items = array('admin_logged', 'admin_id', 'admin_name');
		$this->session->remove($array_items);
		return redirect()->to('auth/admin');
	}
	public function gallery($para1 = '')
	{
		if ($para1 == 'upload') {
			$imageLib = \Config\Services::image();
			if ($imagefile = $this->request->getFiles()) {
				foreach ($imagefile['images'] as $img) {
					if ($img->isValid() && !$img->hasMoved()) {
						$newName = $img->getRandomName();
						if ($img->move('images/gallery/full', $newName)) {
							$imageLib->withFile('images/gallery/full/' . $newName)->resize(200, 200, true, 'height')->save('images/gallery/thumb/' . $newName, 50);
							$imageLib->withFile('images/gallery/full/' . $newName)->flip('horizontal')->flip('horizontal')->save('images/gallery/full/' . $newName, 50);
							$this->db->table('gallery')->insert(['gallery_name' => $newName]);
						}
					}
				}
			}
		} elseif ($para1 == 'images') {
			$page_data['images'] = $this->db->table('gallery')->orderBy('gallery_id', 'desc')->get()->getResult('array');
			return view('back/gallery_images', $page_data);
		} else {
			$page_data['page'] = 'gallery';
			return view('back/index', $page_data);
		}
	}
	public function press($para1 = '')
	{
		if ($para1 == 'upload') {
			$imageLib = \Config\Services::image();
			if ($imagefile = $this->request->getFiles()) {
				foreach ($imagefile['images'] as $img) {
					if ($img->isValid() && !$img->hasMoved()) {
						$newName = $img->getRandomName();
						if ($img->move('images/press/full', $newName)) {
							$imageLib->withFile('images/press/full/' . $newName)->resize(200, 200, true, 'height')->save('images/press/thumb/' . $newName, 50);
							$imageLib->withFile('images/press/full/' . $newName)->flip('horizontal')->flip('horizontal')->save('images/press/full/' . $newName, 50);
							$this->db->table('press')->insert(['press_name' => $newName]);
						}
					}
				}
			}
		} elseif ($para1 == 'images') {
			$page_data['images'] = $this->db->table('press')->orderBy('press_id', 'desc')->get()->getResult('array');
			return view('back/press_images', $page_data);
		} else {
			$page_data['page'] = 'press';
			return view('back/index', $page_data);
		}
	}
	public function page($para1 = '')
	{
		if ($para1 == 'new') {
			$page_data['page'] = 'page_new';
			return view('back/index', $page_data);
		} else {
			$page_data['page'] = 'page';
			return view('back/index', $page_data);
		}
	}

	//--------------------------------------------------------------------

}
