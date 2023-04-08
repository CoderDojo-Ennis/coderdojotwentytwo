<?php
/*

*/
$areas =  coderdojo_kata_get_area_terms();
$term = get_queried_object();
global $wp;
$current_url = home_url( $wp->request )
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
        <main class="wp-block-group has-global-padding has-green-95-white-background-color alignwide has-background is-layout-constrained" style="margin-top:0; padding-top: 0; padding-bottom:0;" id="wp--skip-link--target">
	        <?php get_template_part( 'parts/post-hero', null,
		        array(
			        'post_thumbnail' => false,
			        'post_title' => get_the_title(),
			        'post_excerpt' => get_the_excerpt()
		        )
            ); ?>
	        <?php foreach ($areas as $area):
	        $groups = coderdojo_kata_get_group_terms($area->term_id, 5); ?>
            <section class="wp-block-group alignfull <?php echo $area->slug; ?> has-background is-layout-constrained">
                <h2 class="wp-block-heading has-text-align-center"><?php echo $area->name ?></h2>
                <p class="has-text-align-center"><?php echo $area->description ?></p>
                <div class="wp-block-query has-global-padding alignwide is-layout-flow">
                    <ul class="is-flex-container columns-3 wp-block-post-template wp-block-cards is-layout-flow">
                        <?php foreach($groups as $group) :
                            get_template_part( 'parts/post-template', null,
                                array(
                                    'post_link'=> get_term_link($group),
                                    'post_thumbnail' => get_bloginfo('template_url') . '/assets/images/' . $group->slug . '.png',
                                    'post_title' => $group->name,
                                    'post_excerpt' => $group->description,
                                    'post_level' => false
                            ));
			            endforeach;

                        if(count($groups) == 5) :
	                        get_template_part( 'parts/post-template', null,
		                        array(
			                        'post_link'=> $current_url . '/' . $area->slug,
			                        'post_thumbnail' => false,
			                        'post_title' => "View All",
			                        'post_excerpt' => "",
			                        'post_level' => false
		                        ));
                        endif;?>
                    </ul>
                </div>
            </section>
	        <?php endforeach; ?>
        </main>
        <footer class="wp-block-template-part site-footer">
			<?php block_footer_area(); ?>
        </footer>
    </div>
	<?php wp_footer(); ?>
    </body>
</html>



