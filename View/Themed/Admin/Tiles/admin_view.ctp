<div class="fatty view">
<div>
	<h2><?php echo __('Tuile'); ?>
	<small class="pull-right">
	Groupe: <?php echo $this->Html->link($tile['TileGroup']['header'], array('controller'=>'tile_groups', 'action'=>'view',$tile['TileGroup']['id']) ); ?>
	</small>
	</h2>
	
			<div class="wide-margins lavender">		
			<div class="row-fluid">
				<div class="captioned <?php echo $tile['Couleur']['title'];?>">
					<h4 class="<?php echo $tile['Tile']['ajax'];?>"><?php 
					echo (empty($tile['Tile']['title_link'])) ? 
										$tile['Tile']['title'] : $this->Html->link($tile['Tile']['title'], $tile['Tile']['title_link']);?>
				</h4>
				<div>
					<?php if(!empty($tile['Tile']['element'])) echo $this->element($tile['Tile']['element']);?>
					<?php echo $tile['Tile']['description'];?>
					</div>
				</div>
		</div>
	</div>
<hr>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer '), array('action' => 'edit', $tile['Tile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $tile['Tile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tile['Tile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Tuile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter une Couleur'), array('controller' => 'couleurs', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="fatty cartouche ">

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
</div>
</div>
