<?php
/*

*/
$term = get_queried_object();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php
    $block_content = do_blocks( '<!-- wp:query {"queryId":40,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"aside","displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
<aside class="wp-block-query alignwide"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

<!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-excerpt /-->
<!-- /wp:post-template --></aside>
<!-- /wp:query -->'
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
    <section class="wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
        <h1 class="has-text-align-center wp-block-post-title">Learning Paths</h1>
    </section>
    <main class="is-layout-constrained wp-block-group" id="wp--skip-link--target">
        <article class="is-layout-constrained wp-block-group">
            <h1 class="has-text-align-center wp-block-query-title"><?php echo $term->name; ?></h1>
            <p class="has-text-align-center"><?php echo $term->description; ?></p>
        </article>
        <aside class="is-layout-flow wp-block-query alignwide">
            <ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template wp-block-cards">
                <?php if ( have_posts() ) { while ( have_posts() ) { the_post();?>
                    <li class="wp-block-post post-18 pathway type-pathway status-publish has-post-thumbnail hentry collection-scratch">
                        <figure class="alignwide wp-block-post-featured-image">
                            <a href="<?php echo get_the_permalink() ?>" target="_self">
                                <img width="688" height="361" src="<?php echo get_the_post_thumbnail_url() ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                            </a>
                        </figure>
                        <h2 class="wp-block-post-title">
                            <a href="<?php echo get_the_permalink() ?>" target="_self"><?php echo get_the_title() ?></a>
                        </h2>
                        <div class="wp-block-post-excerpt">
                            <p class="wp-block-post-excerpt__excerpt"><?php echo get_the_excerpt() ?></p>
                        </div>
                    </li>
                <?php } } ?>
            </ul>
        </aside>
    </main>
    <footer class="wp-block-template-part site-footer">
        <?php block_footer_area(); ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
