<?php
/**
 
 * @package  
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header> 

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'artist' ),
				'after'  => '</div>',
			) );
		?>
	</div> 

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'artist' ), '<span class="edit-link">', '</span>' ); ?>
	</footer> 
</article> 
