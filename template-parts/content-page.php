<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MEBBR
 */

?>


<?php if( is_singular( $post_types ) ){
	get_template_part( 'navigation' );
}
?>

<article id="main" class="hyphenate">
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div id="autor_card">
				<a id="avatar_card--link" href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?></a>
				<div class="post_meta">
					<a id="autor_url" href="<?php echo get_the_author_meta('url'); ?>" target="_blank"><?php the_author(); ?></a>
					<span class="post_date"><?php
                        $pdate = get_the_date("Y", $echo = false);
                        $cdate = date("Y");
                        if ($pdate == $cdate){
                            echo get_the_date("d F", $echo = false);
                        }else{
                            the_date();
                        }
                    ?></span>
					<span class="reading_time"><?php _e( '🕑', ' ' ); ?> <?php echo gp_read_time(); ?> <?php _e( 'мин', ' ' ); ?></span>
				</div>
			</div><!-- .entry-meta -->
		<?php endif; 
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mebbr' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mebbr' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
