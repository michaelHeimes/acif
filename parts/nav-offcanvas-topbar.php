<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>"><?php the_field('header_logo_text', 'option'); ?></a></li>
		</ul>
	</div>
	<div class="top-bar-right show-for-nav-break">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="hide-for-nav-break">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li>
				<a data-toggle="off-canvas">
					<span></span>
					<span></span>	
					<span></span>
				</a>
			</li>
		</ul>
	</div>
</div>