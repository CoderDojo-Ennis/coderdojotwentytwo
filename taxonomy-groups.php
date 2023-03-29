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

$groups_slug = $wp_query->query_vars['groups'];
$groups_term = array(
    get_term_by( 
        'slug',
        $groups_slug,
        'groups'
    )
);
//Check if queried var containes 'types' query
if (array_key_exists('types', $wp_query->query_vars)) {
    // Currently on 'types' page
    // Display type and list of posts
    $types_slug = $wp_query->query_vars['types'];
    $sections = array(
        get_term_by( 
            'slug',
            $types_slug,
            'types'
        )
    );
    $number_posts = -1;
} else {
    // Currently on 'groups' page
    if($groups_term[0]->parent == 0){
        // Display child groups
        $sections = coderdojo_kata_get_group_terms($groups_term[0]->term_id);
        $number_posts = 5;
    } else {
        // Display types and posts
        $sections = coderdojo_kata_get_type_terms();
        $number_posts = 5;
    }
}
global $wp;
$current_url = home_url( $wp->request );
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
        <section class="is-layout-constrained wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
            <section class="is-layout-flex wp-block-columns alignwide">
                <div class="is-layout-flow wp-block-column" style="flex-basis:60%">
                    <h1 class="wp-block-post-title"><?php echo $groups_term[0]->name; ?></h1>
                    <div class="wp-block-post-excerpt">
                        <p class="wp-block-post-excerpt__excerpt"><?php echo $groups_term[0]->description; ?></p>
                    </div>
                </div>
                <div class="is-layout-flow wp-block-column" style="flex-basis:40%">
                    <figure class="wp-block-post-featured-image">
                        <img width="688" height="361" src="<?php echo get_bloginfo('template_url') . '/assets/images/' . $groups_term[0]->slug. '.png' ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                    </figure>
                </div>
            </section>
        </section>
        <main class="is-layout-constrained wp-block-group has-green-95-white-background-color has-background" id="wp--skip-link--target">
            <aside class="is-layout-flow wp-block-query alignwide">
		        <?php if($groups_term[0]->parent == 0){
			        echo '<ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template wp-block-cards">';
			        foreach($sections as $section):?>
                        <li class="wp-block-post post-18 pathway type-pathway status-publish has-post-thumbnail hentry collection-scratch">
                            <figure class="alignwide wp-block-post-featured-image">
                                <a href="<?php echo get_term_link($section) ?>" target="_self">
                                    <img width="688" height="361" src="<?php echo get_bloginfo('template_url') . '/assets/images/' . $section->slug. '.png' ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
                                </a>
                            </figure>
                            <h2 class="has-text-align-center wp-block-post-title">
                                <a href="<?php echo get_term_link($section) ?>" target="_self"><?php echo $section->name ?></a>
                            </h2>
                            <div class="has-text-align-center wp-block-post-excerpt">
                                <p class="wp-block-post-excerpt__excerpt"><?php echo $section->description ?></p>
                            </div>
                        </li><?php
			        endforeach;
			        echo '</ul>';
		        } else {
			        $args = array(
				        'numberposts'	=> $number_posts,
				        'post_type'		=> 'sushi_shoe',
				        'relation'		=> 'AND',
				        'tax_query'		=> array(
					        array(
						        'taxonomy'	=> 'groups',
						        'field'		=> 'slug',
						        'terms'		=> $groups_term[0]->slug
					        )
				        )
			        );
			        $posts = get_posts( $args );
			        echo '<section class="has-global-padding wp-block-group">';
			        echo '<h2 class="has-text-align-center">Learning Paths</h2>';
			        echo '<p class="has-text-align-center">Hello</p>';
			        echo '<ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template wp-block-cards">';

			        $count = 0;
			        foreach ($posts as $post):?>
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
				        <?php get_template_part('template-parts/content/link-card');
				        ++$count;
			        endforeach;
			        echo '</ul>';
			        echo '</section>';
			        foreach($sections as $section):

				        $args = array(
					        'numberposts'	=> $number_posts,
					        'post_type'		=> 'sushi_deck',
					        'relation'		=> 'AND',
					        'tax_query'		=> array(
						        array(
							        'taxonomy'	=> 'groups',
							        'field'		=> 'slug',
							        'terms'		=> $groups_term[0]->slug
						        ),
						        array(
							        'taxonomy'	=> 'types',
							        'field'		=> 'slug',
							        'terms'		=> $section->slug
						        )
					        )
				        );

				        $posts = get_posts( $args );

				        if(!empty($posts)) {

					        echo '<section class="has-global-padding wp-block-group">';
					        echo '<h2 class="has-text-align-center">' . $section->name . '</h2>';
					        echo '<p class="has-text-align-center">' . $section->description . '</p>';
					        echo '<ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template wp-block-cards">';

					        $count = 0;
					        foreach ($posts as $post):
						        $level = get_the_terms( $post->ID, 'levels' ); ?>
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
                                        <figure class="alignwide wp-block-post-featured-image">
                                            <img class="card-img" src="<?php echo get_bloginfo('template_url') . '/assets/images/' . $level[0]->slug . '.png' ?>" />
                                        </figure>
                                    </div>
                                </li>
						        <?php get_template_part('template-parts/content/link-card');
						        ++$count;
					        endforeach;

					        if($count == 5) :
						        echo '<li class="section-list-item sushi-cards">';
						        echo '<a class="card-link" href="' . $current_url . '/' . $section->slug . '">';
						        echo '<h3 class="card-heading">View All</h3>';
						        echo '</a>';
						        echo '</li>';
					        endif;
					        echo '</ul>';
					        echo '</section>';
				        }
			        endforeach;

		        }



		        ?>
            </aside>
        </main>
        <footer class="wp-block-template-part site-footer">
			<?php block_footer_area(); ?>
        </footer>
    </div>
	<?php wp_footer(); ?>
    </body>
</html>