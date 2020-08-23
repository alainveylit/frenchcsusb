<?php //debug($ressources);?>

<div class="fatty index">
	<h2><?php echo __('Ressources'); ?><small class="pull-right"><?php echo $medium;?></small></h2>
	<?php if(isset($medium) && $medium=="Film"):?>
	<ul class="list-inline">
		<li><a href="http://csusb.kanopystreaming.com.libproxy.lib.csusb.edu/category/languages/french" target="_new">Films français sur Kanopy</a>
		</li><li><a href="https://cal.csusb.edu/world-languages-and-literatures/resources/multimedia-language-center/movie-lists/french-movies"  target="_new">Films fran&ccedil;ais au Multimedia language center</a>
	</li></ul>
	<?php endif;?>
	<?php //debug($cours);?>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('focus'); ?></th>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ressources as $ressource): ?>
	<tr>
		<td><?php echo h($ressource['Ressource']['focus']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($ressource['Ressource']['titre'], array('action'=>'view', $ressource['Ressource']['id'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $ressource['Ressource']['id'])); ?>
			<?php if($User['role']=='Admin') :?>
				<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $ressource['Ressource']['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $ressource['Ressource']['id']), array(), __('Are you sure you want to delete # %s?', $ressource['Ressource']['id'])); ?>
			<?php endif;?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __(' page precedente '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__(' page suivante ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
