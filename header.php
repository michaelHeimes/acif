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
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>
			
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header" role="banner">
						
					<?php
						$imgID = get_field('banner_background_image');
						$imgSize = "full";
						$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
					
					?>
							
					<div class="bg" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>
							
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<div class="inner cell small-12">
								<?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
							</div>
						</div>
					</div>

					<div class="banner">
												
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
							
								<div class="inner cell small-12">
									
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
									
								</div>
								
							</div>
						</div>
		
					</div>
					 
	 	
				</header> <!-- end .header -->
				
