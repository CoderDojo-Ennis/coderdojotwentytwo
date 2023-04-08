<?php 
/**
 * The template for displaying the primary taxonomy terms for the selected custom post type
 *  - Programming Languages
 *      - Scratch Archive
 *      - HTML Archive
 *      - JavaScript Archive
 *      - Python Archive
 *      - App Inventor
 *  - The Hardware Lab
 *  - The Studio Archive
 *  - The Arcade Archive
 *  - Other Resources Archive
 * 
 * These pages should not display just posts but rather the posts grouped by the resource type
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CoderDojo
 * @subpackage CoderDojo
 * @since 1.0.0
 */

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
        <?php get_template_part( 'parts/post-hero', null,
            array(
            'post_thumbnail' => false,
            'post_title' => get_the_archive_title(),
            'post_excerpt' => get_the_archive_description()
            )
        ); ?>
        <main class="is-layout-constrained has-green-95-white-background-color has-background wp-block-group" id="wp--skip-link--target">
            <aside class="is-layout-flow wp-block-query alignwide">
                <ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template wp-block-cards">
	            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                    get_template_part( 'parts/post-template', null,
                    array(
                    'post_link'=> get_the_permalink(),
                    'post_thumbnail' => get_the_post_thumbnail_url(),
                    'post_title' => get_the_title(),
                    'post_excerpt' => get_the_excerpt(),
                    'post_level' => false
                    ));
                endwhile;
		            posts_nav_link();
                else:
                    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
                endif; ?>
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