<?php 
/**
 * Template Name: Literature Page
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
			    
			    
			    <?php if( have_rows('literature_categories') ):?>		    
			    	<?php while ( have_rows('literature_categories') ) : the_row();?>	
				    <section class="category-row utility">
					    <div class="grid-container">
						    <div class="utility grid-x grid-padding-x">	
				    	
				    	<?php if( have_rows('single_category') ):?>
				    		<?php while ( have_rows('single_category') ) : the_row();?>	
	
						    <div class="left cell small-12 medium-6 tablet-5">
						    	<h2 class="remove-break has-pipe"><?php the_sub_field('heading');?></h2>
						    </div>
	
						    <div class="right cell small-12 medium-6 tablet-offset-1">
							    <div class="inner grid-x grid-padding-x">
								    
								    <?php if( have_rows('documents') ):?>
								    	<?php while ( have_rows('documents') ) : the_row();?>	
								    	
								    	
								    	<?php
										$file = get_sub_field('single_document');
										if( $file ):
										
										
										    // Extract variables.
										    $url = $file['url'];
										    $title = $file['title'];
										    $caption = $file['caption'];
										    $icon = $file['icon'];
										    $id = $file['id'];
	
										    ?>
										    
										    <a class="single-file cell small-6 medium-5 medium-offset-1" href="<?php echo esc_attr($url); ?>" title="<?php echo esc_attr($title); ?>">
											    <div class="grid-x align-middle">
											        <?php
													$image = get_field('pdf_icon_image', 'option');
													if( !empty( $image ) ): ?>
													    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
													<?php endif;?>
											        <span><?php echo esc_html($title); ?></span>
											    </div>
										    </a>
										
										<?php endif; ?>
								    
								    	<?php endwhile;?>
								    <?php endif;?>
								    
							    </div>
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