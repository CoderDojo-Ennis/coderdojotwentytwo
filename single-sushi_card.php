<?php
/*

*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php
    $block_content = do_blocks( '
		<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:post-title {"level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->

<!-- wp:post-terms {"term":"category"} /-->

<!-- wp:post-excerpt /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:post-featured-image /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->'
    );
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">
    <header class="wp-block-template-part site-header">
        <?php block_header_area(); ?>
    </header>
    <?php
    echo $block_content;
    $args = array(
        'numberposts'      => -1,
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'post_type'        => 'project',
        'post_parent' =>        $post->ID
    );
    $posts= get_posts( $args );
    echo '<div class="has-global-padding is-layout-constrained wp-block-group"><div class="is-layout-flow wp-block-query alignwide">';
    echo '<ul class="is-layout-flow is-flex-container alignwide columns-3 wp-block-post-template">';
    foreach($posts as $post) :
        echo '<li class="wp-block-post">';
        echo '<a class="card-link" href="'. get_permalink().'">';
        echo '<figure class="wp-block-cards wp-block-post-featured-image">';
        the_post_thumbnail();
        echo '</figure>';
        the_title('<h3 class="wp-block-post-title">', '</h3>');
        echo '<div class="wp-block-post-excerpt"><p class="wp-block-post-excerpt__excerpt">';
        the_excerpt();
        echo '</p></div></a>';
        echo '</li>';
    endforeach;
    echo '</ul>';
    echo '</div></div>';
    ?>
    <footer class="wp-block-template-part site-footer">
        <?php block_footer_area(); ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
