<?php
?>
<li class="wp-block-post wp-block-card post-18 pathway type-pathway status-publish has-post-thumbnail hentry collection-scratch">
    <?php if( array_key_exists('post_thumbnail', $args) ) : ?>
        <?php if( $args['post_thumbnail'] ) : ?>
            <figure class="alignwide wp-block-post-featured-image">
                <a href="<?php echo $args['post_link'] ?>" target="_self">
                    <img alt="" width="688" height="361" src="<?php echo $args['post_thumbnail'] ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                </a>
            </figure>
        <?php endif; ?>
    <?php endif; ?>
    <h3 class="has-text-align-center wp-block-post-title" style="margin-top: 20px;">
        <a href="<?php echo $args['post_link'] ?>" target="_self" style="color: #1A1A1A; text-decoration: none; "><?php echo $args['post_title'] ?></a>
    </h3>
    <div class="wp-block-post-excerpt" style="flex-grow: 1">
        <p class="has-text-align-center wp-block-post-excerpt__excerpt"><?php echo $args['post_excerpt']?></p>
        <?php if( array_key_exists('post_level', $args) ) : ?>
            <?php if( $args['post_level'] ) : ?>
                <figure class="alignwide wp-block-post-featured-image">
                    <img class="card-img" src="<?php echo get_bloginfo('template_url') . '/assets/images/' . $args['post_level'][0]->slug . '.png' ?>" />
                </figure>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</li>
<?php