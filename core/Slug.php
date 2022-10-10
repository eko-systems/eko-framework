<?php
	
	namespace Core;
	
	use Ausi\SlugGenerator\SlugGenerator;
	
	class Slug
	{
		
		/**
		 * @var Slug
		 */
		private static Slug $instance;
		
		/**
		 * @var String
		 */
		public string $url;
		
		/**
		 * @var SlugGenerator
		 */
		public SlugGenerator $slug;
		
		/**
		 * @param $url
		 * @return Slug
		 */
		public static function getInstance($url): Slug
		{
			if (!isset(self::$instance)) {
				self::$instance = new self($url);
			}
			return self::$instance;
		}
		
		/**
		 * @param $url
		 */
		public function __construct($url)
		{
			$this->slug = new SlugGenerator();
			$this->url = $url;
		}
		
		/**
		 * @return string
		 */
		public function generate(): string
		{
			return $this->slug->generate($this->url);
		}
	}