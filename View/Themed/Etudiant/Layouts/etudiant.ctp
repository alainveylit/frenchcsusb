<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('Classe de Français III, University of Redlands ', ' Français III, Spring 2016');
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
									//'controls',
									//'jquery.bxSlider/jquery.bxslider',
									'keyboard',
									'quiz'
								));

		echo $this->Html->script(
					array(	'libraries/jquery/js/jquery', 
							'bootstrap/bootstrap', 
							'libraries/jquery/js/jquery-ui.custom',
							'jquery.form',
							'libraries/gritter/jquery.gritter',
							'libraries/tinymce/js/tinymce/tinymce.min',
							'libraries/bPopup/jquery.bpopup.min.js',
							'respond.min',
							'keyboard',
							'MenuDrive'
					
					));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		
	<?php echo $this->element('student-menu');?>
		

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		
		<div id="footer" class="row quiz-footer">
			<p>
			<?php echo $this->Html->link(
					$this->Html->image('Conseil_dEtat_Paris.jpg', 
					array('alt' => $cakeDescription, 'border' => '0', 'style'=>'width: 100%')),
					'/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
			</p>
		</div>
	<script>
			$('document').ready( function() {		
				$('input[type="text"]').addClass("keyboardInput");
				$('input[type="text"]').attr('lang', "fr"); 
				$('img.keyboardInputInitiator').attr('src', '/css/keyboard.png');
			});
			
	</script>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

