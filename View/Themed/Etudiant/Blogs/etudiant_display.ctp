<div class="blogs wide-margins">
	<h3><?php echo $this->Html->link( __('Mon cahier'), array('action'=>'index')); ?>
		<small class="pull-right">
			<span class="glyphicon glyphicon-pencil"> </span> <?php echo $this->Html->link('Ajouter une entrée', array('action'=>'add'));?>
			</small>
</h3>
	<div class="row cartouche long-text">
	<?php foreach ($blogs as $blog): ?>
		<div class="row-fluid" style="overflow: auto;">

			<h4><?php echo h($blog['Blog']['title']); ?></h4>
				<?php 
				if(!empty($blog['Blog']['image'])):?> 
				<?php
					//debug($blog['Blog']);
					$path = '/files/blog/image/' . $blog['Blog']['image_dir'] . DS . $blog['Blog']['image'];
				?>
					<img class="inset" src="<?php echo $path;?>" alt="mon image" style="max-width: 250px;">
				<?php endif;?>
				<?php echo $blog['Blog']['text']; ?>
				</div>
			<ul class="list-inline pull-right">
				<li><?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $blog['Blog']['id'])); ?></li>
				<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $blog['Blog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $blog['Blog']['id']))); ?></li>
			</ul>

				<hr>
		<?php endforeach;?>
	</div>
	

	<p>
	<?php /*
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	?>	</p>
	<div class="pager">
	<?php /*
		echo $this->Paginator->prev('< ' . __('precedent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('suivant') . ' >', array(), null, array('class' => 'next disabled'));
	*/?>
	</div>
</div>
<p>
</p>
<div class="row actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><span class="glyphicon glyphicon-pencil"> </span>  <?php echo $this->Html->link(__('Ajouter une entrée dans mon journal'), array('action' => 'add')); ?></li>
	</ul>
</div>
