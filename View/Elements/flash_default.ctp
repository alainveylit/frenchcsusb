<script type="text/javascript">

	$(document).ready(function() {
			$.gritter.add({
			title: "Notification",
			text: "<?php echo $message;?>",
			image: "/css/images/checkmark.png", // See IE7 note below
			//sticky: true,
			time: 2000
			});
		});

</script>

