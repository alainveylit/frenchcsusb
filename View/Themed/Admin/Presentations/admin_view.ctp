<div class="row">

	<?php if(empty($presentation['Presentation']['id'])):?>
			<h4>Cette presentation n\'existe pas.</h4>
			<?php return;?>
	<?php endif;?>
	
	<div class="cartouche bordered fatty">
		<h2><?php echo $presentation['Presentation']['titre']; ?>
			<small class="pull-right">
				<ul class="list-inline">
					 <li> <span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('Presentations'), array('action' => 'index')); ?> </li>
					 <li> <span class="glyphicon glyphicon-edit"> </span> <?php echo $this->Html->link(__('Editer'), array('action' => 'edit',  'admin'=>true, $presentation['Presentation']['id'])); ?> </li>
				</ul>
			</small>
		</h2>
	
			<h4><strong>Medium: </strong><?php echo $presentation['Presentation']['medium']; ?>
		  <strong>Status:</strong> <?php echo $presentation['Presentation']['status']; ?>
			<small class="pull-right"><?php echo $presentation['Presentation']['focus'];?></small>
		</h4>

		<div class="text">
			<?php echo $presentation['Presentation']['description']; ?>
		</div>
	<div>
		
		
		<div id="prof-comments" class="cartouche bordered">
		<h4 id="comments">Les commentaires du prof:</h4>
			<div><?php echo $presentation['Presentation']['comments'];?></div>
		</div>
		
	</div>
		<?php echo $this->element('presentation', array('document'=>$presentation['Presentation']));?>

	<div>
		<h4><a href="javascript:" class="toggler">Vocabulaire</a></h4>
			<div class="row" style="display: none;">
				<?php echo $presentation['Presentation']['vocabulaire']; ?>
			</div>
	</div>

</div>

	<?php //debug($presentation);?>

</div>

<script>
	$('document').ready( function() {
		$('.toggler').click( function() {
			$(this).parent().next().toggle();
		});
	});
</script>

