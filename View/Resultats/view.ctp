<div class="fatty view">
	<div>

		<h2><?php echo __('Résultats'); ?></h2>
		
		<dl class="dl-horizontal">
			<dt><?php echo __('Test'); ?></dt>
			<dd>
				<?php echo $this->Html->link($resultat['Test']['title'], array('controller' => 'tests', 'action' => 'view', $resultat['Test']['id'])); ?>
				&nbsp;
				<hr>
			</dd>
			<dt><?php echo __('Etudiant'); ?></dt>
			<dd>
				<?php echo $this->Html->link($resultat['Etudiant']['nom'] . ", " .  $resultat['Etudiant']['prenom'], 
				array('controller' => 'etudiants', 'action' => 'view', $resultat['Etudiant']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Pris'); ?></dt>
			<dd>
				<?php echo ($resultat['Resultat']['taken']) ? "Oui" : "Non"; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Grade'); ?></dt>
			<dd>
				<?php echo h($resultat['Resultat']['grade']); ?>
				&nbsp;
			</dd>

			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo $this->Time->niceShort($resultat['Resultat']['created']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Edit Resultat'), array('action' => 'edit', $resultat['Resultat']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Resultat'), array('action' => 'delete', $resultat['Resultat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $resultat['Resultat']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__('List Resultats'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Resultat'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Tests'), array('controller' => 'tests', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('List Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
		</ul>
	</div>
</div>
