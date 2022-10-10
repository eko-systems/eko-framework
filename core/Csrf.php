<?php
	
	namespace Core;
	
	
	class Csrf
	{
		/**
		 * Token
		 *
		 * @var string|null
		 */
		public $token = null;
		
		public function __construct()
		{
			if (!isset($_POST['c6id9ecf'])) {
				$key = md5(rand(0, 9999));
				$this->token = hash('sha256', $key);
				$_SESSION['_token'] = $this->token;
			}
		}
		
		/**
		 * Get Token Value
		 *
		 * @return mixed|string|null
		 */
		public function getToken(): mixed
		{
			if ($this->token !== null) {
				return $this->token;
			}
			return $_SESSION['_token'];
		}
		
		/**
		 * Token Check, match or not
		 *
		 * @return bool
		 */
		public function isVerify(): bool
		{
			if (isset($_POST['c6id9ecf'])) {
				if ($_POST['_token'] == $this->getToken()) {
					return true;
				}
				redirect()->with('Güvenlik Açığı Nedeniyle Engellendiniz')->send();
				die;
			}
			redirect()->with('Güvenlik Açığı Nedeniyle Engellendiniz')->send();
			die;
		}
	}