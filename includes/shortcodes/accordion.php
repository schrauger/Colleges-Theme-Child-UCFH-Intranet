<?php

global $placeholder;

echo '<section class="accordion-container">';




if( have_rows('accordion_repeater') ) {
	while (have_rows('accordion_repeater')) {
		the_row(); // set up sub fields for this advance custom field

		if (get_sub_field('post_manual_title')){
			$link_title = get_sub_field( 'post_manual_title' );
		} else {
			$link_title = get_the_title(get_sub_field( 'post_id' ));
		}

		if ( get_sub_field( 'title' ) ) {
			?>
			<div class="accordion grey-box" >
				<span class="accordion-title"><?php the_sub_field( 'title' ); ?></span>
				<div class="collapse">
					<p><?php the_sub_field('description_paragraph') ?></p>
					<?php if (get_sub_field( 'post_id' )) {?><a class="button" href="<?php echo get_permalink(get_sub_field( 'post_id' )); ?>"><?php echo $link_title; ?></a > <?php } ?>
				</div>
			</div >
			<?php
		}
	}
}
echo '</section>';
?>