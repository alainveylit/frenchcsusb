<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('Classe de Français 102 et 202, Cal State University of San Bernardino ', ' Français 102 et 202, Automne 2016');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		French at CSUSB
		<?php //echo $accueil['Accueil']['title']; ?>:
		<?php //echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap/css/bootstrap', 
									'jquery.gritter',									
									'jquery-ui',
									'core', 
									'controls',
								));

		echo $this->Html->script(
					array(	'libraries/jquery/js/jquery', 
							'bootstrap/bootstrap', 
							'libraries/jquery/js/jquery-ui.custom',
							'libraries/gritter/jquery.gritter',

						));
					
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container-fluid">
		
	<?php echo $this->element('nav-bar');?>
		
		<div class="row" id="content">
			<div class="wide-margins">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
				</div>
		</div>
		
		<div id="footer" class="row">
			<p 
			<?php echo $this->Html->link(
					$this->Html->image('bord-du-lac.png', array('alt' => $cakeDescription, 'border' => '0', 'style'=>'width: 100%')),
					'/img/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
</body>

</html>

