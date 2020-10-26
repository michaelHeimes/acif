<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
 			<?php if(!is_page_template('page-templates/page-coming-soon.php')):?>					
				<section id="contact">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
						
							<div class="left cell small-12 medium-6">
								<h2 class="remove-break has-pipe"><?php the_field('contact_heading', 'option');?></h2>
							    <div class="copy-wrap">
							    	<?php the_field('contact_copy', 'option');?>
							    </div>									
							</div>

							<div class="right cell small-12 medium-6">
								<div><?php bloginfo('name'); ?></div>
								<div><?php the_field('address', 'option');?></div>
								<div>F: <?php the_field('fax_number', 'option');?></div>
								<div><a href="tel:<?php echo str_replace(' ', '', get_field('phone_number', 'option'));?>">P: <?php the_field('phone_number', 'option');?></a></div>
								<div><a href="mailto:<?php the_field('email_1', 'option');?>">E: <?php the_field('email_1', 'option');?></a></div>
							</div>
						
						</div>
					</div>
				</section>
				
				<section id="disclaimer">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12">	
								<div class="small-text-wrap">				
									<?php the_field('footer_disclaimer', 'option');?>
								</div>
							</div>
						</div>
					</div>
				</section>
					
				<footer class="footer" role="contentinfo">
					
					<div class="inner-footer grid-x grid-padding-x">
						
						<div class="small-12 medium-12 large-12 cell text-center">
							<div class="source-org copyright"><small>&copy;<?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</small></div>
							<div class="address"><small><?php the_field('address', 'option');?></small></div>
							<div class="push10"><a href="https://www.push10.com/" target="_blank"><small>Web Design by Push10 Branding Agency</small></a></div>
						</div>
					
					</div> <!-- end #inner-footer -->
				
				</footer> <!-- end .footer -->
				
			<?php endif;?>
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->