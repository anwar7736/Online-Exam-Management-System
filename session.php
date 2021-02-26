<?php 
	class Session
	{
		
		public static function init(){
			session_start();
		}
		public static function set($key, $val){
			$_SESSION[$key] = $val;
		}
		public static function get($key){
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}else{
				return false;
			}
			
		}
		public static function checkSession(){
			self::init();
			if (self::get("login")==false) {
				self::destroy();
				header("location:login.php");
			}
		}
		public static function checkLogin(){
			self::init();
			if (self::get("login")==true) {
				header("location:home.php");
			}
		}
		public static function checkSessionUser(){
			self::init();
			if (self::get("loginUser")==false) {
				self::destroy();
				header("location:ulogin.php");
			}
		}
		public static function checkLoginUser(){
			self::init();
			if (self::get("loginUser")==true) {
				header("location:uhome.php");
			}
		}
		public static function destroy(){
				session_destroy();
				session_unset();
				header("location:login.php");
		}
		public static function destroyUser(){
				session_destroy();
				session_unset();
				header("location:ulogin.php");
		}
		
	}


?>