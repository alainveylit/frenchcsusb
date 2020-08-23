<script type="text/javascript">
$(document).ready(function() {
        $(function(){
            $.gritter.add({
                title: "Error",
                text: "<?php echo $message;?>",
                image: "/css/images/exclamation.png", // See IE7 note below
                //sticky: true
            });
        });
});
</script>
