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
	public function gallery($para1 = '', $para2 = '')
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
		}
		elseif ($para1 == 'delete') {
			$image = $this->db->table('gallery')->getWhere(['gallery_id' => $para2])->getRow()->gallery_name;
			$this->db->table('gallery')->where(['gallery_id' => $para2])->delete();
			if ($image) {
				unlink('images/gallery/full/' . $image);
				unlink('images/gallery/thumb/' . $image);
			}
		}
		else {
			$page_data['page'] = 'gallery';
			return view('back/index', $page_data);
		}
	}
	public function press($para1 = '', $para2 = '')
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
		}
		elseif ($para1 == 'delete') {
			$image = $this->db->table('press')->getWhere(['press_id' => $para2])->getRow()->press_name;
			$this->db->table('press')->where(['press_id' => $para2])->delete();
			if ($image) {
				unlink('images/press/full/' . $image);
				unlink('images/press/thumb/' . $image);
			}
		}
		else {
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
	public function admission($para1 = '', $para2 = '')
	{
		if ($para1 == "message") {
			return $this->db->table('admission')->getWhere(['admission_id' => $para2])->getRow()->contact_message;
		} elseif ($para1 == "delete") {
			$this->db->table('admission')->where(['admission_id' => $para2])->delete();
		}
		elseif ($para1 == "list_data") {
			// $contact = $this->db->table('contact')->orderBy('contact_id', 'desc')->get()->getResult('array');
			$limit = $this->request->getPost('length');
			$start = $this->request->getPost('start');
			$search = $this->request->getPost('search')['value'];
			$order = $this->request->getPost('order')[0]['column'];
			$dir = $this->request->getPost('order')[0]['dir'];
			$data = array();

			$builder = $this->db->table('admission');
			if ($search) {
				// $builder->like('subcat_name', $search, 'both');
				// $builder->orlike('category_name', $search, 'both');
			}
			// $subcat = $builder->join('category', 'subcat.subcat_category = category.category_id')->get()->getResult('array');
			$builder->orderBy('admission_id', 'desc');
			$contact = $builder->get()->getResult('array');
			$i = $start;
			foreach (array_slice($contact, $start, $limit) as $item) {
				$p = array();
				$p[] = ++$i;
				$p[] = $item['admission_name'];
				$p[] = $item['admission_phone'];
				$p[] = $item['admission_level'];
				$p[] = $item['admission_course'];
				$p[] = '<div class="dropdown show"><a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>'
					. '<div class="dropdown-menu" style="min-width:inherit" aria-labelledby="dropdownMenuLink">'
					//. '<li data-toggle="modal" data-target="#viewModal" data-id="' . $item['contact_id'] . '" data-subject="' . $item['admission_subject'] . '" class="dropdown-item item-view"><i class="fas fa-eye fa-sm mr-2"></i>Edit</li>'
					. '<li data-id="' . $item['admission_id'] . '" class="dropdown-item text-white bg-danger item-delete"><i class="fas fa-trash fa-sm mr-2"></i>Delete</li>'
					. '</div></div>';
				$data[] = $p;
			}
			$output["draw"] = intval($this->request->getPost('draw'));
			$output['recordsTotal'] = count($contact);
			$output['recordsFiltered'] = count($contact);
			$output['data'] = $data;
			return json_encode($output, true);
		}
		else {
			$page['page'] = 'admission';
			return view('back/index', $page);
		}
	}
	public function contact($para1 = '', $para2 = '')
	{
		if ($para1 == "delete") {
			$this->db->table('contact')->where(['contact_id' => $para2])->delete();
		} elseif ($para1 == "list_data") {
			// $contact = $this->db->table('contact')->orderBy('contact_id', 'desc')->get()->getResult('array');
			$limit = $this->request->getPost('length');
			$start = $this->request->getPost('start');
			$search = $this->request->getPost('search')['value'];
			$order = $this->request->getPost('order')[0]['column'];
			$dir = $this->request->getPost('order')[0]['dir'];
			$data = array();

			$builder = $this->db->table('contact');
			if ($search) {
				// $builder->like('subcat_name', $search, 'both');
				// $builder->orlike('category_name', $search, 'both');
			}
			// $subcat = $builder->join('category', 'subcat.subcat_category = category.category_id')->get()->getResult('array');
			$builder->orderBy('contact_id', 'desc');
			$contact = $builder->get()->getResult('array');
			$i = $start;
			foreach (array_slice($contact, $start, $limit) as $item) {
				$p = array();
				$p[] = ++$i;
				$p[] = $item['contact_name'];
				$p[] = $item['contact_phone'];
				$p[] = $item['contact_email'];
				$p[] = $item['contact_subject'];
				$p[] = '<div class="dropdown show"><a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>'
					. '<div class="dropdown-menu" style="min-width:inherit" aria-labelledby="dropdownMenuLink">'
					. '<li data-toggle="modal" data-target="#viewModal" data-id="' . $item['contact_id'] . '" data-subject="' . $item['contact_subject'] . '" class="dropdown-item item-view"><i class="fas fa-eye fa-sm mr-2"></i>Edit</li>'
					. '<li data-id="' . $item['contact_id'] . '" class="dropdown-item text-white bg-danger item-delete"><i class="fas fa-trash fa-sm mr-2"></i>Delete</li>'
					. '</div></div>';
				$data[] = $p;
			}
			$output["draw"] = intval($this->request->getPost('draw'));
			$output['recordsTotal'] = count($contact);
			$output['recordsFiltered'] = count($contact);
			$output['data'] = $data;
			return json_encode($output, true);
		}
		else {
			$page['page'] = 'contact';
			return view('back/index', $page);
		}
	}
	public function slider($para1 = '', $para2 = '')
	{
		if ($para1 == 'upload') {
			$imageLib = \Config\Services::image();
			if ($imagefile = $this->request->getFiles()) {
				foreach ($imagefile['images'] as $img) {
					if ($img->isValid() && !$img->hasMoved()) {
						$newName = $img->getRandomName();
						if ($img->move('images/slider/full', $newName)) {
							$imageLib->withFile('images/slider/full/' . $newName)->resize(200, 200, true, 'height')->save('images/slider/thumb/' . $newName, 50);
							$imageLib->withFile('images/slider/full/' . $newName)->flip('horizontal')->flip('horizontal')->save('images/slider/full/' . $newName, 50);
							$this->db->table('slider')->insert(['slider_name' => $newName]);
						}
					}
				}
			}
		} elseif ($para1 == 'images') {
			$page_data['images'] = $this->db->table('slider')->orderBy('slider_id', 'desc')->get()->getResult('array');
			return view('back/slider_images', $page_data);
		}
		elseif ($para1 == 'delete') {
			$image = $this->db->table('slider')->getWhere(['slider_id' => $para2])->getRow()->slider_name;
			$this->db->table('slider')->where(['slider_id' => $para2])->delete();
			if ($image) {
				unlink('images/slider/full/' . $image);
				unlink('images/slider/thumb/' . $image);
			}
		}
		else {
			$page_data['page'] = 'slider';
			return view('back/index', $page_data);
		}
	}

	//--------------------------------------------------------------------

}
