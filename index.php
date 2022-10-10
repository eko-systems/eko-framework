<?php
	
	ob_start();
	session_start();
	
	// using
	use \Core\{App, Theme};
	
	// Require Composer Packages and Eko Core
	require __DIR__ . '/vendor/autoload.php';
	
	// Error Handler Register
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	
	// Require Theme Controllers
	foreach (glob('themes/*/controller/*') as $file) {
		require $file;
	}
	
	// Run All Apps
	$app = new App();
	
	date_default_timezone_set(sysConfig('TIMEZONE'));
	
	$theme = new Theme($app->env('THEME', 'default'));
	$log = new \Core\Log();
