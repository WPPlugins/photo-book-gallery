<p style="text-align:center;">
	<button class="button-secondary upload_image_button">
		<span class="dashicons dashicons-images-alt2"></span>
		<?php _e( 'Upload Images', 'photo-book' ); ?>
	</button>
</p>
<br>
<?php global $post; 
$saved_meta = get_post_meta( $post->ID, 'photo_book_data', true );
if(isset($saved_meta['images']) && $saved_meta['images'] != ''){
	$images_arr = json_decode($saved_meta['images']);
}
?>
<div class="thumbs-prev">
	<?php if (isset($images_arr) && $images_arr != '') {
		foreach ($images_arr as $url) {
			if (is_string($url)) {
				echo '<div><img src="'.$url.'"><span class="dashicons dashicons-dismiss"></span></div>';
			} else {
				echo '<div><img src="'.$url->image.'"><span class="dashicons dashicons-dismiss"></span></div>';
			}
		}
	} ?>
</div>
<div style="clear: both; display: block;"></div>
<input type="hidden" name="photo_book[images]" class="wcp_photo_images">