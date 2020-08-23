<div class="container-fluid">
	<div class="fatty cartouche">
		<?php if($User['role']!='Admin') return; ?>
		
<h2><?php 
//debug($users); 
echo __('Users');?></h2>

<?php echo $this->Form->create('User', array('url' => '/users/view_results', 'class'=>'autocomplete')); ?>
        <?php //echo $this->Ajax->autoComplete('User.username', '/users/autoComplete')?>
        <?php echo $this->Form->input('username', array('placeholder'=>"Type in part of the user name"));?>
	
<?php echo $this->Form->end('Find user'); ?>

<p>
<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>
</p>

<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th>City</th>
		<th>Instrument</th>
		<th>Notify</th>
		<th><?php echo $this->Paginator->sort('role');?></th>		
		<th><?php echo $this->Paginator->sort('last_login');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
<?php
$i = 0;
foreach ($users as $user):

?>
	<tr>
	<td>
			<?php echo $this->Html->link($user['User']['name'], 
											array('action'=>'view', $user['User']['id']), 
											array("title"=>$user['Profile']['city'])
										); ?>
		</td>
		<td><?php echo $user['Profile']['city'];?></td>
		<td><?php echo $user['Profile']['instrument'];?></td>
		<td>
			<?php echo $user['Profile']['notify'] ? "Notify" : "Do not notify";?>
			 <?php if(! $user['Profile']['public']) echo " Private";?>
		</td>
		<td>
			<?php echo $user['User']['role']; ?>
		</td>
		<td title="Created: <?php echo $user['User']['created'];?>">
			<?php echo $user['User']['last_login'] !=null ? $this->Time->niceShort($user['User']['last_login']) : " --- "; ?>
			<?php /*debug($user['Profile']);*/?>
			
		</td>
		<td class="__actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit_role', $user['User']['id'])); ?> 
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
		<div class="pager">
			<?php echo $this->Paginator->prev('<< '.__('previous '), array(), null, array('class'=>'disabled'));?>
		 | 	<?php echo $this->Paginator->numbers();?>
			<?php echo $this->Paginator->next(__(' next').' >>', array(), null, array('class'=>'disabled'));?>
		</div>

</div>

<script>
	
$(document).ready( function() {
	$('#UserUsername').autocomplete( { 
				source: '/users/autoComplete',
				minLength: '3', 
				select: function( event, ui ) {  } 
	});
});

</script>
