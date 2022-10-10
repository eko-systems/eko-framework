<?php
	
	
	namespace themes\theme1\controller;
	
	use Core\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	class Auth extends Controller
	{
		/**
		 * @return string
		 * @throws \EkoDb\Exceptions\IOException
		 * @throws \EkoDb\Exceptions\InvalidArgumentException
		 */
		public function login(): string
		{
			if (post('_token')) {
				// Token Control
				xssToken()->isVerify();
				
				$this->validator->rule('required', ['user_name', 'user_password']);
				$this->validator->labels([
					'user_name' => trans('Kullanıcı Adı'),
					'user_password' => trans('Şifre')
				]);
				
				if ($this->validator->validate()) {
					$users = $this->db->select(['user_name', post('user_name')], 'users', 'where');
					if (count($users) > 0) {
						foreach ($users as $user) {
							if ($user['user_password'] == post('user_password')) {
								
								auth()->segment->set('user_name', post('user_name'));
								
								redirect()
									->with(trans('Hoşgeldin <b>user_name</b>, Başarıyla Giriş Yaptın', [
										'user_name' => post('user_name')
									]))
									->send();
							} else {
								redirect()
									->with(trans('Kullanıcı Bulunamadı veya Bilgileriniz Hatalı'))
									->send();
							}
						}
					} else {
						redirect()
							->with(trans('Kullanıcı Bulunamadı veya Bilgileriniz Hatalı'))
							->send();
					}
				}
			}
			return $this->view('auth.login');
		}
		
		/**
		 * @param Request $request
		 * @return String
		 */
		public function register(Request $request): string
		{
			if (post('_token')) {
				// Token Control
				$this->validator->rule('required', ['userName', 'nameSurname', 'userPassword']);
				$this->validator->rule('email', 'userName');
				$this->validator->labels([
					'userName' => 'E-Posta',
					'name_surname' => 'Ad Soyad',
					'user_password' => 'Parola'
				]);
				
				if ($this->validator->validate()) {
					xssToken()->isVerify();
					$status = $this->db->insert('users', [
						'user_name' => post('userName'),
						'name_surname' => post('nameSurname'),
						'user_password' => post('userPassword')
					]);
					if ($status) {
						redirect(siteUrl('auth/login'))
							->with('Kullanıcı Kaydı Başarılı...')
							->send();
					} else {
						redirect()
							->with('Kayıt Oluşturulurken Bir Sorun Oluştu...')
							->send();
					}
				}
			}
			return $this->view('auth.register');
		}
		
		/**
		 * @return string
		 */
		public function profile(): string
		{
			if (!auth()->segment->get('user_name')) {
				// Redirect
				redirectTo(siteUrl('auth/login'), 'Profil Alanına Girebilmek İçin Giriş Yapınız');
			}
			
			
			if (post('_token')) {
				auth()->segment->clear();
				
				// Redirect
				redirectTo(null, 'Çıkış İşleminiz Başarıyla Yapıldı');
			}
			return $this->view('auth.profile');
		}
	}