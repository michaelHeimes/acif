<?php 
/**
 * Template Name: Team Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
<!-- 			    <a href="#distributions-performance" data-smooth-scroll="">Distribution &amp; Performance</a> -->
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>		
			    
			    
			    <?php if( have_rows('team_members') ):?>	
			    <div id="team"></div>	    
			    	<?php while ( have_rows('team_members') ) : the_row();?>	
				    <section class="team-member utility">
					    <div class="grid-container">
						    <div class="utility grid-x grid-padding-x">	
	
					    	<?php if( have_rows('single_member') ):?>
				    			<?php while ( have_rows('single_member') ) : the_row();?>	
							    <div class="left cell small-12 medium-6 tablet-5">
							    	<h2><?php the_sub_field('name');?></h2>
							    	<div class="title has-pipe"><?php the_sub_field('title');?></div>
							    </div>
		
							    <div class="right cell small-12 medium-6 tablet-offset-1">
									<?php the_sub_field('bio_copy');?>
								</div>
						    	
						    	<?php endwhile;?>			    	
						    <?php endif;?>				    

						    </div>
					    </div>
				    </section>				    	
			    	<?php endwhile;?>			    	
			    <?php endif;?>
			    

				<div class="img-wrap text-center">	    
					
			        <?php
					$image = get_field('full_width_image');
					if( !empty( $image ) ): ?>
					    <img class="fw-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif;?>					
					
				</div>
					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>