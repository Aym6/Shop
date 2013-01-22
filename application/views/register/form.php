<?php $this->load->view('header.php');
 ?>
<center><h3>Créer un compte</h3></center>
<form method="post" action="<?php echo site_url('register/trait'); ?>">
Nom de compte : <input type="text" name="ndc"/><br/>
Mot de passe : <input type="password" name="password"/><br/>
Mot de passe (confirmation) : <input type="password" name="password2"/><br/>
Recopiez <img src="<?php echo site_url('captcha/get'); ?>" /> : <input type="text" name="cap" /> (code anti-bot)<br />
<input type="submit" name="register" value="Inscription" />
</form>

<?php $this->load->view('footer');