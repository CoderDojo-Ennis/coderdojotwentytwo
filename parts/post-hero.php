<?php

?>
<section class="is-layout-constrained wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
    <?php if( $args['post_thumbnail'] ) : ?>
        <section class="wp-block-columns alignwide">
            <div class="is-layout-flow wp-block-column" style="flex-basis:60%">
                <h1 class="wp-block-post-title"><?php echo $args['post_title']  ?></h1>
                <div class="wp-block-post-excerpt">
                    <p class="wp-block-post-excerpt__excerpt"><?php echo $args['post_excerpt']  ?></p>
                </div>
            </div>
            <div class="is-layout-flow wp-block-column" style="flex-basis:40%">
                <figure class="wp-block-post-featured-image">
                    <img class="wp-block-image" src="<?php echo $args['post_thumbnail']  ?>" />
                </figure>
            </div>
        </section>
    <?php else : ?>
        <h1 class="has-text-align-center wp-block-post-title"><?php echo $args['post_title']  ?></h1>
        <div class="has-text-align-center wp-block-post-excerpt">
            <p class="wp-block-post-excerpt__excerpt"><?php echo $args['post_excerpt']  ?></p>
        </div>
    <?php endif; ?>
</section>
<?php
