<?php
	
	namespace Core;
	
	class Controller extends App
	{
		public function view($view, $data = [])
		{
			$others = [
				'url' => $this->url()
			];
			$data = array_merge($data, $others);
			return $this->view->show($view, $data);
		}
		
		
		/**
		 * @param String $path
		 * @return String
		 */
		public function url(String $path = '/'): string
		{
			return $this->env('BASE_URL', 'http://localhost/eko-freamwork') . $path;
		}
	}
	