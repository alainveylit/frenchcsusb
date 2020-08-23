<style>
.inset { max-width: 100%; }

</style>
<div class="fatty view">

		<h2><?php echo __('Chanson'); ?>
			<small class="pull-right">
				<?php echo $this->Crud->view_crud('Chanson', $chanson['Chanson']);?>
			</small>
		</h2>
		
		<div class="fatty row">
			<?php if(!empty($chanson['Chanson']['image'])) :?>
				<div class="col-lg-4">
					<?php echo $this->Crud->show_upload_image('chanson', $chanson['Chanson']); ?>
				</div>
			<?php endif;?>
				<div class="col-lg-8">	
					<dl class="dl-horizontal pull-left">
						<dt><?php echo __('Titre'); ?></dt>
						<dd>
							<?php echo $chanson['Chanson']['titre']; ?>
						</dd>
						<dt><?php echo __('Auteur'); ?></dt>
						<dd>
							<?php echo $chanson['Chanson']['auteur']; ?>
							&nbsp;
						</dd>
					</dl>
				</div>

			<?php if(!empty($chanson['Chanson']['description'])):?>
			<div class="cartouche bordered fatty">
				<h4><?php echo __('Description'); ?></h4>
				<?php echo $chanson['Chanson']['description']; ?>
			</div>
			<?php endif;?>
		</div>
		
		<div class="captioned selfish blue">
			<h4>Paroles</h4>
			<div style="padding: 24px;" class="_centered">
				<?php echo $chanson['Chanson']['paroles'];?>	
			</div>
		</div>
	
		<div>
			<h4><?php echo __('Video'); ?></h4>			
			<?php echo $chanson['Chanson']['video']; ?>
		</div>	
			
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
</div>

