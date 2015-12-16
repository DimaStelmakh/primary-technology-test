<div class="owl-carousel">

        <?php foreach ($images as $image) { ?>
            <?php $src = wp_get_attachment_url($image->ID);?>

            <div class="item">
                <img src="<?php echo $src; ?>" alt="">
            </div>

        <?php } ?>

</div>




