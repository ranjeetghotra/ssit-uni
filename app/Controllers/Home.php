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

	public function form($para1 = ''){
		if($para1 == 'contact') {
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
		} elseif($para1 == 'admission') {
			$data['admission_name'] = $this->request->getPost('name');
			$data['admission_phone'] = $this->request->getPost('phone');
			$data['admission_level'] = $this->request->getPost('level');
			$data['admission_course'] = $this->request->getPost('course');
			$data['admission_created_at'] = date('Y-m-d H:i:s');
			$this->db->table('admission')->insert($data);
			$output['success'] = true;
			$output['message'] = 'Successfully Submitted';
			echo json_encode($output);
		}
	}

	//--------------------------------------------------------------------

}
