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
	public function course($page)
	{
		$page_data['page'] = 'course/' . $page;
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
	public function pages($page)
	{
		$page_data['prow'] = $this->db->table('page')->where('page_slug', $page)->get()->getRowArray();
		$page_data['title'] = $page_data['prow']['page_title'];
		$page_data['page'] = 'pages/page';
		return view('front/index', $page_data);
	}

	public function event($id)
	{
		$page_data['event'] = $this->db->table('event')->where('event_id' , $id)->get()->getRowArray();
		$page_data['title'] = $page_data['event']['event_title'];
		$page_data['page'] = 'pages/event_detail';
		return view('front/index', $page_data);
	}

	public function news($id)
	{
		$page_data['news'] = $this->db->table('news')->where('news_id' , $id)->get()->getRowArray();
		$page_data['title'] = $page_data['news']['news_title'];
		$page_data['page'] = 'pages/news_detail';
		return view('front/index', $page_data);
	}

	public function form($para1 = '')
	{
		$this->email = \Config\Services::email();
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
			$message = "Name: ". $this->request->getPost('name') . "<br>";
			$message .= "Phone: ". $this->request->getPost('phone') . "<br>";
			$message .= "Email: ". $this->request->getPost('email') . "<br>";
			$message .= "Subject: ". $this->request->getPost('subject') . "<br>";
			$message .= "Message: ". $this->request->getPost('message') . "<br>";
			$this->email->setFrom('noreply@srisaiiot.com', "SSIT Website");
			$this->email->setTo('info@srisaiiot.com', "SSIT Contact");
			$this->email->setSubject("SSIT Contact");
			$this->email->setMessage($message);
			$this->email->send();
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
			$message = "Name: ". $this->request->getPost('name') . "<br>";
			$message .= "Phone: ". $this->request->getPost('phone') . "<br>";
			$message .= "Email: ". $this->request->getPost('email') . "<br>";
			$message .= "City: ". $this->request->getPost('city') . "<br>";
			$message .= "Course: ". $this->request->getPost('course') . "<br>";
			$this->email->setFrom('noreply@srisaiiot.com', "SSIT Website");
			$this->email->setTo('admission@srisaiiot.com', "SSIT Admission");
			$this->email->setSubject("SSIT Admission");
			$this->email->setMessage($message);
			$this->email->send();
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
