<div class="fatty view">
<div>
	<h2><?php echo __('Tile'); ?></h2>
		<dl class="dl-horizontal">
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Tile Group'); ?></dt>
			<dd>
				<strong><?php echo $this->Html->link($tile['TileGroup']['header'], array('controller'=>'tile_groups', 'action'=>'view',$tile['TileGroup']['id']) ); 
				?>
				</strong>
			</dd>

			<dt><?php echo __('Title'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Description'); ?></dt>
			<dd>
				<?php echo $tile['Tile']['description']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Ajax class'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['ajax']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Creator'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['creator']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Index'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['index']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Couleur'); ?></dt>
			<dd>
				<?php echo $this->Html->link($tile['Couleur']['title'], array('controller' => 'couleurs', 'action' => 'view', $tile['Couleur']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Full Row'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['full_row']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Active'); ?></dt>
			<dd>
				<?php echo h($tile['Tile']['active']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Edit Tile'), array('action' => 'edit', $tile['Tile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tile'), array('action' => 'delete', $tile['Tile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tile['Tile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Couleurs'), array('controller' => 'couleurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couleur'), array('controller' => 'couleurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
