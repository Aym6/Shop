<?php
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

<?php } else { ?>
<h3>
	<center>Bienvenue <?php echo $this->session->userdata('pseudo'); ?></center>
</h3>
<h4>Vous avez <b><?php echo $this->session->userdata('points'); ?></b> points</h4>
			<ul>
			<li><a href="<?php echo site_url('home'); ?>">Accueil</a></li>
			<li><a href="<?php echo site_url('products'); ?>">Produits</a></li>
			<li><a href="<?php echo site_url('points'); ?>">Acheter des points</a></li>
			<li><a href="<?php echo site_url('home/logout'); ?>">Déconnexion</a></li>
			</ul>
			<?php }
			$this->load->view('footer');