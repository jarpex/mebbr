<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MEBBR
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

            $categories = get_the_category($post->ID);
            if ($categories) {
                echo '<div id="related">';
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>5,
                    'orderby'=>rand(),
                    'caller_get_posts'=>1);
                $my_query = new wp_query($args);
                if( $my_query->have_posts() ) {
                    echo '<div id="related-header"><h2>Материалы по теме</h2><img draggable="false" role="img" height="30" width="30" class="emoji" alt="🔮" src="//static.mebbr.ru/fonts/mebbr/1f52e.svg"></div><div id="related-container"><ul>';
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                          if( ! empty( $post->post_title ) ) {
							echo '<li><a class="rel-title" href="' . get_permalink() . '">';
							the_title();
							echo '</a></li>';
						  }
                    }
                }
                wp_reset_query();
                echo '</ul></div><hr>';
			}
        	if( has_tag() ) {
				echo '<div id="article_tags">';
            
                $posttags = get_the_tags();
                $html = "";
                if( $posttags ){
                    foreach( $posttags as $tag ){
                        $html .= '<a href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a>';
                    }
                    echo $html;
                }
            	echo '</div>';
			}
        	echo '</div>';

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
