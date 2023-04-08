<?php
/*

*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php
    $block_content3 = do_blocks( '<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-title /-->

<!-- wp:post-terms {"term":"post_tag"} /-->

<!-- wp:post-excerpt /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-content /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:query {"queryId":59,"query":{"perPage":3,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"tagName":"aside","align":"wide"} -->
<aside class="wp-block-query alignwide"><!-- wp:post-template -->
<!-- wp:columns {"verticalAlignment":null,"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%"><!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-excerpt /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Start Project</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":""} -->
<div class="wp-block-column"><!-- wp:post-featured-image {"isLink":true} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></aside>
<!-- /wp:query --></main>
<!-- /wp:group -->'
    );
	$block_content3 = do_blocks( '<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-title /-->

<!-- wp:post-terms {"term":"post_tag"} /-->

<!-- wp:post-excerpt /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-content /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:query {"queryId":59,"query":{"perPage":3,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"tagName":"aside","align":"wide"} -->
<aside class="wp-block-query alignwide"><!-- wp:post-template -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-excerpt /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":""} -->
<div class="wp-block-column"><!-- wp:post-featured-image {"isLink":true} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></aside>
<!-- /wp:query --></main>
<!-- /wp:group -->'
	);
    ?>
    <?php $args = array(
        'numberposts'      => -1,
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'post_type'        => 'sushi_deck',
        'post_parent' =>        $post->ID
    );
    $posts= get_posts( $args );
    $block_content2 = do_blocks( '<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:query {"queryId":15,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"list","columns":2},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"className":"wp-block-cards"} -->
<!-- wp:html -->
<details><summary>
<!-- /wp:html -->

<!-- wp:post-title /-->

<!-- wp:html -->
</summary>
<!-- /wp:html -->

<!-- wp:columns {"verticalAlignment":null} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-excerpt /-->

<!-- wp:read-more {"content":"Start Project"} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"></div>
<!-- /wp:buttons -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Start Project</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-featured-image /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:html -->
</details>
<!-- /wp:html -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
<!-- wp:media-text {"mediaPosition":"right","mediaId":5003,"mediaLink":"http://coderdojo.local/kata/projects/swarms-schools-and-flocks/swarms-schools-flocks/","mediaType":"image","verticalAlignment":"center"} -->
<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center"><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…"} -->
<p>Hello 1</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Start</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div><figure class="wp-block-media-text__media"><img src="http://coderdojo.local/wp-content/uploads/2023/03/swarms-schools-flocks.png" alt="" class="wp-image-5003 size-full"/></figure></div>
<!-- /wp:media-text -->'
    );?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">
    <header class="wp-block-template-part site-header">
        <?php block_header_area(); ?>
    </header>
	<?php get_template_part( 'parts/post-hero', null,
		array(
			'post_thumbnail' => get_the_post_thumbnail_url(),
			'post_title' => get_the_title(),
			'post_excerpt' => get_the_excerpt()
		));?>
    <main class="is-layout-constrained has-green-95-white-background-color has-background wp-block-group" id="wp--skip-link--target">
        <article class="is-layout-flex wp-container-10 wp-block-columns alignwide">
	        <?php echo get_the_content() ?>
        </article>
        <aside class="is-layout-flow wp-block-query alignwide">
            <ul class="is-layout-flow wp-block-post-template">
                <?php foreach($posts as $post) : ?>
                    <li class="wp-block-post wp-block-card post-47 project type-project status-publish has-post-thumbnail hentry">
                        <details open class="wp-block-details">
                            <summary class="wp-block-summary">
                                <h2 class="wp-block-post-title"><?php echo get_the_title() ?></h2>
                            </summary>
                            <div class="wp-block-media-text wp-block-details__details alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center">
                                <div class="wp-block-media-text__content">
                                    <div class="wp-block-post-excerpt">
                                        <p class="wp-block-post-excerpt__excerpt"><?php the_excerpt() ?></p>
                                    </div>
                                    <div class="wp-block-buttons is-layout-flex">
                                        <div class="wp-block-button">
                                            <a class="wp-block-button__link wp-element-button" href="<?php echo get_permalink() ?>" target="_self">Start Project</a>
                                        </div>
                                    </div>
                                </div>
                                <figure class="wp-block-media-text__media">
                                    <a href="<?php echo get_permalink() ?>" target="_self">
		                                <?php the_post_thumbnail() ?>
                                    </a>
                                </figure>
                            </div>
                        </details>
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
