<div class="row selfish">
		<ul class="list-inline pull-right ">
			<li><span class="glyphicon glyphicon-th"> </span> <?php echo $this->Html->link(__('Ajouter une tuile'), array('controller'=>'tile_groups', 'action' => 'add', 'Landing', $landing['Cours']['id'])); ?> </li>
			<li><span class="glyphicon glyphicon-pencil"> </span> <?php echo $this->Html->link(__('Editer cet atterissage'), array('action' => 'edit', $landing['Landing']['id'])); ?> </li>
			<li><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		</ul>
</div>

<div class="row-fluid view">
	<h3><?php echo __('Page d\'attérissage du cours'); ?>
	<?php //debug( $landing);
		
		//$landing['Landing']['creator'] = $landing['Professeur']['Creator'];
	?>	
		<small class="pull-right">
			<?php //echo $this->Crud->view_crud('Landing', $landing['Landing']);?>
				<span class="glyphicon glyphicon-education"> </span> 
			<?php echo $this->Html->link('Vue étudiant', array('action'=>'view', $landing['Landing']['cours_id'], 'admin'=>false));?>
			<?php if(isset($landing['Syllabus']['id'])) :?>
				<span class="glyphicon glyphicon-list-alt"> </span>
					<?php echo $this->Html->link('Voir le plan du cours', array('controller'=>'documents', 'action'=>'view', $landing['Syllabus']['id']));?>
			<?php endif;?>
			 
			</small>
		
	</h3>
<hr>
<div class="skinny cartouche">
	<dl class="dl-horizontal">
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo $landing['Landing']['title']; ?>
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo $landing['Landing']['description']; ?>
		</dd>
		<dt><?php echo __('Cours'); ?></dt>
		<dd>
			<?php echo $this->Html->link($landing['Cours']['titre'], array('controller' => 'cours', 'action' => 'display', $landing['Cours']['id'])); ?>
		</dd>
		<dt><?php echo __('Professeur'); ?></dt>
		<dd>
			<?php echo $this->Crud->professor_view($landing['Professeur']);?>
		</dd>
	</dl>
	
	<div>
	<h3>Tuiles:</h3>
	<div class="row-fluid cartouche">
			<?php foreach($landing['TileGroup'] as $tile_group):?>
				<div class="row-fluid cartouche">
					<?php echo $this->element('tile_group', array('tile_group'=> $tile_group, 'cols'=>2, 'index'=>0));?>
				<div class="skinny pull-right">
					<ul class="list-inline">
						<li><?php echo $tile_group['title'];?></li>
						<li><?php echo $tile_group['header'];?></li>
						<li>Actif: <?php echo $tile_group['actif'] ? '<span class="check">Yes</span>' : '<span class="check">No</span>';?> </li>
						<li><span class="glyphicon glyphicon-search"> </span> <?php echo $this->Html->link('view', array('controller'=>'tile_groups', 'action'=>'view', $tile_group['id']));?></li>
						<li><span class="glyphicon glyphicon-pencil"> </span> <?php echo $this->Html->link('edit', array('controller'=>'tile_groups', 'action'=>'edit', $tile_group['id']));?></li>	
					</ul>
				</div>
			</div>
			<?php endforeach;?>
			</div>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><span class="glyphicon glyphicon-th"> </span> <?php echo $this->Html->link(__('Ajouter une tuile'), array('controller'=>'tile_groups', 'action' => 'add', 'Landing', $landing['Landing']['id'])); ?> </li>
			<li><span class="glyphicon glyphicon-pencil"> </span> <?php echo $this->Html->link(__('Editer cet atterissage'), array('action' => 'edit', $landing['Landing']['id'])); ?> </li>
			<li><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		</ul>
</div>
	<small class="pull-right">
		<ul class="list-inline">
			<li><?php echo __('Modified'); ?> <?php echo h($landing['Landing']['modified']); ?>	</li>
			<li><?php echo __('Created'); ?> 	<?php echo h($landing['Landing']['created']); ?>	</li>
		</ul>
	</small>
</div>
