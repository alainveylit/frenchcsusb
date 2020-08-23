<style>
.inset { max-width: 100%; }
</style>
<div class="fatty view">
			<div class="selfish row"><?php echo $this->Crud->view_crud('Chanson', $chanson['Chanson']);?></div>

	<div class="row">
		<h2><?php echo __('Chanson'); ?>
					<small class="pull-right"><?php echo $this->Html->link(__('Liste des Chansons'), array('action' => 'index')); ?> </small>

		</h2>
		
		<div class="col-lg-4">
			<?php if(!empty($chanson['Chanson']['image'])) {
				echo $this->Crud->show_upload_image('chanson', $chanson['Chanson']);
			}?>
		</div>
		<div class="col-lg-8">
		<dl class="dl-horizontal">
			<dt><?php echo __('Titre'); ?></dt>
			<dd>
				<?php echo $chanson['Chanson']['titre']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Auteur'); ?></dt>
			<dd>
				<?php echo $chanson['Chanson']['auteur']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Description'); ?></dt>
			<dd>
				<?php echo $chanson['Chanson']['description']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Video'); ?></dt>
			<dd>
				<?php echo $chanson['Chanson']['video']; ?>
				&nbsp;
			</dd>
		</dl>
		
		<div class="row selfish">
			<h3>Paroles</h3>
				<?php echo $chanson['Chanson']['paroles'];?>	
		</div>
		</div>
	</div>
	
	<?php if($User['role']=='Admin') :?>
	<div class="actions">
		
			<p>Date ajout&eacute;e:	<?php echo $chanson['Chanson']['created']; ?></p>

		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Editer cette Chanson'), array('action' => 'edit', $chanson['Chanson']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Effacer cette Chanson'), array('action' => 'delete', $chanson['Chanson']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $chanson['Chanson']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__('Liste des Chansons'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Ajouter une chanson'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
	<?php endif;?>
</div>
