<?php
/**
 * Template Name: About page
 *
 * The about page
 */

get_header(); ?>
	<!-- About section -->
	<div class="div-white div-top">  
		<span></span>
        <div class="container">
            <div class="row">   
				<div class="col-sm-12">
                    <ol class="breadcrumb">
                    <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
                    </ol>
					<h1><?php _e('About Stannah','stannah-whitelabel'); ?></h1>
				</div>
                <div class="col-sm-9">					
					<?php the_field('lead'); ?>
					<?php the_field('body'); ?>					
				</div>
				<div class="col-sm-3">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/about-photo.jpg" alt="<?php _e('Stannah old','stannah-whitelabel'); ?>" />
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">					
					<div class="grey-box flash-right">						
						<div class="top-content">
							<h2><?php _e('We design, deliver, and install for <b>your peace of mind</b> and security!','stannah-whitelabel'); ?></h2>
							<p><?php the_field('what_we_do_blurb'); ?></p>
						</div>
						<div class="banner-flash hundred-fifty">
							<div class="banner-content-wrapper">
								<?php _e('<span>OVER</span>
								<span>150</span>
								years experience in the lifting industry','stannah-whitelabel'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-7">
								<?php if( have_rows('what_we_do_bullet_point') ): ?>
									<div class="white-box-shadow">
										<h3><?php _e('What we do...','stannah-whitelabel'); ?></h3>
										<ul class="tick-list tick-med">
											<?php while( have_rows('what_we_do_bullet_point') ): the_row(); ?>										
												<li><?php the_sub_field('what_we_do_item'); ?></li>
											<?php endwhile; ?>
										</ul>	
									</div>								
								<?php endif; ?>
							</div>
							<div class="col-sm-5">
								<div class="box-tan-bg box-tan-spaced">
									<h3><? _e('Don’t just take if from us...','stannah-whitelabel'); ?></h3>
									<div class="box-tan-bg-content text-right">								
										<div class="quote-wrap source-external source-img clearfix">
											<blockquote class="text-right blockquote-white">                                    
												<?php the_field('quote'); ?>                                         
												<span></span>
											</blockquote>
											<footer>
												<?php the_field('initials'); ?> <cite><?php the_field('location'); ?></cite>
											</footer>
										</div>
										<a class="cta-mini-arrow" href="<?php the_field('customer_stories','options') ?>"><?php _e('See more customer stories','stannah-whitelabel'); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="dark-grey-bg promo-msg text-center">
							<p><?php _e('Want to arange a <span>FREE no-obligation home assessment</span> or have questions?','stannah-whitelabel'); ?><br />
							<?php _e('Call our Friendly expert advisors for <span class="brand">FREE on','stannah-whitelabel'); ?> <a href="tel:"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a></span></p>
						</div>
					</div>
				</div>		
			</div>			
			<div class="banner-flash banner-flash-blue year-banner">
				<?php _e('<span>1979...</span> was the year we shipped our first stairlift','stannah-whitelabel'); ?>
			</div>
		</div>
	</div>
	
	<!-- Why choose Stannah -->
	<?php if( have_rows('reasons') ): ?>
		<div class="div-grey-shadow text-center">  
			<span></span>  
	        <div class="container">
	            <div class="row"> 
	                <div class="col-sm-12">
	                    <h2><?php _e('Why choose <b><span class="brand">Stannah</span></b>...','stannah-whitelabel'); ?></h2>
						<p class="lead"><?php the_field('introduction'); ?></p>
		                    <div class="img-tick-boxes row">
			                    <?php while( have_rows('reasons') ): the_row(); ?>
			                        <div class="col-sm-3">
										<div class="img-tick-box">
											<?php
												$image = get_sub_field('image');
											?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											<div class="tick-box-content">
												<h4><?php the_sub_field('title'); ?></h4>
												<p><?php the_sub_field('description'); ?></p>
											</div>							
										</div>
									</div>
								<?php endwhile; ?>
		                    </div>
						<a class="cta-red cta-arrow" href="<?php the_field('advice_page','options') ?>"><span><?php _e('See more reasons to choose','stannah-whitelabel'); ?></span></a>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php endif; ?>
	
	<!-- Why choose Stannah -->
	<?php if( have_rows('meet_us_panels') ): ?>
		<div class="div-white-shadow">  
			<span></span>  
	        <div class="container">
	            <div class="row"> 
	                <div class="col-sm-12 meet-us">				 
						<h2 class="text-center"><?php _e('Come and meet the <b><span class="brand">Stannah</span></b> Family','stannah-whitelabel'); ?></h2>                  
	                    <div class="row">
							<div class="col-sm-7 body-text">
								<?php the_field('meet_us_body'); ?>
							</div>
							<div class="col-sm-5">
							    <div class="arrow-down-box round-15 text-center">
	                                <?php _e('<p>Since 1975 <em>over <b>600,000</b></em> people have chosen <b class="brand">Stannah</b> as their stairlift provider</p>','stannah-whitelabel'); ?>
						        </div>
							</div>
						</div>
						<div class="row">
							<?php while( have_rows('meet_us_panels') ): the_row(); ?>
								<div class="col-sm-6">
									<div class="grey-content-box">
										<div class="top-content">
											<?php
												$image = get_sub_field('image');
											?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
										</div>
										<div class="btm-content">
											<?php the_sub_field('panel_body'); ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php endif; ?>
<?php get_footer(); ?>