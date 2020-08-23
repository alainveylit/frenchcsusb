<div style="border: 1px solid gray; width: 90%; margin: auto;">
	<h2 style="background: rgba(180,124,140, 0.6); color: white;border-bottom: 1px solid gray;">
		Vous avez un message de votre classe de fran&ccedil;ais</h2>
	<h4><?php echo $User['name'];?>,</h4>
	Vos coordonnées:
	<ul>
		<li>Identifiant: <?php echo $User['username'];?></li>
		<li>Mot de passe: <?php echo $User['password'];?></li>	
	</ul>
	<p>Vous devriez déj&agrave; avoir acc&egrave;s au site sinon, suivez ce lien  
	<?php $url = $this->Html->url(array('controller'=>'users','action'=>'login'),  true);?>
	<?php echo $this->Html->link(__('log in'), $url);?> et complétez votre profil.
	</p>
	<p>Bonne journée!</p>
</div>
