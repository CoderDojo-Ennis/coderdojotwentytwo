<?php
/*

*/

$terms = get_terms( array(
    'taxonomy' => 'collection',
    'orderby' => 'term_id',
    'order' => 'ASC',
    'number' => 0,
    'hide_empty' => false
) );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php $block_content = do_blocks( '<!-- wp:query {"queryId":19,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":2},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template -->
<!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:post-featured-image {"isLink":true,"width":"","height":""} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-excerpt /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->'
    ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">
    <header class="wp-block-template-part site-header">
        <?php block_header_area(); ?>
    </header>
    <section class="wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
        <h1 class="has-text-align-center wp-block-post-title">Find a path</h1>
    </section>
    <main class="is-layout-constrained wp-block-group" id="wp--skip-link--target">
        <article class="is-layout-constrained wp-block-group">
            <p class="has-text-align-center wp-block-post-excerpt">Paths are a series of 6 projects that help to build your coding and design skills. Paths will help you gain new skills, then make design choices to personalise your projects, and finally create something unique.</p>
            <h2 class="has-text-align-center">What do you want to make with?</h2>
        </article>
        <aside class="is-layout-flow wp-block-query alignwide">
            <ul class="is-layout-flow is-flex-container columns-2 wp-block-post-template wp-block-cards">
				<?php foreach($terms as $term) : ?>
                    <li class="wp-block-post post-24 pathway type-pathway status-publish has-post-thumbnail hentry collection-physical-computing">
                        <div class="is-layout-flex wp-container-10 wp-block-columns alignwide">
                            <div class="is-layout-flow wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
                                <figure class="wp-block-post-featured-image">
                                    <a href="<?php echo get_term_link($term) ?>" target="_self">
                                        <img width="689" height="362" src="<?php echo get_bloginfo('template_url') . '/assets/images/' . $term->slug . '.png' ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                                    </a>
                                </figure>
                            </div>
                            <div class="is-layout-flow wp-block-column" style="flex-basis:33.33%">
                                <h2 class="wp-block-post-title">
                                    <a href="<?php echo get_term_link($term) ?>" target="_self"><?php echo $term->name ?></a>
                                </h2>
                                <div class="wp-block-post-excerpt">
                                    <p class="wp-block-post-excerpt__excerpt"><?php echo $term->description  ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
				<?php endforeach; ?>
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
