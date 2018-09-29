<?php
/**

 * @package Artist
 */

if ( ! function_exists( 'artist_paging_nav' ) ) :

function artist_paging_nav() {

	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'artist' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'artist' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'artist' ) ); ?></div>
			<?php endif; ?>

		</div>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'artist_post_nav' ) ) :

function artist_post_nav() {

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'artist' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'artist' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'artist' ) );
			?>
		</div> 
	</nav> 
	<?php
}
endif;

if ( ! function_exists( 'artist_posted_on' ) ) :
 
function artist_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'artist' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'artist' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'artist_entry_footer' ) ) :
 
function artist_entry_footer() {
	 
	if ( 'post' == get_post_type() ) {
		 
		$categories_list = get_the_category_list( __( ', ', 'artist' ) );
		if ( $categories_list && artist_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="genericon genericon-category"></span>' . __( 'Posted in %1$s', 'artist' ) . '</span>', $categories_list );
		}

		 
		$tags_list = get_the_tag_list( '', __( ', ', 'artist' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="genericon genericon-tag"></span>' . __( 'Tagged %1$s', 'artist' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><span class="genericon genericon-comment"></span>';
		comments_popup_link( __( 'Leave a comment', 'artist' ), __( '1 Comment', 'artist' ), __( '% Comments', 'artist' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'artist' ), '<span class="edit-link"><span class="genericon genericon-edit"></span>', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'artist' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'artist' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'artist' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'artist' ), get_the_date( _x( 'Y', 'yearly archives date format', 'artist' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'artist' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'artist' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'artist' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'artist' ) ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = _x( 'Asides', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = _x( 'Galleries', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = _x( 'Images', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = _x( 'Videos', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = _x( 'Quotes', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = _x( 'Links', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = _x( 'Statuses', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = _x( 'Audio', 'post format archive title', 'artist' );
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = _x( 'Chats', 'post format archive title', 'artist' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'artist' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'artist' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'artist' );
	}

	/**
	 * @param string 
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 
 * @todo 
 *
 * @param string  
 * @param string  
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * @see  
		 *
		 * @param string  
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 
 * @return bool
 */
function artist_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'artist_categories' ) ) ) {
 
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

 
			'number'     => 2,
		) );

 
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'artist_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
 
		return true;
	} else {
	 
		return false;
	}
}

 
function artist_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
 
	delete_transient( 'artist_categories' );
}
add_action( 'edit_category', 'artist_category_transient_flusher' );
add_action( 'save_post',     'artist_category_transient_flusher' );

 
