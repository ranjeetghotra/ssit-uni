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
		$page_data['count']['admission'] = $this->db->table('admission')->countAll();
		$page_data['count']['contact'] = $this->db->table('contact')->countAll();
		$page_data['count']['gallery'] = $this->db->table('gallery')->countAll();
		$page_data['count']['press'] = $this->db->table('press')->countAll();
		$page_data['table']['admission'] = $this->db->table('admission')->limit(5)->orderBy('admission_id', 'desc')->get()->getResult('array');
		$page_data['table']['contact'] = $this->db->table('contact')->limit(5)->orderBy('contact_id', 'desc')->get()->getResult('array');
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
		} elseif ($para1 == 'delete') {
			$image = $this->db->table('gallery')->getWhere(['gallery_id' => $para2])->getRow()->gallery_name;
			$this->db->table('gallery')->where(['gallery_id' => $para2])->delete();
			if ($image) {
				if (file_exists('images/gallery/full/' . $image)) {
					unlink('images/gallery/full/' . $image);
				}
				if (file_exists('images/gallery/thumb/' . $image)) {
					unlink('images/gallery/thumb/' . $image);
				}
			}
		} else {
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
		} elseif ($para1 == 'delete') {
			$image = $this->db->table('press')->getWhere(['press_id' => $para2])->getRow()->press_name;
			$this->db->table('press')->where(['press_id' => $para2])->delete();
			if ($image) {
				if (file_exists('images/press/full/' . $image)) {
					unlink('images/press/full/' . $image);
				}
				if (file_exists('images/press/thumb/' . $image)) {
					unlink('images/press/thumb/' . $image);
				};
			}
		} else {
			$page_data['page'] = 'press';
			return view('back/index', $page_data);
		}
	}
	public function page($para1 = '', $para2 = '')
	{
		if ($para1 == 'new') {
			$page_data['page'] = 'page_new';
			return view('back/index', $page_data);
		} elseif ($para1 == 'list_data') {
			$limit = $this->request->getPost('length');
			$start = $this->request->getPost('start');
			$search = $this->request->getPost('search')['value'];
			$order = $this->request->getPost('order')[0]['column'];
			$dir = $this->request->getPost('order')[0]['dir'];
			$data = array();

			$builder = $this->db->table('page');
			if ($search) {
				// $builder->like('subcat_name', $search, 'both');
				// $builder->orlike('category_name', $search, 'both');
			}
			// $subcat = $builder->join('category', 'subcat.subcat_category = category.category_id')->get()->getResult('array');
			$builder->orderBy('page_id', 'desc');
			$contact = $builder->get()->getResult('array');
			$i = $start;
			foreach (array_slice($contact, $start, $limit) as $item) {
				$p = array();
				$p[] = ++$i;
				$p[] = $item['page_title'];
				$p[] = ucfirst($item['page_type']);
				$p[] = 'page/' . $item['page_slug'];
				$p[] = '<div class="dropdown show"><a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>'
					. '<div class="dropdown-menu" style="min-width:inherit" aria-labelledby="dropdownMenuLink">'
					//. '<li data-toggle="modal" data-target="#viewModal" data-id="' . $item['contact_id'] . '" data-subject="' . $item['admission_subject'] . '" class="dropdown-item item-view"><i class="fas fa-eye fa-sm mr-2"></i>Edit</li>'
					. '<li data-id="' . $item['page_id'] . '" class="dropdown-item text-white bg-danger item-delete"><i class="fas fa-trash fa-sm mr-2"></i>Delete</li>'
					. '</div></div>';
				$data[] = $p;
			}
			$output["draw"] = intval($this->request->getPost('draw'));
			$output['recordsTotal'] = count($contact);
			$output['recordsFiltered'] = count($contact);
			$output['data'] = $data;
			return json_encode($output, true);
		} elseif ($para1 == 'insert') {
			$data['page_title'] = $this->request->getPost('title');
			$data['page_type'] = $this->request->getPost('type');
			$data['page_content'] = $this->request->getPost('content');
			$data['page_slug'] = url_title($this->request->getPost('title'));
			$data['page_created_at'] = date('Y-m-d H:i:s');
			$page_data['page'] = 'page_new';

			$imageArray = [];
			$imageLib = \Config\Services::image();
			if ($imagefile = $this->request->getFiles()) {
				foreach ($imagefile['images'] as $img) {
					if ($img->isValid() && !$img->hasMoved()) {
						$newName = $img->getRandomName();
						if ($img->move('images/page/full', $newName)) {
							$imageLib->withFile('images/page/full/' . $newName)->flip('horizontal')->flip('horizontal')->save('images/press/full/' . $newName, 50);
							// $this->db->table('press')->insert(['press_name' => $newName]);
							$imageArray[] = $newName;
						}
					}
				}
			}
			$data['page_image'] = json_encode($imageArray);
			$this->db->table('page')->insert($data);
			$output['success'] = true;
			$output['message'] = "Page Created";
			echo json_encode($output);
		} elseif ($para1 == 'delete') {
			$images = (array) json_decode($this->db->table('page')->getWhere(['page_id' => $para2])->getRow()->page_image);
			$this->db->table('page')->where(['page_id' => $para2])->delete();
			foreach ($images as $image) {
				if ($image) {
					if (file_exists('images/page/full/' . $image)) {
						unlink('images/page/full/' . $image);
					}
				}
			}
		} else {
			$page_data['page'] = 'page';
			return view('back/index', $page_data);
		}
	}
	public function admission($para1 = '', $para2 = '')
	{
		if ($para1 == "delete") {
			$this->db->table('admission')->where(['admission_id' => $para2])->delete();
		} elseif ($para1 == "list_data") {
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
				$p[] = $item['admission_city'];
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
		} else {
			$page['page'] = 'admission';
			return view('back/index', $page);
		}
	}
	public function contact($para1 = '', $para2 = '')
	{
		if ($para1 == "message") {
			return $this->db->table('contact')->getWhere(['contact_id' => $para2])->getRow()->contact_message;
		} elseif ($para1 == "delete") {
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
					. '<li data-toggle="modal" data-target="#viewModal" data-id="' . $item['contact_id'] . '" data-subject="' . $item['contact_subject'] . '" class="dropdown-item item-view"><i class="fas fa-eye fa-sm mr-2"></i>View</li>'
					. '<li data-id="' . $item['contact_id'] . '" class="dropdown-item text-white bg-danger item-delete"><i class="fas fa-trash fa-sm mr-2"></i>Delete</li>'
					. '</div></div>';
				$data[] = $p;
			}
			$output["draw"] = intval($this->request->getPost('draw'));
			$output['recordsTotal'] = count($contact);
			$output['recordsFiltered'] = count($contact);
			$output['data'] = $data;
			return json_encode($output, true);
		} else {
			$page['page'] = 'contact';
			return view('back/index', $page);
		}
	}
	public function event($para1 = '', $para2 = '')
	{
		if ($para1 == "delete") {
			$this->db->table('event')->where(['event_id' => $para2])->delete();
		} elseif ($para1 == 'new') {
			$data['event_title'] = $this->request->getPost('title');
			$data['event_detail'] = $this->request->getPost('detail');
			$data['event_date'] = $this->request->getPost('date');
			$data['event_created_at'] = date('Y-m-d H:i:s');
			$this->db->table('event')->insert($data);
			$output['success'] = true;
			$output['message'] = 'Successfully Submitted';
			echo json_encode($output);
		} elseif ($para1 == "list_data") {
			// $contact = $this->db->table('contact')->orderBy('contact_id', 'desc')->get()->getResult('array');
			$limit = $this->request->getPost('length');
			$start = $this->request->getPost('start');
			$search = $this->request->getPost('search')['value'];
			$order = $this->request->getPost('order')[0]['column'];
			$dir = $this->request->getPost('order')[0]['dir'];
			$data = array();

			$builder = $this->db->table('event');
			if ($search) {
				// $builder->like('subcat_name', $search, 'both');
				// $builder->orlike('category_name', $search, 'both');
			}
			// $subcat = $builder->join('category', 'subcat.subcat_category = category.category_id')->get()->getResult('array');
			$builder->orderBy('event_id', 'desc');
			$contact = $builder->get()->getResult('array');
			$i = $start;
			foreach (array_slice($contact, $start, $limit) as $item) {
				$p = array();
				$p[] = ++$i;
				$p[] = $item['event_title'];
				$p[] = date('j M Y', strtotime($item['event_date']));
				$p[] = '<div class="dropdown show"><a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>'
					. '<div class="dropdown-menu" style="min-width:inherit" aria-labelledby="dropdownMenuLink">'
					// . '<li data-toggle="modal" data-target="#viewModal" data-id="' . $item['event_id'] . '" data-subject="' . $item['contact_subject'] . '" class="dropdown-item item-view"><i class="fas fa-eye fa-sm mr-2"></i>Edit</li>'
					. '<li data-id="' . $item['event_id'] . '" class="dropdown-item text-white bg-danger item-delete"><i class="fas fa-trash fa-sm mr-2"></i>Delete</li>'
					. '</div></div>';
				$data[] = $p;
			}
			$output["draw"] = intval($this->request->getPost('draw'));
			$output['recordsTotal'] = count($contact);
			$output['recordsFiltered'] = count($contact);
			$output['data'] = $data;
			return json_encode($output, true);
		} else {
			$page['page'] = 'event';
			return view('back/index', $page);
		}
	}
	public function news($para1 = '', $para2 = '')
	{
		if ($para1 == "delete") {
			$this->db->table('news')->where(['news_id' => $para2])->delete();
		} elseif ($para1 == 'new') {
			$data['news_title'] = $this->request->getPost('news');
			$data['news_detail'] = $this->request->getPost('detail');
			$data['news_created_at'] = date('Y-m-d H:i:s');
			$this->db->table('news')->insert($data);
			$output['success'] = true;
			$output['message'] = 'Successfully Submitted';
			echo json_encode($output);
		} elseif ($para1 == "list_data") {
			// $contact = $this->db->table('contact')->orderBy('contact_id', 'desc')->get()->getResult('array');
			$limit = $this->request->getPost('length');
			$start = $this->request->getPost('start');
			$search = $this->request->getPost('search')['value'];
			$order = $this->request->getPost('order')[0]['column'];
			$dir = $this->request->getPost('order')[0]['dir'];
			$data = array();

			$builder = $this->db->table('news');
			if ($search) {
				// $builder->like('subcat_name', $search, 'both');
				// $builder->orlike('category_name', $search, 'both');
			}
			// $subcat = $builder->join('category', 'subcat.subcat_category = category.category_id')->get()->getResult('array');
			$builder->orderBy('news_id', 'desc');
			$contact = $builder->get()->getResult('array');
			$i = $start;
			foreach (array_slice($contact, $start, $limit) as $item) {
				$p = array();
				$p[] = ++$i;
				$p[] = $item['news_title'];
				$p[] = date('j M Y / h:i A', strtotime($item['news_created_at']));
				$p[] = '<div class="dropdown show"><a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>'
					. '<div class="dropdown-menu" style="min-width:inherit" aria-labelledby="dropdownMenuLink">'
					// . '<li data-toggle="modal" data-target="#viewModal" data-id="' . $item['contact_id'] . '" data-subject="' . $item['contact_subject'] . '" class="dropdown-item item-view"><i class="fas fa-eye fa-sm mr-2"></i>Edit</li>'
					. '<li data-id="' . $item['news_id'] . '" class="dropdown-item text-white bg-danger item-delete"><i class="fas fa-trash fa-sm mr-2"></i>Delete</li>'
					. '</div></div>';
				$data[] = $p;
			}
			$output["draw"] = intval($this->request->getPost('draw'));
			$output['recordsTotal'] = count($contact);
			$output['recordsFiltered'] = count($contact);
			$output['data'] = $data;
			return json_encode($output, true);
		} else {
			$page['page'] = 'news';
			return view('back/index', $page);
		}
	}
	public function setting($para1 = '')
	{
		if ($para1 == 'password') {
			$oldPassword = $this->request->getPost('currentPassword');
			$newPassword = $this->request->getPost('newPassword');
			$confirmPassword = $this->request->getPost('confirmPassword');
			$dbPass = $this->db->table('admin')->getWhere(['admin_id' => $this->session->get('admin_id')])->getRow()->admin_password;
			if ($newPassword !== $confirmPassword) {
				$output['success'] = false;
				$output['message'] = "Confirm Password Mismatched";
			} elseif (strlen($newPassword) < 6) {
				$output['success'] = false;
				$output['message'] = "Password is less than 6";
			} elseif (md5($oldPassword) !== $dbPass) {
				$output['success'] = false;
				$output['message'] = "Old Password Mismatched";
			} else {
				$output['success'] = true;
				$output['message'] = "Password Changed";
			}
			echo json_encode($output);
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
		} elseif ($para1 == 'delete') {
			$image = $this->db->table('slider')->getWhere(['slider_id' => $para2])->getRow()->slider_name;
			$this->db->table('slider')->where(['slider_id' => $para2])->delete();
			if ($image) {
				if (file_exists('images/slider/full/' . $image)) {
					unlink('images/slider/full/' . $image);
				}
				if (file_exists('images/slider/thumb/' . $image)) {
					unlink('images/slider/thumb/' . $image);
				}
			}
		} else {
			$page_data['page'] = 'slider';
			return view('back/index', $page_data);
		}
	}

	//--------------------------------------------------------------------

}
