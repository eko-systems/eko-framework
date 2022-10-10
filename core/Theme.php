<?php
	
	namespace Core;
	
	use Arrilot\DotEnv\DotEnv;
	use Buki\Router\Router;
	
	class Theme
	{
		// Tema Ana Klasör
		public $dir;
		
		// Proje Ana Klasör
		public $mainDir;
		
		// Tema Adı
		public $themeName;
		
		public function __construct($themeName)
		{
			$this->themeName = $themeName;                                  // Tema Adı
			$this->mainDir = dirname(__DIR__);                        // Proje Ana Klasör
			$this->dir = $this->mainDir . '/themes/' . $this->themeName;    // Tema Ana Klasör
			DotEnv::load($this->dir . '/.env.php');                 // Tema env Dosyası
			$this->router = new Router([
				"paths" => [
					'controllers' => 'themes/' . $this->themeName . '/controller/'
				],
				"namespaces" => [
					"controllers" => 'themes\\' . $this->themeName . '\controller'
				]
			]);
			$this->routes();
		}
		
		public function routes()
		{
			$routers = $this->getEnv('routers');
			foreach ($routers as $path => $fnName)
			{
				$this->router->any($path, $fnName);
			}
			$this->router->run();
		}
		
		/**
		 * @param $key
		 * @param $default
		 * @return mixed
		 */
		public function getEnv($key, $default = null): mixed
		{
			// Tema Env Dosyasından Verileri Alabilmek...
			return DotEnv::get($key, $default);
		}
	}