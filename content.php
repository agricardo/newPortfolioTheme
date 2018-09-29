

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php artist_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
			/
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'artist' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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