<div class="view">

	<h3><?php $this->FileIcon->show_avatar($profile['Icon']);?> <?php echo $profile['Profile']['name'];?></h3>
		<?php //debug($profile['Donation']);?>

		<?php if (empty($profile['Donation'])) : ?>
			<p>You currently have no recorded donations. If this is a mistake, please <a href="mailto:lute@musickshandmade.com">notify me</a> so I can correct the situation.</p>
		<?php endif;?>
			
		<?php foreach ($profile['Donation'] as $donation) {
				echo '<h3 style="text-decoration: underline; margin-bottom: 2em;">Thank you for the $', $donation['mc_gross'], ' donation you made ' , $this->Time->niceShort($donation['payment_date']), '</h3>';
				if($donation['item_number']=='MusickshandmadeDonation') {
						echo $this->element('MusicshandmadeDonation');
				}
			}
		?>
</div>
