<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('Administrative area ', 'Dashboard');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap/css/bootstrap', 
									'jquery.gritter',									
									'jquery-ui',
									'core', 
									'write-leftbar',
									'controls',
									'admin',
									'keyboard'
								));

		echo $this->Html->script(
					array(	'libraries/jquery/js/jquery', 
							'bootstrap/bootstrap', 
							'libraries/jquery/js/jquery-ui.custom',
							'jquery.form',
							'libraries/gritter/jquery.gritter',
							'libraries/tinymce/js/tinymce/tinymce.min',
							//'libraries/bPopup/jquery.bpopup.min.js',
							'respond.min',
							'controls',
							'jquery.hotkeys',
							'jquery.crossword',
							'keyboard'

					
					));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

	<div id="admin-wrapper">
		
		<?php echo $this->element('nav-bar');?>
		
		<div class="row-fluid" id="admin-content">
			
				<?php $cours = $this->Session->read('Cours'); 
				//if(!empty($cours)) echo '<span class="current-cours floral">Cours: ', $cours['titre'], '</span>'; 
				?>
				<?php  if(isset($User) && isset($User['id'])) :?>
					<ul id="latest" class="list-inline __pull-right">
						
						
						<li><?php if(!empty($cours)) echo '<span class="current-cours floral">Cours: ', $cours['titre'], '</span>'; ?></li>
						<li>
							<span class="glyphicon glyphicon-briefcase"> </span> 
							 <?php echo $this->Html->link('Dossiers', array('controller'=>'projects', 'action'=>'index'));?>
						</li><li>
							<span class="glyphicon glyphicon-file"> </span> 
							 <?php echo $this->Html->link('Documents', array('controller'=>'documents', 'action'=>'index'));?>
						</li><li>
							<span class="glyphicon glyphicon-question-sign"> </span>  
						<?php echo $this->Html->link('Exercices', array('controller'=>'quizzes', 'action'=>'index'));?>
						</li><li>
							<span class="glyphicon glyphicon-link"> </span> 
						<?php echo $this->Html->link('Ressources', array('controller'=>'ressources', 'action'=>'index'));?>
						</li><li>
							<span class="glyphicon glyphicon-pawn"> </span> 
						<?php echo $this->Html->link('Personnages', array('controller'=>'personnages', 'action'=>'index'));?>
						</li><li>
							<span class="glyphicon glyphicon-headphones"> </span> 
						<?php echo $this->Html->link('Chansons', array('controller'=>'chansons', 'action'=>'index'));?>
						</li><li>
							<span class="glyphicon glyphicon-th-list"> </span> 
						<?php echo $this->Html->link('Vocabulaire', array('controller'=>'vocabulaires', 'action'=>'index'));?>
						</li><li>
						<span class="glyphicon glyphicon-film"> </span>
						<?php echo $this->Html->link('Diaporamas', array('controller'=>'slideshows', 'action'=>'index'));?>
						
						</li>
					</ul>
			
				<?php endif;?>
		</div>
		
		<div class="row wrapper">
			
			<div class="col-lg-2 lavender">
				
				<?php echo $this->element('left-menu', array('cours'=>$cours));?>

			</div>
			<div class="col-lg-10">
				<div class="right">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
		
		</div>
		
		<div id="footer" class="row">

	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>

</html>
<script>
$('document').ready( function() {	
	$('input[type="text"]').addClass("keyboardInput");
	$('input[type="text"]').attr('lang', "fr"); 
	$('img.keyboardInputInitiator').attr('src', '/css/keyboard.png');
	
});


</script>
