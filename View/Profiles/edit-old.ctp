<?php echo $this->element('tinymce');?>
<?php //debug($this->request->data);?>
<div class="profiles __form">

<?php echo $this->Form->create('Profile');?>

	<fieldset>
 		<legend><?php echo __('Edit Your Personal Profile'); ?></legend>
 		
 		
 		<p class="right-aligned">
			<ul class="crud"><li>
				Current status: <em><?php echo $User['role'];?> </em>
				 <strong> <?php /* if($User['role'] != 'Contributor') {
					echo $this->Html->link(__("Become a contributor"), 
								array('controller'=>'users', 'action'=>'donate', $User['']));
				}*/?></strong>
			</li>
			<li>
				<?php echo $this->Html->link(__("Add an instrument"), array('controller'=>'instruments', 'action'=>'add'));?>
			</li>
			<li>
				<a href="javascript:" class="update-avatar">Update your avatar</a>
			</li>
			
			</li></ul>
			
			
		</p>
		<p><?php $this->FileIcon->show_avatar($this->request->data['Image']);?></p>
		<?php /*
		<div id="avatar">
			<ul class="horz-list">
			   <li>Your current avatar is: <span><?php $this->FileIcon->show_avatar($this->request->data['Profile']['avatar']);?></span></li>
			   <li>
				   <a href="javascript:" class="update-avatar">Update your avatar</a>
				   echo $this->Html->link(__("Upload a new avatar (Image size: 48px x 48px)"), array('controller'=>'icons', 'action'=>'add', $this->request->data['Profile']['id']), array('class'=>'avatar iconic'));
				</li>
			</ul>
		</div>*/?>
		
		<?php //$this->FileIcon->show_avatar($this->request->data['Profile']['avatar']);?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('avatar', array('type'=>'hidden'));
	?>
			<?php echo $this->Form->input('name', array('style'=>'width:600px'));?>
	<?php
		echo $this->Form->input('instrument', array('label'=>'Instrument(s)'));
		echo $this->Form->input('occupation');
	?>


        <?php echo $this->Form->input('address'); ?>
		<ul class="horz-list">
		 	<li style="min-width:200px"><?php echo $this->Form->input('city', array('style'=>'width:180px'));?></li>
		 	<li style="min-width:200px"><?php echo $this->Form->input('region', array('style'=>'width:180px'));?></li>
		 	<li  style="min-width:200px"><?php echo $this->Form->input('ZIP', array('style'=>'width:180px'));?></li>
		 	<li><?php echo $this->Form->input('country', array('style'=>'width:100px'));?></li>
		 	<li><?php echo $this->Form->input('phone');?></li>
		</ul><hr/>

                <ul class="horz-list">
                        <li><?php echo $this->Form->input('facebook', array('label'=>'Facebook, Google+, etc.', 'style'=>'width:300px'));?></li>
                        <li><?php echo $this->Form->input('skype', array('style'=>'width:300px'));?></li>
                </ul>


		<?php
                		echo $this->Form->input('notify', array('label'=>'Send me e-mail notifications of messages posted on the site'));
                		echo $this->Form->input('public', array('label'=>'Make my profile public'));
		?>

	</fieldset>
	<fieldset>
		<?php echo $this->Form->input('notes', array('label'=>'About myself. <i>(These notes will be public to the other registered users)</i>'));?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>




<script type="text/javascript">

	$(document).ready( function() {

        $('.update-avatar').click(function() {
            var url = '../upload_avatar';
            // show a spinner or something via css
            var dialog = $('<div class="loading"></div>').appendTo('body');
            // open the dialog
			var target=$(this);
			//var author=$(this).parent().parent().prev().first();

            dialog.dialog({
                // add a close listener to prevent adding multiple divs to the document
                close: function(event, ui) {
                    // remove div with all data and events
					//var new_title = $(this).find('#PieceTitle').attr('value');
					//target.html(new_title);
					//author.html($(this).find('#PieceAuthor').attr('value'));
					dialog.remove();
                },
				title: 'Edit avatar',
				width: 500,
                modal: true
            });
            
            // load remote content
            dialog.load(
                url,
                {}, 
                function (responseText, textStatus, XMLHttpRequest) {
                    // remove the loading class
                    dialog.removeClass('loading');
                }
            );

            //prevent the browser to follow the link
            return false;

		});
		
	});
</script>
