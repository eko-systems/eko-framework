<?php
	
	return [
		// Theme Routes
		'routers' => [
			"/" => "Home@main",
			"/auth/login" => "Auth@login",
			"/auth/register" => "Auth@register",
			"/auth/profile" => "Auth@profile"
		]
	];
