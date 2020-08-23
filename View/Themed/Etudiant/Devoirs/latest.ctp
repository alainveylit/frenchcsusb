<div class="selfish row">	
	<h4>Prochains devoirs: 	<?php echo $this->Html->link($devoir['Lesson']['titre'], 
		array('controller' => 'lessons', 'action' => 'view', $devoir['Lesson']['id']), array('escape'=>false)); ?></h4>
	
	<div class="row-fluid">	
			<?php echo $devoir['Devoir']['description']; ?>
	</div>
</div>

