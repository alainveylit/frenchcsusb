<style>
form {
	padding: 0;
	margin: 0;
	width: auto;
}

.ui-dialog-titlebar { font-size: 10px; }

/*fieldset {
	padding: 0;
	margin: 0;
	border: none;
	width: 90%;
}	
legend {
	font-size: 100%;
	*width: 100%;
	margin-bottom: 1em;
}*/
</style>
<div class="avatar-upload">

<?php echo $this->Form->create('Profile', array('type'=>'file', 'action'=>'upload_avatar', $this->request->data['Profile']['id']));?>

        <fieldset>
               <legend><?php echo __('Add profile picture');?></legend>
        <?php
                echo $this->Form->input('id');
				echo $this->Form->file('Profile.Filedata');
				echo $this->Form->end('Upload');
  				/*echo $this->Ajax->submit('Upload', 
							array(	'url'=> array('controller'=>'profiles', 'action'=>'upload_avatar'),
									//'before'=>'tinyMCE.triggerSave();', 
									'update' => 'update-result',
							));
				*/
		?> 

		<p id="update-result"></p>
</div>
