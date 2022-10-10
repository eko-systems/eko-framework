<?php
	
	
	namespace Core;
	
	use Arrilot\DotEnv\DotEnv;
	use Ausi\SlugGenerator\SlugGenerator;
	use Buki\Router\Router;
	use Carbon\Carbon;
	use Core\Database;
	use Valitron\Validator;
	
	class App
	{
		public View $view;
		public Database $db;
		public Carbon $carbon;
		public Validator $validator;
		public Slug $logger;
		
		public function __construct()
		{
			// Load Environments
			DotEnv::load(dirname(__DIR__) . '/.env.php');
			
			
			
			// Form Validation
			$this->validator = new Validator($_POST);
			Validator::langDir(dirname(__DIR__) . '/lang/validator/');
			Validator::lang('tr');
			
			// Start View
			$this->view = new View($this->validator, $this->env('THEME', 'default'));
			
			Carbon::setLocale(sysConfig('LOCALE', 'en'));
			
			// Connect Database
			$this->db = new Database(
				$this->env('DB_DIR', __DIR__ . '/database'),
				$this->env('DB_USERNAME', 'root'),
				$this->env('DB_PASSWORD', 'root')
			);
		}
		
		/**
		 * @param $key
		 * @param $default
		 * @return mixed
		 */
		public function env($key, $default = null)
		{
			return DotEnv::get($key, $default);
		}
	}