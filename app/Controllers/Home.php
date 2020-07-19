<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$page_data['news'] = $this->db->table('news')->orderBy('news_id', 'desc')->limit(3)->get()->getResult('array');
		$page_data['event'] = $this->db->table('event')->where('event_date >= CURDATE()')->orderBy('event_date', 'asc')->limit(3)->get()->getResult('array');
		$page_data['images'] = $this->db->table('slider')->orderBy('slider_id', 'desc')->get()->getResult('array');
		$page_data['gallery'] = $this->db->table('gallery')->orderBy('gallery_id', 'desc')->limit(14)->get()->getResult('array');
		$page_data['page'] = "home";
		return view('front/index', $page_data);
	}
	public function page($page, $title = false)
	{
		if($title) {
			$page_data['title'] = $title;
		}
		$page_data['page'] = 'pages/' . $page;
		return view('front/index', $page_data);
	}

	public function form($para1 = '')
	{
		if ($para1 == 'contact') {
			$data['contact_name'] = $this->request->getPost('name');
			$data['contact_phone'] = $this->request->getPost('phone');
			$data['contact_email'] = $this->request->getPost('email');
			$data['contact_subject'] = $this->request->getPost('subject');
			$data['contact_message'] = $this->request->getPost('message');
			$data['contact_created_at'] = date('Y-m-d H:i:s');
			$this->db->table('contact')->insert($data);
			$output['success'] = true;
			$output['message'] = 'Successfully Submitted';
			echo json_encode($output);
		} elseif ($para1 == 'admission') {
			$data['admission_name'] = $this->request->getPost('name');
			$data['admission_phone'] = $this->request->getPost('phone');
			$data['admission_email'] = $this->request->getPost('email');
			$data['admission_city'] = $this->request->getPost('city');
			$data['admission_course'] = $this->request->getPost('course');
			$data['admission_created_at'] = date('Y-m-d H:i:s');
			$this->db->table('admission')->insert($data);
			$output['success'] = true;
			$output['message'] = 'Successfully Submitted';
			echo json_encode($output);
		} elseif ($para1 == 'newsletter') {
			$data['newsletter_email'] = $this->request->getPost('email');
			$data['newsletter_created_at'] = date('Y-m-d H:i:s');
			$this->db->table('newsletter')->insert($data);
			$output['success'] = true;
			$output['message'] = 'Successfully Subscribed';
			echo json_encode($output);
		}
	}

	//--------------------------------------------------------------------

}
