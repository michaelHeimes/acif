<?php 
/**
 * Template Name: Home Page
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
			    
			    <section id="about">
				    <div class="grid-container">
					    <div class="utility grid-x grid-padding-x">
						    
						    <div class="left cell small-12 medium-6 tablet-5">
						    	<h2 class="remove-break has-pipe"><?php the_field('about_heading');?></h2>
						    </div>

						    <div class="right cell small-12 medium-6 tablet-offset-1">
							    <div class="copy-wrap">
							    	<?php the_field('about_copy');?>
							    </div>
						    </div>

					    </div>
				    </div>
			    </section>					


				<?php
					$ffImgID = get_field('ff_background_image');
					$ffImgSize = "full";
					$ffImgArr = wp_get_attachment_image_src( $ffImgID, $ffImgSize );
				
				?>
			    <section id="fund-facts">
				    <div class="bg" style="background-image: url(<?php echo $ffImgArr[0]; ?> );"></div>
				    <div class="grid-container">
					    <div class="grid-x grid-padding-x">	
						    
						    <div class="left cell small-12 medium-6 tablet-5">
						    	<h2 class="remove-break has-pipe"><?php the_field('ff_heading');?></h2>
						    </div>

						    <div class="right cell small-12 medium-6 tablet-offset-1">
						    </div>						    

						    <div class="bottom left cell small-12 medium-6 tablet-5">
						    	<h3 class="remove-break has-pipe"><?php the_field('ff_left_heading');?></h3>
						    	<div class="copy-wrap">
							    	<?php the_field('ff_left_copy');?>
						    	</div>
						    </div>

						    <div class="bottom right cell small-12 medium-6 tablet-offset-1">
						    	<h3 class="remove-break has-pipe"><?php the_field('ff_right_heading');?></h3>
						    	<div class="copy-wrap">
							    	<?php the_field('ff_right_copy');?>
						    	</div>							    
						    </div>	
						    
						    <div class="disclaimer cell small-12 tablet-9">
							    <small>
							    	<?php the_field('ff_footnote');?>
							    </small>
						    </div>
						    
					    </div>
				    </div>
			    </section>	
			    
			    <section id="distributions-performance">
				    
				    <div class="grid-container">
					    <div class="grid-x grid-padding-x">
						    
						    <div class="cell small-12 text-center">
							    
							    <?php if( have_rows('share_classes') ):?>
							    <div class="share-select-dropdown-wrap">
								    <span>View Share Class:&nbsp;&nbsp;</span>
								    
								    <div class="select-box"><span>A: RCIAX/76121C107</span><img src="/wp-content/themes/acif/assets/images/dropdown-down.svg"/></div>
								    								    
								    <div class="share-select-dropdown">
									    
								    	<?php while ( have_rows('share_classes') ) : the_row();?>	
										<?php $row = get_row_index();?>
								    	
								    	<?php if( have_rows('single_class') ):?>
								    		<?php while ( have_rows('single_class') ) : the_row();?>	
								    		
								    		<div class="option" data-shareclass="<?php the_sub_field('ticker_symbol');?>"><?php the_sub_field('full_name');?></div>
								    	
								    		<?php endwhile;?>
								    	<?php endif;?>
								    
								    	<?php endwhile;?>
									    									    	
								    </div>
								    	
							    </div>
							    <?php endif;?>
							    
						    </div>
						
					    </div>
				    </div>		
				    
				    
					<div class="grid-container">
						<div class="grid-x grid-padding-x align-spaced">
						
							<div class="result cell small-12 medium-4">
								<div class="result-inner">
									<div class="header">
										<div class="inner">
											<?php the_field('sc_column_1_heading');?>
										</div>
									</div>
									
									<div class="frame-wrap text-center">
										<iframe scrolling="yes" horizontalscrolling="no" verticalscrolling="yes" id="daily-fund" src="https://resourcerealestate.alpsinc.com/funddistribution-daily/RCIAX"></iframe>
									</div>
									
								</div>
							</div>
				
							<div class="result cell small-12 medium-4">
								<div class="result-inner text-center">
									
									<div class="header">
										<?php the_field('sc_column_2_heading');?>
									</div>
									
									<div class="frame-wrap">
										<iframe scrolling="yes" horizontalscrolling="no" verticalscrolling="yes" id="quarterly-fund" src="https://resourcerealestate.alpsinc.com/funddistribution-quarterly/RCIAX"></iframe>
									</div>
									
								</div>
							</div>
				
							<div class="result cell small-12 medium-4">
								<div class="result-inner text-center">
									
									<div class="header">
										<?php the_field('sc_column_3_heading');?>
									</div>	
									
									<div class="frame-wrap">
										<iframe scrolling="yes" horizontalscrolling="no" verticalscrolling="yes" id="daily-nav" src="https://resourcerealestate.alpsinc.com/nav-daily/RCIAX"></iframe>
									</div>
								
								</div>
							</div>					
								
							
							<div id="funds-accordion" class="accordion cell small-12">

								<?php if( have_rows('performance') ):?>
									<?php while ( have_rows('performance') ) : the_row();?>	
								
									<h3><?php the_sub_field('label');?></h3>
									
									<div id="performance" class="performance-table">
												
										<div id="performance-frame" style="position:relative; overflow: hidden;">
											<iframe scrolling="yes" style="width:100%; border: 0;" src="https://resourcerealestate.alpsinc.com/performance/RCIAX"></iframe>
										</div>
								
										<div class="disclosure">
											<?php the_sub_field('disclosure');?>
										</div>
		
									</div>
								
									<?php endwhile;?>
								<?php endif;?>
					
					
								<?php if( have_rows('historical_nav') ):?>
									<?php while ( have_rows('historical_nav') ) : the_row();?>	
									
									<h3><?php the_sub_field('label');?></h3>
									<div id="historical-nav" class="performance-table">
											
										<div class="start-date">Select <input value="Start Date" type="text"></div>
										<div class="end-date">Select <input value="End Date" type="text"></div>
								
										<div id="historical-nav-frame">
											<iframe style="position:relative;width:100%; border:0px; " src="https://resourcerealestate.alpsinc.com/historical-nav/RCIAX/"></iframe>
												
										</div>
								
								
										<div class="disclosure">
											<?php the_sub_field('disclosure');?>
										</div>
																		
									</div>
									
									<?php endwhile;?>
								<?php endif;?>
						
						
								<?php if( have_rows('distribution_history') ):?>
									<?php while ( have_rows('distribution_history') ) : the_row();?>		
									<h3><?php the_sub_field('label');?></h3>
									<div id="distribution" class="performance-table">

										<div id="distribution-frame">
											<iframe src="https://resourcerealestate.alpsinc.com/dividend/RCIAX" style="border:0px; width:100%;"></iframe>
										</div>
																			
										<div class="disclosure">
											<?php the_sub_field('disclosure');?>
										</div>

									</div>	
									
									<?php endwhile;?>
								<?php endif;?>
								
							</div>
							
							<div class="disclaimer cell small-12">
								<div class="inner">
									<small>
									<span><?php the_field('sc_disclaimer');?></span>
									<a href="#"><?php the_field('sc_disclosure_reveal_text');?></a>
									</small>
								</div>
							</div>
				
							<div class="disclosure cell small-12">
								<div class="inner" style="display: none;">
									<?php the_field('sc_disclosure');?>
								</div>
							</div>
				    
						</div>
					</div>
					
			    </section>
			    
			    
<!--
			    <section id="holdings">
				    <div class="grid-container">
					    <div class="grid-x grid-padding-x">  
						    
						    <div class="left cell small-12 medium-6 tablet-5">
						    	<h2 class="remove-break has-pipe"><?php the_field('holdings_heading');?></h2>

							</div>

						    <div class="right cell small-12 medium-6 tablet-offset-1">
							    <div class="copy-wrap">
							    	<?php the_field('holdings_copy');?>
							    </div>
						    </div>  
				
				    
						    <div class="accordion cell small-12">
							    <h3><?php the_field('holdings_accordion_label');?></h3>
							    <div id="holdings-frame" class="holdings-table">
								    <iframe src="https://resourcerealestate.alpsinc.com/holdings-full/RCIAX" style="width:100%; border:0px;"></iframe>
							    </div>
						    </div>
						    
						    <div class="disclaimer cell small-12">
							    <small>
							    	<?php the_field('holdings_disclaimer');?>
							    </small>
						    </div>
				    
					    </div>
				    </div>
			    </section>
-->


			    <section id="holdings">
				    <div class="grid-container">
					    <div class="grid-x grid-padding-x">  
						    
						    <div class="left cell small-12 medium-6 tablet-5">
						    	<h2 class="remove-break has-pipe"><?php the_field('holdings_heading');?></h2>
							    <div class="copy-wrap">
							    	<?php the_field('holdings_copy');?>
							    </div>
							</div>

						    <div class="right cell small-12 medium-6 tablet-offset-1">
							    <div class="frame-wrap">
								    <iframe src="https://resourcerealestate.alpsinc.com/holdings-daily/RCIAX" style="width:100%; border:0px;"></iframe>
							    </div>
						    </div>  
				
				    
<!--
						    <div class="accordion cell small-12">
							    <h3><?php the_field('holdings_accordion_label');?></h3>
							    <div id="holdings-frame" class="holdings-table">
								    <iframe src="https://resourcerealestate.alpsinc.com/holdings-full/RCIAX" style="width:100%; border:0px;"></iframe>
							    </div>
						    </div>
-->
						    
						    <div class="disclaimer cell small-12">
							    <small>
							    	<?php the_field('holdings_disclaimer');?>
							    </small>
						    </div>
				    
					    </div>
				    </div>
			    </section>
			    
			    			 
			    <section id="materials-documents">
					<?php
						$mdImgID = get_field('md_background_image');
						$mdImgSize = "full";
						$mdImgArr = wp_get_attachment_image_src( $mdImgID, $mdImgSize );
					
					?>
					<div class="bg" style="background-image: url(<?php echo $mdImgArr[0]; ?> );"></div>
					
				    <div class="grid-container">
					    <div class="grid-x grid-padding-x"> 
						    
						    <div class="left cell small-12 medium-6 tablet-3">
							    <?php 
								$image = get_field('documents_image');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
						    </div>

							<div class="right cell small-12 medium-6 tablet-6 tablet-offset-1">
								
								<h2><?php the_field('md_heading');?></h2>
								
								<div class="copy-wrap">
									<?php the_field('md_copy');?>
								</div>
								
								<?php 
								$link = get_field('md_link');
								if( $link ): 
								    $link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    ?>
								    <a class="view-more-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>
							</div>
			    			 
					    </div>
				    </div>
			    </section>
			    			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>