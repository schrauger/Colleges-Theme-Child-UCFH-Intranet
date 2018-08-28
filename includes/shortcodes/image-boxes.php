<?php

global $placeholder;

echo '<section class="image-boxes-container">';

if( have_rows('image_box_repeater') ) {
	while (have_rows('image_box_repeater')) {
		the_row(); // set up sub fields for this advance custom field
		if ( get_sub_field( 'box_title' ) || get_sub_field( 'box_url' ) || get_sub_field( 'box_image' )) {
			if ( get_sub_field( 'box_image' ) ) {
				$image = wp_get_attachment_image_src( get_sub_field( 'box_image' ), 'large' );
				$image = $image[ 0 ];
			} else {
				$image = null;
			}
				?>
				<div class="image-box grey-box" >
					<a <?php if (get_sub_field( 'box_url' )) { echo 'href="' . get_sub_field('box_url') . '"'; } ?>
					   style="background: transparent url( '<?php echo ( $image == null ) ? $placeholder : $image; ?>' ) no-repeat center center; background-size: cover;" >
						<?php
						if (get_sub_field( 'box_title' )) {
							// if url but no title
							?>
							<span ><?php the_sub_field( 'box_title' ); ?></span >
							<?php
						}
						?>
					</a >
				</div >
				<?php
		} else {
			?>
			<div class="image-box no-box" ></div >
			<?php
		}
	}
}
echo '</section>';
?>