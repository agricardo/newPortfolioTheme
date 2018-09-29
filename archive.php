<?php
/**
 
 * @package  
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header> 

			<?php  ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
 
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php artist_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main> 
	</div> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>
