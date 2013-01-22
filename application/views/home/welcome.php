<?php
$this->load->view('header');
	if(!$this->session->userdata('pseudo')){
?>
<h3>
	<center>Vous n'êtes pas connecté.</center>
</h3>

<p>
	Connectez-vous ci-dessous ou créez un compte <a href="<?php echo site_url('register'); ?>">ici</a>.
</p>

<form method="post" action="<?php echo site_url('home/login'); ?>">
Nom de compte : <input type="text" name="ndc"/><br/>
Mot de passe : <input type="password" name="mdp"/><br/>
<input type="submit" name="connection" value="Connexion" />
</form>

<?php } ?>