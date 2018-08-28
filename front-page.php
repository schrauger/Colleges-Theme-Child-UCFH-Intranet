<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2018-08-20
 * Time: 1:01 PM
 */

?>
<?php get_header(); the_post(); ?>

<div class="container mb-5 mt-3 mt-lg-5">
    <article class="<?php echo $post->post_status; ?> post-list-item">
        <?php the_content(); ?>
    </article>

</div>
<div class="recent-posts">
<?php

$args = array(
    'posts_per_page' => 5,
    'order' => 'DESC'
);

$rp = new WP_Query( $args );

if ($rp->have_posts()) {
    while ( $rp->have_posts() ) {
        $rp->the_post();
        echo "<div class='post'>";
        echo "<div class='title'><a href='" . get_permalink() . "'>";
        the_title(); // posttitle
        echo "</a></div>";
        echo "<div class='thumbnail'><a href='" . get_permalink() . "'>";
        if ( has_post_thumbnail() ) {  // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail(); //display the thumbnail
        }
        echo "</a></div>";
        echo "<div class='excerpt'>";
        the_excerpt(); // displays the excerpt
        echo "<a class='readmore' href='" . get_permalink() . "'> Read More</a>";
        echo "</div>";
        echo "</div>";
    }
    echo "<div class='all-posts'><a href='" . get_post_type_archive_link( 'post' ) . "'>View all posts</a></div>";
    wp_reset_postdata(); // always always remember to reset postdata when using a custom query, very important
}
?>
</div>
<?php get_footer(); ?>
