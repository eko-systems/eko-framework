<?php
	
	namespace Core;
	
	use Monolog\Handler\StreamHandler;
	use Monolog\Logger;
	
	class Log
	{
		
		/**
		 * @var Logger
		 */
		public Logger $log;
		
		public function __construct()
		{
			$this->log = new Logger('name');
			$file = dirname(__DIR__) . '/logs/' . slug(carbon()->parse(carbon()->now())->format('Y-m-d'))->generate() . '.log';
			if (file_exists($file)) {
				touch($file);
			}
			$this->log->pushHandler(new StreamHandler($file, Logger::WARNING));
		}
		
		/**
		 * @param $message
		 * @return bool
		 */
		public function warning($message): bool
		{
			$this->log->warning($message);
			return true;
		}
		
		/**
		 * @return void
		 */
		public function autoRun(): void
		{
			$lastErrors = error_get_last();
			if (isset($lastErrors['type']) && isset($lastErrors['message']) && isset($lastErrors['file']) || isset($lastErrors['line'])){
				$type = $lastErrors['type'];
				$message = $lastErrors['message'];
				$file = $lastErrors['file'];
				$line = $lastErrors['line'];
				
				$sentence = 'Type: ' . $type . '; Message: ' . $message . '; File: ' . $file . '; Line: ' . $line . ';';
				$this->warning($sentence);
				die;
			}
		}
	}