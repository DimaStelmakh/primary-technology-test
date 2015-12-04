<?php

/**
 * Function that can display all posts of each categories via shortcode.
 * Shortcode must look like [category slug="slug category"]
 */


function my_short($atts)
{

    extract(shortcode_atts(array(
        'slug' => '',
    ),
        $atts));

    $out = '';
    $query = new WP_Query('category_name=' . $slug);
    if ($query->have_posts()) { ?>
        <?php while ($query->have_posts()) {
            $query->the_post(); ?>

            <?php $out .= '
				<table class="my_table">
					<tr> ' . display_thumbnail_and_excerpt_or_only_excerpt() . '</tr>

					<tr>
						<td>' . get_the_date() . '</td>
						<td></td>
						<td>' . display_post_format() . '</td>
					</tr>
				</table>';
            //var_dump(get_post_format()); die;?>

        <?php }
    } else {
        $out = 'There is no notes in this category';
    } ?>
    <?php wp_reset_query();

    return $out;
}

add_shortcode('category', 'my_short');



/**
 * This function designed for take a string and make the first symbol uppercase
 * considering UTF-8 encoding.
 */
if (!function_exists('mb_ucfirst') && extension_loaded('mbstring')) {

    function mb_ucfirst($str, $encoding = 'UTF-8')
    {
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) .
            mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }
}



/**
 * This function design for return the content in the loop. If thumbnail is set in thi s post, so will be returned
 * thumbnail and excerpt, else returned only excerpt.
 */
function display_thumbnail_and_excerpt_or_only_excerpt()
{
    if (has_post_thumbnail()) {
        return '<td class="thumbnail">' . get_the_post_thumbnail() . '</td>
				<td colspan="2">' . get_the_excerpt() . '</td>';
    } else {
        return '<td colspan="3">' . get_the_excerpt() . '</td>';
    }
}



/**
 * This function design for return a string of the post format with the appropriate text
 */
function display_post_format()
{
    if (has_post_format()) {
        return 'Post Format: ' . mb_ucfirst(get_post_format());
    }
}



/**
 * This function design for set the number of words in the excert
 *
 * @param $length
 * @return int
 */
function new_excerpt_length($length)
{
    return 20;
}



add_filter('excerpt_length', 'new_excerpt_length');

/**
 * This function design for set a link to read whole text of post
 *
 * @param $more
 * @return string
 */
function new_excerpt_more($more)
{
    return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">Read More >>> </a>';
}

add_filter('excerpt_more', 'new_excerpt_more');


/**
 * This function design to plug my own CSS
 */
function my_short_style()
{
    wp_register_style('style', get_template_directory_uri() . '/include/css/style.css');
    wp_enqueue_style('style');
}

add_action('wp_enqueue_scripts', 'my_short_style');


