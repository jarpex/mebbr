<?php add_theme_support(
			'html5',
			array(
				'search-form',
				'gallery',
				'caption',
			)
		); 
?>
<?php add_theme_support( 'post-thumbnails' ); ?>
<?php function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) { $end = strpos($link, '"',$offset); }
	if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link'); ?>
<?php function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="navigation">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
} ?>
<?php 
//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');
?>
<?php
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
  if ($result === false) {
      $displayable_image_types = array( IMAGETYPE_WEBP );
      $info = @getimagesize( $path );

      if (empty($info)) {
          $result = false;
      } elseif (!in_array($info[2], $displayable_image_types)) {
          $result = false;
      } else {
          $result = true;
      }
  }

  return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
?>
<?php
if ( ! function_exists( 'gp_read_time' ) ) {
    function gp_read_time() {
    $text = get_the_content( '' );
    $words = str_word_count( strip_tags( $text ), 0, 'абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ' );
    if ( !empty( $words ) ) {
    $time_in_minutes = ceil( $words / 200 );
    return $time_in_minutes;
    }
    return false;
    }
    }
?>
<?php
add_filter( 'preprocess_comment', 'wpb_preprocess_comment' );
  
function wpb_preprocess_comment($comment) {
    if ( strlen( $comment['comment_content'] ) > 5000 ) {
        wp_die('Ого сколько ты написал! Попробуй-ка уложиться в 5000 символов с:');
    }
    return $comment;
}
?>
<?php
remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );
?>