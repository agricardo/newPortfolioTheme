<?php
/**
 * @package  
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php artist_posted_on(); ?>
		</div> 
	</header> 

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'portfolio-full' ); } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'artist' ),
				'after'  => '</div>',
			) );
		?>
	</div> 

	<footer class="entry-footer">
		<?php artist_entry_footer(); ?>
	</footer> 
</article> 
