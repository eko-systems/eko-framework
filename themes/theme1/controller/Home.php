<?php
	
	namespace themes\theme1\controller;
	
	use Carbon\Carbon;
	use Core\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	class Home extends Controller
	{
		public function main(Request $request)
		{
			if ($request->getMethod() === 'POST') {
				xssToken()->isVerify();
				$this->validator->rule('required', ['content', 'contentAdded']);
				$this->validator->labels([
					'content' => 'İçerik'
				]);
				
				if ($this->validator->validate()) {
					$image = upload('content_image')
						->resize(1144, 720)
						->convert('webp')
						->rename(md5(rand(0, 9999)) . md5(rand(0, 9999)))
						->to('upload/')
						->getFile();
					
					$status = $this->db->insert('contents', [
						'content' => post('content'),
						'contentAdded' => post('contentAdded'),
						'contentDate' => Carbon::now(),
						'contentImage' => $image
					]);
					if ($status) {
						redirect()
							->with('İçerik Başarıyla Eklendi')
							->send();
					} else {
						redirect()
							->with('İçerik Eklenirken Bir Sorun Oluştu')
							->send();
					}
				}
			}
			
			// Viewing
			return $this->view('index', [
				'contents' => $this->db->select([0, 0], 'contents', 'all')
			]);
		}
	}