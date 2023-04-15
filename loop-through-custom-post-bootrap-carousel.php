Loop through custom post type and create a slider

<?php add_action('astra_entry_content_after', 'custom_loop');
	  function custom_loop() {
		  $count = 0;
		  	$args = array(
		'post_type' => 'testimonials',
		'posts_per_page' => 3,
	); ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-label="previous"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-label="next"></span>
  </a>
    <div class="carousel-inner">
	<?php $blogpost = new WP_Query($args);
	while($blogpost->have_posts()) {
		$count++;
	$blogpost->the_post();
		?>
    <div class="carousel-item <?php if($count == 1) { echo 'active'; } ?>">
      <p><?php the_content(); ?></p>
      <h4><?php the_title();  ?></h4>
    </div>
		<?php
		}
		  ?> 
</div>

</div>
	 <?php }
