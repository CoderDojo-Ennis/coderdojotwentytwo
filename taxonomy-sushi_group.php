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

$groups_slug = $wp_query->query_vars['sushi_group'];
$groups_term = array(
    get_term_by( 
        'slug',
        $groups_slug,
        'sushi_group'
    )
);

//Check if queried var containes 'types' query
if (array_key_exists('sushi_type', $wp_query->query_vars)) {
    // Currently on 'types' page
    // Display type and list of posts
    $types_slug = $wp_query->query_vars['sushi_type'];
    $sections = array(
        get_term_by( 
            'slug',
            $types_slug,
            'sushi_type'
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
        <?php get_template_part( 'parts/post-hero', null,
            array(
                'post_thumbnail' => ($groups_term[0]->parent == 0) ? false : get_bloginfo('template_url') . '/assets/images/' . $groups_term[0]->slug. '.png',
                'post_title' => $groups_term[0]->name,
                'post_excerpt' => $groups_term[0]->description
            )
        ); ?>
        <main class="is-layout-constrained has-green-95-white-background-color has-background wp-block-group" style="margin-top:0; padding-top: 0; padding-bottom:0;" id="wp--skip-link--target">
        <?php if($groups_term[0]->parent == 0) :?>
            <section class="wp-block-group alignwide">
                <div class="wp-block-query alignwide is-layout-flow">
                    <ul class="is-flex-container columns-3 wp-block-post-template wp-block-cards alignwide is-layout-flow">
			        <?php foreach($sections as $section):
				        get_template_part( 'parts/post-template', null,
					        array(
						        'post_link'=> get_term_link($section),
						        'post_thumbnail' => get_bloginfo('template_url') . '/assets/images/' . $section->slug . '.png',
						        'post_title' => $section->name,
						        'post_excerpt' => $section->description,
						        'post_level' => false
					        ));
			        endforeach;
			        echo '</ul>';
                echo '</div>';
            echo '</section>';
        else :
            if ($number_posts == 5 ) :
            $args = array(
                'numberposts'	=> $number_posts,
                'post_type'		=> 'sushi_shoe',
                'relation'		=> 'AND',
                'order'         => 'ASC',
                'tax_query'		=> array(
                    array(
                        'taxonomy'	=> 'sushi_group',
                        'field'		=> 'slug',
                        'terms'		=> $groups_term[0]->slug
                    )
                )
            );
            $posts = get_posts( $args );
            if($posts) :
			        $post_type_obj = get_post_type_object( 'sushi_shoe' );?>
                <section class="wp-block-group has-global-padding has-green-95-white-background-color alignwide has-background is-layout-constrained">
                    <h2 class="wp-block-heading has-text-align-center"><?php echo $post_type_obj->labels->name; ?></h2>
                    <p class="has-text-align-center"><?php echo $post_type_obj->description; ?></p>
                    <div class="wp-block-query has-global-padding alignwide is-layout-flow">
                        <ul class="is-flex-container columns-3 wp-block-post-template wp-block-cards is-layout-flow">
                            <?php foreach ($posts as $post):
                                get_template_part( 'parts/post-template', null,
                                    array(
                                        'post_link'=> get_the_permalink($post->ID),
                                        'post_thumbnail' => get_the_post_thumbnail_url($post->ID),
                                        'post_title' => $post->post_title,
                                        'post_excerpt' => $post->post_excerpt,
                                        'post_level' => false
                                    ));
                            endforeach;
			            echo '</ul>';
                    echo '</div>';
                echo '</section>';
            endif;
            endif;

            foreach($sections as $section):
                $args = array(
                    'numberposts'	=> $number_posts,
                    'post_type'		=> 'sushi_deck',
                    'relation'		=> 'AND',
                    'tax_query'		=> array(
                        array(
                            'taxonomy'	=> 'sushi_group',
                            'field'		=> 'slug',
                            'terms'		=> $groups_term[0]->slug
                        ),
                        array(
                            'taxonomy'	=> 'sushi_type',
                            'field'		=> 'slug',
                            'terms'		=> $section->slug
                        )
                    )
                );

                $posts = get_posts( $args );

                if($posts) : ?>
                <section class="wp-block-group has-global-padding has-background alignwide is-layout-constrained">
                    <h2 class="wp-block-heading has-text-align-center"><?php echo $section->name ?></h2>
                    <p class="has-text-align-center"><?php echo $section->description ?></p>
                    <div class="wp-block-query has-global-padding alignwide is-layout-flow">
                        <ul class="is-flex-container columns-3 wp-block-post-template wp-block-cards is-layout-flow">
                            <?php foreach ($posts as $post):
                                $levels = get_the_terms( $post->ID, 'sushi_level' );
                                get_template_part( 'parts/post-template', null,
                                    array(
                                        'post_link'=> get_the_permalink($post->ID),
                                        'post_thumbnail' => get_the_post_thumbnail_url($post->ID),
                                        'post_title' => $post->post_title,
                                        'post_excerpt' => $post->post_excerpt,
                                        'post_level' => $levels
                                    ));
                            endforeach;

                            if(count($posts) == 5) :
                                get_template_part( 'parts/post-template', null,
                                    array(
                                        'post_link'=> $current_url . '/' . $section->slug,
                                        'post_thumbnail' => false,
                                        'post_title' => "View All",
                                        'post_excerpt' => "",
                                        'post_level' => false
                                    ));
                            endif; ?>
                        </ul>
                    </div>
                </section>
            <?php endif; endforeach;
        endif;?>

    </main>
    <footer class="wp-block-template-part site-footer">
        <?php block_footer_area(); ?>
    </footer>
</div>
	<?php wp_footer(); ?>
    </body>
</html>
