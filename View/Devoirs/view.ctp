<div class="devoirs cartouche bordered">
		<h4><?php echo __('Les Devoirs pour cette lecon'); ?></h4>
		<?php echo $devoir['Devoir']['description']; ?>			
		<?php if($User['role']=='Admin') :?>
			<div class="actions">
				<h3><?php echo __('Actions'); ?></h3>
				<ul class="list-inline">
					<li><span class="glyphicon glyphicon-pencil"> </span> 
						<?php echo $this->Html->link(__('Editer ce devoir'), array('action' => 'edit', 'admin'=>true, $devoir['Devoir']['id'])); ?> </li>
					<li><span class="glyphicon glyphicon-erase"> </span>
						<?php echo $this->Form->postLink(__('Effacer ce devoir'), array('action' => 'delete', 'admin'=>true,  $devoir['Devoir']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $devoir['Devoir']['id']))); ?> </li>
					<li><span class="glyphicon glyphicon-plus"> </span>
						<?php echo $this->Html->link(__('Ajouter un devoir &agrave; cette le&ccedil;on'), array('action' => 'add', 'admin'=>true, $devoir['Lesson']['id']), ['escape'=>false]); ?> </li>
				</ul>
			</div>
		<?php endif;?>
</div>
