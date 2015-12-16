<?php
function my_gallery_slider()
{
    $images = get_posts([
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
    ]);

    if ($images) {
        $output = gallery_slider_output($images);
        return $output;
    }
}

function gallery_slider_output($images)
{
    ob_start();
    include 'gallery-slider-on-page.php';
    $output = ob_get_clean();
    return $output;
}
