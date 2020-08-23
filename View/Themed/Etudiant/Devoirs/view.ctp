<div class="fatty view">
		<h3><?php echo __('Les Devoirs '); ?></h3>
		<?php echo $devoir['Devoir']['description']; ?>		
		
	<?php if($User['role']=='Admin') :?>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Editer ce devoir'), array('action' => 'edit', 'admin'=>true, $devoir['Devoir']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Effacer ce devoir'), array('action' => 'delete', 'admin'=>true,  $devoir['Devoir']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $devoir['Devoir']['id']))); ?> </li>
				<li><?php echo $this->Html->link(__('Ajouter un devoir'), array('action' => 'add', 'admin'=>true)); ?> </li>
			</ul>
		</div>
	<?php endif;?>
</div>
