<?php
class Captcha extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	public function get()
	{
		header("Content-type: image/png");
		
		$this->load->library('session');
	
		$captcha = substr(strtoupper(sha1(mt_rand(0,pow(10,5)-1))),0,6);
		
		
		$this->session->set_userdata(array("captcha" => $captcha));
		
		$largeur = strlen($captcha) * 10;
		$hauteur = 20;
			
		$img = imagecreate($largeur, $hauteur);
		
		$blanc = imagecolorallocate($img, 255, 255, 255); 
		$noir = imagecolorallocate($img, 0, 0, 0);
		
		$milieuHauteur = ($hauteur / 2) - 3;
		
		imagestring($img, 6, strlen($captcha) /2 , $milieuHauteur, $captcha, $noir);
		imagecolortransparent($img, $blanc);

		imagepng($img);
		imagedestroy($img);
	}
}
