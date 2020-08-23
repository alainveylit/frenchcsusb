<div class="container-fluid">
	<div class="fatty cartouche">
		<?php if($User['role']!='Admin') return; ?>
		
<h2><?php echo __('Users found');?></h2>
	<div class="selfish right-aligned skinny">
		<ul class="list-inline pull-right">
			<li class="list-mail"><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('List users'), array('action' => 'index')); ?></li>
		</ul>
	</div>
		
		<table class="table table-striped">
			<tr><th>id</th><th>Profile</th><th>Email</th><th>Role</th><th>Status</th><th>Last login</th><th>Edit</th></tr>
				<?php foreach($users as $user) : ?>
					<tr>
						<td><?php echo $user['User']['id'];?></td>
						<td title="<?php echo $user['User']['username'];?>">
							<?php echo $this->Html->link($user['User']['name'], array('controller'=>'profiles', 'action'=>'view',  $user['User']['profile_id']));?>
						</td>
						<td>
						
						<?php echo $this->Html->link($user['User']['email'], 'mailto:' . $user['User']['email'], array('class'=>'email'));?></td>
						
							<td><?php echo $user['User']['role'];?></td>
							<td><?php echo $user['Profile']['city'];?></td>
							<td><?php echo $user['Profile']['instrument'];?></td>
							
							<td><?php echo $user['User']['last_login'];?></td>
							<td>
								<?php echo $this->Html->link( "Edit", array('action'=>'edit_role', $user['User']['id']));?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>				
							</td>
						</tr>
			<?php endforeach;?>
		</table>

<?php 
	//debug($delete_all);

	if(isset($delete_all)) {
		echo $this->Form->create('User', array('url' => '/users/delete_nologins', 'class'=>'form-inline')); 
		echo $this->Form->end("Delete all");
	}
?>



<?php
//debug($users);
?>

