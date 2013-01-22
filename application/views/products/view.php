<?php

$this->load->view('header');
?>
<center><b>{count} produits</b></center>
{products}
<fieldset>
<legend>{name}</legend>
{price} crédit(s)<br/>
Description:<br/>
{description}<br/>
<a href="<?php echo site_url('products/buy/'); ?>/{id}">Acheter</a>
</fieldset>
{/products}

<?php $this->load->view('footer'); ?>