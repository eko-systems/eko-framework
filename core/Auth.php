<?php
	
	namespace Core;
	
	use Aura\Session\SessionFactory;
	
	class Auth
	{
		
		public \Aura\Session\Segment $segment;
		private static $instance;
		
		public static function getInstance()
		{
			if (!isset(self::$instance)){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		
		public function __construct()
		{
			$session_factory = new SessionFactory();
			$session = $session_factory->newInstance($_COOKIE);
			$this->segment = $session->getSegment('Socore\Auth');
		}
	}
