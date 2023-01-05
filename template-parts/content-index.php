<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MEBBR
 */

?>

<?php 
$post_types = get_post_types();
if( is_singular( $post_types ) ){
	get_template_part( 'navigation' );
}
?>

<div class="card">
	<a href="<?php the_permalink(); ?>">
		<img class="card_img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" onerror="this.style.display = 'none'" />
	</a>
	<div class="padding">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="title">', '</h1>' );
			else :
				the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
		<div class="cat">
			<?php the_category(); ?>
		</div>
		<?php the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Читать<span class="screen-reader-text"> "%s"</span>', 'mebbr' ),
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
	</div>
</div><!-- .entry-content -->
