<?php
	
	/**
	 * @param String $key
	 * @param String $default
	 * @return mixed
	 */
	function sysConfig(string $key, string $default = ''): mixed
	{
		return \Arrilot\DotEnv\DotEnv::get($key, $default);
	}
	
	/**
	 * @param $name
	 * @return false|string
	 */
	function cookie($name): false|string
	{
		if (isset($_COOKIE[$name])) {
			return rawurldecode($_COOKIE[$name]);
		}
		return false;
	}
	
	/**
	 * @param String $path
	 * @return string
	 */
	function siteUrl(string $path = ''): string
	{
		return sysConfig('BASE_URL') . '/' . $path;
	}
	
	/**
	 * @param $url
	 * @return \Core\Redirect
	 */
	function redirect($url = null): \Core\Redirect
	{
		return \Core\Redirect::getInstance($url);
	}
	
	/**
	 * @param string|null $url
	 * @param string|null $msg
	 * @return void
	 */
	function redirectTo(string $url = null, string $msg = null): void
	{
		if ($msg == null) {
			redirect($url)->send();
		} else {
			redirect($url)->with($msg)->send();
		}
	}
	
	/**
	 * @param $name
	 * @return array|false|string|string[]
	 */
	function post($name): array|false|string
	{
		if (isset($_POST[$name])) {
			if (is_array($_POST[$name])) {
				return array_map(function ($item) {
					return htmlspecialchars(strip_tags(trim($item)));
				}, $_POST[$name]);
			}
			return htmlspecialchars(strip_tags(trim($_POST[$name])));
		}
		return false;
	}
	
	/**
	 * @param $name
	 * @return array|false|string|string[]
	 */
	function get($name): array|false|string
	{
		if (isset($_GET[$name])) {
			if (is_array($_GET[$name])) {
				return array_map(function ($item) {
					return htmlspecialchars(strip_tags(trim($item)));
				}, $_GET[$name]);
			}
			return htmlspecialchars(strip_tags(trim($_GET[$name])));
		}
		return false;
	}
	
	/**
	 * @return \Carbon\Carbon
	 */
	function carbon(): \Carbon\Carbon
	{
		return new \Carbon\Carbon();
	}
	
	/**
	 * @param $path
	 * @return string
	 */
	function themeAssets($path): string
	{
		return siteUrl('themes/' . sysConfig('THEME') . '/assets/') . $path;
	}
	
	/**
	 * @return \Core\Csrf
	 */
	function xssToken(): \Core\Csrf
	{
		return new \Core\Csrf();
	}
	
	/**
	 * @return string
	 */
	function csrf_field(): string
	{
		$response = "<input type='hidden' name='c6id9ecf' value='" . md5(rand(0, 999)) . "'>";
		return $response .= "<input type='hidden' class='form-control' name='_token' value='" . xssToken()->getToken() . "' />";
	}
	
	/**
	 * @return \Core\Auth
	 */
	function auth(): \Core\Auth
	{
		return \Core\Auth::getInstance();
	}
	
	/**
	 * @param $name
	 * @return \Core\Upload
	 */
	function upload($name): \Core\Upload
	{
		return \Core\Upload::getInstance($name);
	}
	
	/**
	 * @param $url
	 * @return \Core\Slug
	 */
	function slug($url): \Core\Slug
	{
		return \Core\Slug::getInstance($url);
	}
	
	/**
	 * @param String $key
	 * @param Array $params
	 * @return String
	 */
	function trans(String $key, Array $params = []): String
	{
		$translate = new \Core\Translate(sysConfig('LOCALE', 'fr'));
		return $translate->translate($key, $params);
	}
