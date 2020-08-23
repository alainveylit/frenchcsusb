<div id="comment-form-inner">


		<?php
				//debug($model);
				$user_id = $model['user_id'];
				$foreign_key = $model['id'];
		?>

		<?php echo $this->Form->create('Comment', array('action'=>'add_collection_comment/' . $foreign_key));?>

		<h3><?php echo $model['title']; ?></h3>		

		<fieldset>
				<p><legend><?php echo __($model['user_name'] . ' is adding a comment');?></p></legend>

			<?php
				echo $this->Form->input('comment');
				echo $this->Form->input('user_id', array('value'=>$user_id, 'type'=>'hidden'));
				echo $this->Form->input('foreign_key', array('value'=>$model['id'], 'type'=>'hidden'));
				echo $this->Form->input('model', array('type'=>'hidden', 'value'=>$model['alias']));
			?>
				<?php echo $this->Form->end('Submit');?>

		</fieldset>

</div>

