<?php
	
	
	namespace Core;
	
	use Jenssegers\Blade\Blade;
	use Valitron\Validator;
	
	class View
	{
		
		/**
		 * @var mixed|string
		 */
		public Mixed $path;
		
		/**
		 * @var Validator
		 */
		public Validator $validator;
		
		/**
		 * @param Validator $validator
		 * @param $theme
		 */
		public function __construct(Validator $validator, $theme = null)
		{
			if ($theme !== null) {
				$this->path = dirname(__DIR__) . '/themes/' . $theme;
			}
			$this->validator = $validator;
		}
		
		/**
		 * @param $view
		 * @param $data
		 * @return string
		 */
		public function show($view, $data = []): string
		{
			if ($this->path == null) {
				$viewPath = dirname(__DIR__) . '/public/views/';
				$cachePath = dirname(__DIR__) . '/public/cache/';
			} else {
				$viewPath = $this->path . '/view/';
				$cachePath = $this->path . '/cache/';
			}
			$blade = new Blade($viewPath, $cachePath);
			
			// Share $error variable
			$blade->share('errors', $this->validator->errors());
			
			// getError directive
			$blade->directive('getError', function ($name) {
				return '<?php if (isset($errors[' . $name . '])): ?><div class="getValidatorError"><?=$errors[' . $name . '][0]?></div><?php endif; ?>';
			});
			
			// Translate Directive
			$blade->directive('trans', function ($key) {
				return '<?php echo trans("' . $key . '") ?>';
			});
			return $blade->render($view, $data);
		}
	}