
<?php
/**
 * This file adds the  ABZ Campus Sectors Pages template to the Mai Reach Master Theme.
*/

/*
Template Name: ABZ Campus Sectors Landing Page (Posts)
Template Post Type: post, page, abzcampus
*/

//* Force full-width-content layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


//Removing post title from the page
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
//* Remove the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
//* Remove the post meta function
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action('genesis_loop', 'wnd_do_custom_loop');

// Add custom body class
add_filter( 'body_class', 'custom_body_class' );
function custom_body_class( $classes ) {
	$classes[] = 'abz-campus sector-page';
	return $classes;
}

function wnd_do_custom_loop()
{
    global $paged; // current paginated page
    global $query_args; // grab the current wp_query() args
    $args = array(
        'cat' => 29, /* shows all posts and child posts from category id */
        'paged' => $paged, // respect pagination
		'post_type' => 'abzcampus',
		'order' => 'DESC',
		'orderby' => 'date',
		
    );

    // The Query
    $query = new WP_Query($args);

    // The Loop
    if ($query->have_posts()) {

		?>
<h1>
		Sectors
	</h1>
<div class = "entries-wrap">
	
<?
        while ($query->have_posts()) {
            $query->the_post();
        
		//Custom fields
	    $sector_image = get_field('sector_image');
    	$sector_title = get_field('sector_title');
    	$sector_description = get_field('sector_description');
		$sector_short_title = get_field('shorter_title');
			
		?>

	    
		<div class = "course sector animated" data-delay = "0.1s">
			<a href="<?php the_permalink(); ?>">
			<? if(!empty($sector_image)) {
			?>
			<img class = "archive-img"  src="<?php echo $sector_image['url']; ?>" alt="<?php echo $sector_image['alt']; ?>" >
			<?
		}
		?>
			</a>
			
			<div class = "course-content sector-content">	
			<?
			if($sector_short_title) {
				?> <h2>
			<a href="<?php the_permalink(); ?>"><?php echo $sector_short_title;?></a>
			</h2>
			<?
			}
			else if($sector_title) {
				?> <h2>
			<a href="<?php the_permalink(); ?>"><?php echo $sector_title;?></a>
			</h2>
			<?
			}
			
		?>
		</div>
				
			
		</div>
        
		<?php

        } // End while
		?>
</div>
	<?
    } // End if

    // Restore original Post Data
    wp_reset_postdata();
}
// Start the engine.

genesis();