<?php
if (isset($_REQUEST['ccsw_save']) and wp_verify_nonce(  $_REQUEST['ccsw_save'], 'save_configuration' ) ) {
	$ccollapse_truncate_mode = sanitize_text_field($_REQUEST['ccollapse_truncate_mode']);
	$ccollapse_truncate_amount = sanitize_text_field($_REQUEST['ccollapse_truncate_amount']);
	$ccollapse_truncate_speed = sanitize_text_field($_REQUEST['ccollapse_truncate_speed']);
	$ccollapse_show_more_text = sanitize_text_field($_REQUEST['ccollapse_show_more_text']);
	$ccollapse_hide_text = sanitize_text_field($_REQUEST['ccollapse_hide_text']);

	update_option('ccollapse_truncate_mode', $ccollapse_truncate_mode);
	update_option('ccollapse_truncate_amount', $ccollapse_truncate_amount);
	update_option('ccollapse_truncate_speed', $ccollapse_truncate_speed);
	update_option('ccollapse_show_more_text', $ccollapse_show_more_text);
	update_option('ccollapse_hide_text', $ccollapse_hide_text);

}
?>
<div class="wrap">
    <h2><?=__('Category Collapser SEO', 'category-collap-woo-seo')?></h2>

     <form method="post"> 

    	<?php wp_nonce_field( 'save_configuration', 'ccsw_save' ); ?>
    	<table class="form-table">
			<tbody>
				<tr>
					<th scope="row" valign="top"><?=__('Mode', 'category-collap-woo-seo')?></th>
					<td>
						<label>

							<?php $c_mode = get_option('ccollapse_truncate_mode', 'lines'); ?>

							<select name="ccollapse_truncate_mode">
							<option value="chars" <?php if ($c_mode == 'chars') echo 'selected'; ?>><?=__('Charactars', 'category-collap-woo-seo')?></option>
							<option value="words" <?php if ($c_mode == 'words') echo 'selected'; ?>><?=__('Words', 'category-collap-woo-seo')?></option>
							<option value="lines" <?php if ($c_mode == 'lines') echo 'selected'; ?>><?=__('Lines', 'category-collap-woo-seo')?></option>
							<option value="block" <?php if ($c_mode == 'block') echo 'selected'; ?>><?=__('Whole Element', 'category-collap-woo-seo')?></option>
							</select>

						</label>
					</td>
				</tr>

				<tr>
					<th scope="row" valign="top"><?=__('Ammount', 'category-collap-woo-seo')?></th>
					<td>
						<label>
							<input type="number" min="1" name="ccollapse_truncate_amount" value="<?php echo get_option('ccollapse_truncate_amount','2'); ?>" /><br />
						</label>
					</td>
				</tr>


				<tr>
					<th scope="row" valign="top"><?=__('Speed', 'category-collap-woo-seo')?></th>
					<td>
						<label>

						<?php $c_speed = get_option('ccollapse_truncate_speed','medium'); ?>

						<select name="ccollapse_truncate_speed">
							<option value="slow" <?php if ($c_speed == 'slow') echo 'selected'; ?>><?=__('Slow', 'category-collap-woo-seo')?></option>
							<option value="medium" <?php if ($c_speed == 'medium') echo 'selected'; ?>><?=__('Medium', 'category-collap-woo-seo')?></option>
							<option value="fast" <?php if ($c_speed == 'fast') echo 'selected'; ?>><?=__('Fast', 'category-collap-woo-seo')?></option>
						</select>

							<br />

						</label>
					</td>
				</tr>

				<tr>
					<th scope="row" valign="top"><?=__('Show more', 'category-collap-woo-seo')?></th>
					<td>
						<label>
							<input type="text" name="ccollapse_show_more_text" value="<?php echo get_option('ccollapse_show_more_text') ?: 'Show more'; ?>" /><br />
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?=__('Hide text', 'category-collap-woo-seo')?></th>
					<td>
						<label>
							<input type="text" name="ccollapse_hide_text" value="<?php echo get_option('ccollapse_hide_text') ?: 'Hide'; ?>" /><br />
						</label>
					</td>
				</tr>


			</tbody>
    	</table>
    	<input class="button-primary" type="submit" value="<?=__('Save settings', 'category-collap-woo-seo')?>" />
    </form>
</div>
