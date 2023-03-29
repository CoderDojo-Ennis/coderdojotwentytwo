<?php
/*

*/
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
        <section class="wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
            <h1 class="has-text-align-center wp-block-post-title">CoderDojo Kata</h1>
        </section>
        <main class="is-layout-constrained wp-block-group" id="wp--skip-link--target">
            <article class="is-layout-constrained wp-block-group">
                <h1 class="has-text-align-center wp-block-query-title"><?php echo $term->name; ?></h1>
                <p class="has-text-align-center"><?php echo $term->description; ?></p>
            </article>
            <aside class="is-layout-flow wp-block-query alignwide">
		        <?php $areas =  coderdojo_kata_get_area_terms();
		        foreach ($areas as $area):

			        $groups = coderdojo_kata_get_group_terms($area->term_id, 5);

			        echo '<section class="section">';
			        echo '<h2 class="has-text-align-center">' . $area->name . '</h2>';
			        echo '<p class="has-text-align-center">' . $area->description . '</p>';
			        echo '<ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template wp-block-cards">';

			        $count = 0;
			        foreach($groups as $group) :
				        if($count < 5) :?>
                            <li class="wp-block-post post-18 pathway type-pathway status-publish has-post-thumbnail hentry collection-scratch">
                                <figure class="alignwide wp-block-post-featured-image">
                                    <a href="<?php echo get_term_link($group)?>" target="_self">
                                        <img width="688" height="361" src="<?php echo get_bloginfo('template_url') . '/assets/images/' . $group->slug . '.png' ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                                    </a>
                                </figure>
                                <h2 class="has-text-align-center wp-block-post-title">
                                    <a href="<?php echo get_term_link($group) ?>" target="_self"><?php echo $group->name ?></a>
                                </h2>
                                <div class="has-text-align-center wp-block-post-excerpt">
                                    <p class="wp-block-post-excerpt__excerpt"><?php echo $group->description ?></p>
                                </div>
                            </li> <?php
				        endif;
				        ++$count;
			        endforeach;

			        if($count == 5) :
				        echo '<li class="section-list-item sushi-cards">';
				        echo '<a class="card-link" href="' . $current_url . '/' . $area->slug . '">';
				        echo '<h3 class="card-heading">View All</h3>';
				        echo '</a>';
				        echo '</li>';
			        endif;

			        echo '</ul>';
			        echo '</section>';
		        endforeach; ?>

            </aside>
        </main>
        <footer class="wp-block-template-part site-footer">
			<?php block_footer_area(); ?>
        </footer>
    </div>
	<?php wp_footer(); ?>
    </body>
</html>



