<?php


function collapser_js() {
if ( is_product_category() ) {
?>

<script>
	jQuery(function ($) {

		 $('.term-description, .archive-description').collapser({
			mode: '<?php echo get_option('ccollapse_truncate_mode','lines'); ?>',
			truncate: <?php echo get_option('ccollapse_truncate_amount','2'); ?>,
			speed: '<?php echo get_option('ccollapse_truncate_speed','medium'); ?>',
			showText: '<?= get_option('ccollapse_show_more_text','Show More') ?>',
			hideText: '<?= get_option('ccollapse_hide_text','Hide') ?>'
		});


	});

</script>

<?php
}}


add_action('template_redirect','conditional_functions');

function conditional_functions() {

	add_action('wp_head','collapser_js');
	add_action('wp_head', 'register_cat_collapser_script');
}

?>
