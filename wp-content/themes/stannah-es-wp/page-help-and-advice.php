<?php
/**
 * Template Name: Help and advice
 *
 * The help and advice page
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
					<h1><?php _e('Our commitment to service starts with <b>our advice</b>.','stannah-whitelabel'); ?></h1>
					<?php the_field('lead'); ?>
				</div>
				<div class="col-sm-6">
					<?php the_field('introduction'); ?>
				</div>
				<div class="col-sm-6">
					<div class="question-box">
						<h4><span></span><?php _e('Did you know...','stannah-whitelabel'); ?></h4>
						<p><?php _e('Our phones get answered <b>24-hours</b> a day, seven days a week, 365 days a year. And, if there’s 
						ever a problem, our technicians are based locally, ready to help.','stannah-whitelabel');?></p>
					</div>					
				</div>
			</div>			
		</div>
	</div>
	
	<!-- Buying a stairlift -->
	<div class="div-grey-shadow">  
		<span></span>  
        <div class="container">
            <div class="row"> 
                <div class="col-sm-12">
                    <h2 class="text-center"><?php _e('Buying a stairlift for <b>family or friends</b>?','stannah-whitelabel'); ?></h2>
					<div class="white-arrow-down-box">
						<div class="row">
							<div class="col-sm-4">
								<?php
									$image = get_field('ff_left_hand_image');
								?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
							<div class="col-sm-8 banner-overlay">
								<?php echo the_field('ff_introduction'); ?>
							</div>
						</div>
						<div class="banner-flash">
							<div class="banner-content-wrapper">
								<?php _e('<span style="font-size:1.65em;">98<span>%</span></span><br /> of our customers<br /> would<br /> recommend us','stannah-whitelabel'); ?>
							</div>
						</div>
					</div>
					<?php if( have_rows('friends_and_family_facts') ): ?>
						<h3><?php _e('Try pointing out these facts about <b class="brand">Stannah</b> stairlifts...','stannah-whitelabel'); ?></h3>
						<div class="row">
							<div class="col-sm-8">
								<div class="white-box-shadow">
									<ul class="blue-arrow-list">
										<?php while ( have_rows('friends_and_family_facts') ) : the_row(); ?>
											<li><?php the_sub_field('fact'); ?></li>
										<?php endwhile; ?>
									</ul>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="tan-box-shadow">
									<div class="quote-wrap source-external">
										<blockquote class="text-right">                                    
											<p><?php the_field('customer_quote'); ?></p>                                            
											<span></span>
										</blockquote>
										<footer><?php the_field('customer_quote_initials'); ?> <cite><?php the_field('customer_quote_location'); ?></cite></footer>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Help them get their life back on track -->
	<div class="div-black-shadow">  
		<span></span>  
        <div class="container">
            <div class="row"> 
                <div class="col-md-7 col-sm-6">
                    <h2><? _e('Help them to get their life back on track?','stannah-whitelabel'); ?></h2>
					<p class="lead"><?php _e('<b>No obligation, no pressure to buy.</b> We’re here to help with any questions that you 
					might have to help you inform your friends and family about the benefits of a stairlift.','stannah-whitelabel'); ?></p>
                </div>
				<div class="col-md-5 col-sm-6">
					<div class="box-black-top call round-5 text-center">
                        <h3><?php _e('Call our friendly advisors now','stannah-whitelabel'); ?></h3>
                        <div class="box-black-top-content grey">
                            <p class="tt-u"><?php _e('Toll-free','stannah-whitelabel'); ?></p>
                            <span class="tel"><a href="tel:"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a></span><br>
                            <span class="tt-u bordered"><?php _e('or','stannah-whitelabel'); ?></span><br>
                            <a class="cta-red cta-arrow" href="<?php the_field('contact_us','options'); ?>"><span><?php _e('Request a callback','stannah-whitelabel'); ?></span></a>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
	
	<!-- 3 steps -->
    <?php if (get_field('step_1_blurb', 'option')) : ?>
        <div class="div-cream-dropshadow text-center">  
            <span></span>  
            <div class="container">
                <div class="row"> 
                    <div class="col-sm-12">                    
                        <h2><?php the_field('title', 'option'); ?></h2>
                        <div class="steps-holder row">
                            <div class="col-sm-4">
                                <!-- Step 1 -->
                                <div class="step">
                                    <span class="step-num">1</span>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Llamar-visita-Stannah-Incisa-icon.png" alt="Comprar un salvaescaleras - 1" />
                                    <p><a href="<?php the_field('simple_steps_page', 'option'); ?>?tab=1"><?php the_field('step_1_title', 'option'); ?></a></p>                               
                                    <p><?php the_field('step_1_blurb', 'option'); ?></p> 
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- Step 2 -->
                                <div class="step">
                                    <span class="step-num">2</span>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Comprar-asesor-Stannah-Incisa-icon.png" alt="Comprar un salvaescaleras - 2" />
                                    <p><a href="<?php the_field('simple_steps_page', 'option'); ?>?tab=2"><?php the_field('step_2_title', 'option'); ?></a></p>
                                    <p><?php the_field('step_2_blurb', 'option'); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- Step 3 -->
                                <div class="step">
                                    <span class="step-num">3</span>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Instalar-tecnicos-Stannah-Incisa-icon.png" alt="Comprar un salvaescaleras - 3" />
                                    <p><a href="<?php the_field('simple_steps_page', 'option'); ?>?tab=3"><?php the_field('step_3_title', 'option'); ?></a></p>
                                    <p><?php the_field('step_3_blurb', 'option'); ?></p>
                                </div>
                            </div>
                            <a class="cta-red cta-arrow" href="<?php the_field('simple_steps_page', 'option'); ?>"><span><?php _e('See more details about the steps','stannah-whitelabel'); ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="banner-flash banner-flash-green">
                    <div class="banner-content-wrapper">
                        <?php _e('Over <br /><span>600,000</span></span> installations <br /> worldwide','stannah-whitelabel'); ?>
                    </div>
                </div>    
            </div>
        </div>
    <?php endif; ?>
    <!--/ 3 steps -->
	
	<!-- What to look out for -->
	<div class="div-white-shadow text-center">  
		<span></span>  
        <div class="container">
            <div class="row"> 
                <div class="col-sm-12">
					<?php if( have_rows('things_to_consider') ): ?>
	                    <h2><?php _e('What to look out for in a <b>stairlift</b> &amp; a <b>stairlift provider</b>','stannah-whitelabel'); ?></h2>
						<p><?php _e('We know you will want to shop around, so to help you here are a few things  to consider when looking for the right stairlift:','stannah-whitelabel'); ?></p>
						<br />					
						<hr class="arrow" />
							
						<ul class="banded-list img-right tick-rows text-left">
							<?php while ( have_rows('things_to_consider') ) : the_row(); ?>
								<li class="row">
									<div class="col-sm-10">
										<?php the_sub_field('consideration'); ?>
									</div>
									<div class="col-sm-2">
										<?php
											$image = get_sub_field('image');
										?>
										<img src="<?php echo $image['url'] ;?>" alt="<?php echo $image['alt']; ?>" />
									</div>						
								</li>
							<?php endwhile; ?>			
						</ul>
					<?php endif; ?>
					<div class="dark-grey-bg arrow-down cta-msg text-left round-5">
						<div class="row">
							<div class="col-sm-8">
								<p><?php _e('To speak to our advisors or to book a <span>FREE no-obligation</span> appointment on a date and time that suits you call:','stannah-whitelabel');?></p>
							</div>
							<div class="col-sm-4">
								<div class="white-box-bg cta-msg-panel text-center round-5">
									<span class="text-uppercase blush icon-label"><?php _e('Toll-free','stannah-whitelabel'); ?></span>
									<a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="icon-phone icon-offset"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>