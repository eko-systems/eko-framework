<?php
	
	namespace Core;
	
	use Symfony\Component\HttpFoundation\RedirectResponse;
	
	class Redirect
	{
		/**
		 * @var Redirect
		 */
		private static Redirect $instance;
		
		/**
		 * @var int
		 */
		public int $statusCode = 302;
		
		/**
		 * @var string|mixed
		 */
		public string $url;
		
		/**
		 * @param mixed $url
		 * @return Redirect
		 */
		public static function getInstance(Mixed $url = null): Redirect
		{
			if (!isset(self::$instance)) {
				self::$instance = new self($url);
			}
			return self::$instance;
		}
		
		/**
		 * @param $url
		 */
		public function __construct($url = null)
		{
			$this->url = $url ?? siteUrl();
		}
		
		/**
		 * @param string $msg
		 * @return $this
		 */
		public function with(string $msg): Redirect
		{
			setcookie('msg', rawurlencode($msg), time() + 1, '/');
			return $this;
		}
		
		/**
		 * @deprecated deprecated since dev-version
		 * @param int $code
		 * @return Redirect
		 */
		public function setStatusCode(int $code): Redirect
		{
			$this->statusCode = (int)$code;
			return $this;
		}
		
		/**
		 * @return void
		 */
		public function send(): void
		{
			if ($this->url === 'referer') {
				$this->url = $_SERVER['HTTP_REFERER'] ?? siteUrl();
			}
			http_response_code($this->statusCode);
			$redirect = new RedirectResponse($this->url);
			$redirect->send();
		}
		
	}