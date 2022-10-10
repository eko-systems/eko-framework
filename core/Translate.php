<?php
	
	/**
	 * @author Ebubekir Yazgan
	 * @date 9.10.2022
	 */
	
	namespace Core;
	
	use http\Exception\RuntimeException;
	use Symfony\Component\Translation\Translator;
	use Symfony\Component\Translation\Loader\ArrayLoader;
	
	class Translate
	{
		/**
		 * @var Translator
		 */
		public Translator $translator;
		
		/**
		 * @var string
		 */
		public string $lang;
		
		
		/**
		 * @param String $lang
		 * @throws \RuntimeException
		 */
		public function __construct(string $lang = 'tr')
		{
			$this->lang = $lang;
			if (file_exists(dirname(__DIR__) . '/lang/system/' . $this->lang . '.php')) {
				$a = include dirname(__DIR__) . '/lang/system/' . $this->lang . '.php';
				$this->translator = new Translator($this->lang);
				$this->translator->addLoader('array', new ArrayLoader());
				$this->translator->addResource('array', $a, $this->lang);
			} else {
				throw new RuntimeException('Language File Not Found, File Name: "/lang/system/' . $this->lang . '.php"');
			}
		}
		
		/**
		 * @param string $key
		 * @param array $params
		 * @return string
		 */
		public function translate(string $key, Array $params = []): string
		{
			return $this->translator->trans($key, $params);
		}
		
		
	}