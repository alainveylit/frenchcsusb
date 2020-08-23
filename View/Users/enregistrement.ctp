<style>
.captcha { margin: 1em 0;   }
.captcha { width: 48%; float: right; }
.fixed-input label { padding-right: 12px; }
.fixed-input div.captcha div { clear: both; }
#captcha { float: right; background: lightgray; }
#UserCaptcha { float: none; width: 100px; }
.popup { display: none; text-align: left; position: absolute; background: gray; color: white; padding: 2em 1em; }
.close { background: lightgreen; border: 1px solid white; cursor: hand; float: right; padding: 8px 12px; } 
form { font-size: 80%; color: #335; }
.fixed-input input { width: 400px; }
fieldset { margin: 0 }
legend { margin-bottom: 10px; }
.banner-image { display: inline-block; }
.cartouche { overflow: auto; margin: 0; }
legend { margin-bottom: 2em; position: relative; }
.inset { padding-top: 50px; }
.banner { background: rgba(200, 210, 245, .75); box-shadow: 1px 3px 1px lightgray; padding: 8px 4px; }
</style>

<div class="container">
	<?php //debug($cours);?>
	<div class="banner check">Bienvenue au cours de <?php echo $cours['Cour']['titre'];?> du professeur 
		<a href="mailto:<?php echo $cours['Professeur']['courriel'];?>">
			<?php echo $cours['Professeur']['prenom'];?> 
			<?php echo $cours['Professeur']['nom'];?>
		</a> &agrave; CSUSB</div>
		
	<div class="row panel centered">
	
	<?php //debug($this->request['data']);?>
		<img src="/css/images/paris.jpg" width="25%" class="inset">

		<div class="input-group centered __input-sm">			
		
		<?php echo $this->Form->create('User', array('class'=>'__form-horizontal', 'role'=>'__form'));?>

		<?php $roles=array('Admin'=>'Admin','Professeur'=>'Professeur', 'User'=>'User'); ?>
			<legend><?php echo $this->Html->link(__('Pourquoi s\'enregistrer ici?'), 'javascript:', array('class'=>'explain'));?></legend>		
					<div class="popup">		
						<p><a href="javascript:" class="close" title="Close this"> X </a></p>
						<h2>Enregistrez-vous!</h2>
							<p>Ce site vous offrira:</p>
							<ul>
								<li><strong>Plan du cours:</strong>Vous aurez des informations detaillées sur le cours, ainsi qu'un calendrier.</li>
								<li><strong>Tests: </strong> Des tests que vous pourrez préparer à l'avance.</li>
								<li><strong>Jeux: </strong>Des jeux qui vous permettrons d'apprendre en vous amusant.</li> 
								<li>Des liens vers des sites ou activités en français, films, livres, journaux, actualités.</li>
							</ul>	
					</div>

			<fieldset class="fixed-input">
			
				<?php
					echo $this->Form->input('email', array('title'=>'Cette adresse de courriel doit être valide', 
						'placeholder'=>'annie.hall@gmail.com',
						'label'=>'Adresse Courriel'));

					echo $this->Form->input('name',  array( 'placeholder'=>'Charlie Brown', 'label'=>'Votre nom'));
					echo '<p></p>';
					echo $this->Form->input('plain_password', 
							array(
								'type'=>'password', 
								'title'=>'De 6 à 15 caractères',  
								'placeholder'=>'D3n6789c (lettres+chiffres seulement!)',
								'label'=>'Mot de passe',
								'value'=>''
								//'style'=>'width: 260px'
								));

					echo $this->Form->input('password', ['type'=>'password', 'label'=>'Répétez le mot de passe']); 

					echo $this->Form->hidden('ccode');
				?>
				</fieldset>		
		
				<div class="cartouche centered">				
					<div class="input required captcha">
							<span>Transcrire cette image: </span>
								<?php echo $this->Form->input('captcha', array('label'=>false) ); ?>
					</div>		
					<div class="captcha">
						<div>
							<a href="javascript:void(0);" onclick="javascript:reset_captcha();"> Changer l'image </a>
							<img id="captcha" class="thumbnail" src="<?php echo $this->Html->url('/users/captcha_image');?>" alt="" />
						</div>
					</div>
				</div>	
			<div class="centered"><?php echo $this->Form->end('Enregistrez moi!');?></div>
				</div>	
			<hr>
			<p class="centered"><a href="mailto:prof@french-csusb.org">Problèmes techniques?</a></p>
	
		</div>
	
		</div>

</div>

<script type="text/javascript">
	
	function reset_captcha() 
	{
		var image = "<?php echo $this->Html->url('/users/captcha_image');?>?" + Math.round(Math.random(0)*1000)+1 ;
		document.images.captcha.src=image;
	}
	
	$('document').ready( function() {
	
		$('.explain').click( function() {
			$('.popup').toggle('slow');
		});
		
		$('.close').click( function() {
			$('.popup').hide('slow');
		});
	});
	
</script>
