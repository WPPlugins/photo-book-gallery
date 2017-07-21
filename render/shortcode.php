<div class="pb-wrap">
    <div class="wcp-loader"></div>
    <?php
        if ($book_meta['images'] != '') {
            $all_images = json_decode($book_meta['images']);
            if (isset($all_images[0])) {
                echo '<div><img class="wcp-size-image" style="display:none;" src="'.$all_images[0].'"></div>';
            } else {
                echo '<div><img class="wcp-size-image" style="display:none;" src="'.$all_images[0]->image.'"></div>';
            }
        }
    ?>

    <div class="flipbook" id="<?php echo $atts['id']; ?>">
    <?php
        if ($book_meta['images'] != '') {
            $all_images = json_decode($book_meta['images']);
            foreach ($all_images as $value) {
                if (is_string($value)) {
                    echo '<div><img src="'.$value.'"></div>';
                } else {
                    echo '<div><img src="'.$value->image.'"></div>';
                }
            }
        }
    ?>
    </div>
</div>