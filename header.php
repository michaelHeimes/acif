<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- Icons & Favicons -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png" rel="apple-touch-icon" />	
		<link rel="icon" type="image/png" sizes="512x512"  href="<?php echo get_template_directory_uri(); ?>/assets/images/android-chrome-512x512.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/assets/images/android-chrome-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-16x16.png">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>
			
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<!-- START Display Upgrade Message for IE 10 or Less -->
				<!-- [if lte IE 9]>
				<div style="background: #000; text-align: center; position: absolute; top: 0px; width: 100%; color: #FFF;">Notice: This site is not compliant with Internet Explorer 10 and older. Please upgrade your browser to optimize your experience.</div>
				<![endif]-->
				<script>
				// IF THE BROWSER IS INTERNET EXPLORER 10
				var ua = window.navigator.userAgent;
				var msie = ua.indexOf('MSIE ');
				
				if (msie > 0) {
					
				document.write('<div style="background: #000; text-align: center; position: absolute; top: 0px; width: 100%; color: #FFF;">Notice: This site is not compliant with Internet Explorer 10 and older. Please upgrade your browser to optimize your experience.</div>');
				
				}
				
				
/*
				function detectIE() {
				var ua = window.navigator.userAgent;
				
				var msie = ua.indexOf('MSIE ');
				  
				 if (msie > 0) {
					  
				  	document.write('<div style="background: #000; text-align: center; position: absolute; top: 0px; width: 100%; color: #FFF;">Notice: This site is not compliant with Internet Explorer 10 and older. Please upgrade your browser to optimize your experience.</div>');
				
					}
				}
*/
				
				
				// ]]></script>
				<!-- END Display Upgrade Message for IE 10 or Less -->
				
				<header class="header" role="banner">
					
					<?php if(is_404()):?>
					
					<?php
						$imgID = get_field('404_background_image', 'option');
						$imgSize = "full";
						$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					
					?>
							
					<div class="bg" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>
					
					<?php else:?>
						
					<?php
						$imgID = get_field('banner_background_image');
						$imgSize = "full";
						$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					
					?>
							
					<div class="bg" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>
					
					<?php endif;?>
							
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
					
					<div class="sticky-nav">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="inner cell small-12">
									<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="banner">
												
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
							
								<div class="inner cell small-12">
									
									<?php if(is_404()):?>
									
										<h1>404</h1>
									
										<?php if($copy = get_field('404_message', 'option')):?>
										<p class="remove-break"><?php echo $copy;?></p>
										<?php endif;?>
										
										<a class="view-more-link" href="<?php echo home_url(); ?>">Return Home</a>									
									<?php else:?>
									
										<h1>
											<span><?php the_field('banner_heading_light_weight_font');?></span>
											<?php the_field('banner_heading_bold_weight_font');?>
										</h1>
										
										<?php if($copy = get_field('banner_copy')):?>
										<p class="remove-break"><?php echo $copy;?></p>
										<?php endif;?>
										
										<?php 
										$link = get_field('banner_link');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
										    <a class="view-more-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
									
									<?php endif; ?>
									
								</div>
								
							</div>
						</div>
		
					</div>
					 
	 	
				</header> <!-- end .header -->
				
