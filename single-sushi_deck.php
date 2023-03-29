<?php
/*

*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php
    $block_content = do_blocks( '<!-- wp:group {"tagName":"main","backgroundColor":"green-95-white","layout":{"type":"constrained"}} -->
<main class="wp-block-group">  <!-- wp:group {"tagName":"section","align":"full","backgroundColor":"green-40-white","layout":{"type":"default"}} -->
  <section class="wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
    <!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false} /-->
  </section>
  <!-- /wp:group -->
  <!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:post-title /-->

<!-- wp:post-terms {"term":"post_tag"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:post-featured-image /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:page-list /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"75%"} -->
<div class="wp-block-column" style="flex-basis:75%"><!-- wp:post-content /--></div>
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
    <section class="is-layout-constrained wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
        <section class="is-layout-flex wp-block-columns alignwide">
            <div class="is-layout-flow wp-block-column" style="flex-basis:60%">
                <h1 class="wp-block-post-title"><?php echo get_the_title() ?></h1>
                <div class="wp-block-post-excerpt">
                    <p class="wp-block-post-excerpt__excerpt"><?php echo get_the_excerpt() ?></p>
                </div>
            </div>
            <div class="is-layout-flow wp-block-column" style="flex-basis:40%">
                <figure class="wp-block-post-featured-image">
				    <?php the_post_thumbnail() ?>
                </figure>
            </div>
        </section>
    </section>
    <main class="is-layout-constrained wp-block-group has-green-95-white-background-color has-background" id="wp--skip-link--target">
        <section class="is-layout-flex wp-container-13 wp-block-columns alignwide">
            <aside class="is-layout-flow wp-block-column has-white-background-color has-background" style="flex-basis:25%">
                <ul class="wp-block-page-list">
                    <li class="wp-block-pages-list__item">
                        <a class="wp-block-pages-list__item__link" href="http://kata-blank.local/sample-page/">Sample Page</a>
                    </li>
                    <li class="wp-block-pages-list__item">
                        <a class="wp-block-pages-list__item__link" href="http://kata-blank.local/sample-page-2/">Sample Page</a>
                    </li>
                </ul>
            </aside>
            <article class="is-layout-flow wp-block-column has-white-background-color has-background" style="flex-basis:75%">
				<?php echo get_the_content() ?>
            </article>
        </section>
    </main>
    <footer class="wp-block-template-part site-footer">
        <?php block_footer_area(); ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
