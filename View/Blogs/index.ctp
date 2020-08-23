<div class="blogs wide-margins">
	<h2><?php echo __('Blogs'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('creator'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($blogs as $blog): ?>
	<tr>
		<td><?php echo h($blog['Blog']['title']); ?>&nbsp;</td>
		<td><?php echo h($blog['Blog']['creator']); ?>&nbsp;</td>
		<td><?php echo h($blog['Blog']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blog['Blog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $blog['Blog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $blog['Blog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $blog['Blog']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
	<div>
	<p><strong>Entr&eacute;e 1</strong>: Bonne nouvelle! Dans quelle ville allez-vous passer les prochains 6 mois? Qu'allez-vous faire &agrave; l'&eacute;tranger? Etudier, travailler, vivre dans votre famille? Comment &ecirc;tes-vous notifi&eacute;s: lettre, courriel, coup de t&eacute;l&eacute;phone.</p>
<p><strong>Entr&eacute;e 2</strong>:&nbsp; Les pr&eacute;paratifs -- Pr&eacute;parez les documents: quels documents vous faut-il? O&ugrave; les trouvez-vous? Avez-vous un passeport am&eacute;ricain? O&ugrave; l'obtenir? Faut-il obtenir un visa? Combien de temps &agrave; l'avance devez-vous vous y prendre?&nbsp;</p>
<p><strong>Entr&eacute;e 3:</strong>&nbsp; Faire son itin&eacute;raire, prendre un billet d'avion. O&ugrave; trouvez-vous un billet? Sur quelle compagnie a&eacute;rienne? Comment co&ucirc;te votre billet? Quelles sont les &eacute;tapes? Y a-t-il une ou plusieurs escales?</p>
<p><strong>Entr&eacute;e 4</strong>: Faire ses bagages. - Qu'est-ce que vous emportez avec vous? Pourquoi?</p>
<p><strong>Entr&eacute;e 5</strong>: Les au revoirs. Organisez-vous une f&ecirc;te? Qui est invit&eacute;? Etes-vous content, excit&eacute;, triste? Qu'est ce qui va vous manquer?</p>
<p><strong>Entr&eacute;e 6</strong>: Comment se passe votre voyage? A quel a&eacute;roport allez-vous? Comment allez-vous &agrave; l'a&eacute;roport? A quelle heure partez-vous? Qui vous am&egrave;ne? Combien de temps &agrave; l'avance devez-vous arriver &agrave; l'a&eacute;roport? Par o&ugrave; transitez-vous? Confort? D&eacute;callage horaire? Comment est la nouriture? Avez-vous suffisemment de place?</p>
<p><strong>Entr&eacute;e 7: </strong>L'arriv&eacute;e: quelles sont vos premi&egrave;res impressions? Quel temps fait-il?&nbsp; Quelle est la premi&egrave;re chose que vous devez faire?</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
	
	
	
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Blog'), array('action' => 'add')); ?></li>
	</ul>
</div>
