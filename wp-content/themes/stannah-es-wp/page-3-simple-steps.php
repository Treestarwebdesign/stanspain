<?php
/**
 * Template Name: 3 Simple steps
 *
 * 3 Simple steps to buy a Stairlift
 */

get_header(); ?>

	<!-- About section -->
	<div class="div-white div-top help-advice-header">
        <div class="container">
            <div class="row">   
				<div class="col-sm-12">
                    <ol class="breadcrumb">
                    <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
                    </ol>
					<h1><b><?php the_title(); ?></b> <?php _e('to a Stannah stairlift','stannah-whitelabel'); ?></h1>
				</div>
			</div>
		</div>
	</div>

    <!-- 3 Simple Steps -->
    <div class="div-white help-advice">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="step-1 active"><a href="#step-1" data-toggle="tab"><?php _e('Call our friendly advisors to discuss your options','stannah-whitelabel'); ?></a></li>
                        <li class="step-2"><a href="#step-2" class="text-color" data-toggle="tab"><?php _e('Book a no-obligation FREE home assessment','stannah-whitelabel'); ?></a></li>
                        <li class="step-3"><a href="#step-3" class="text-color" data-toggle="tab"><?php _e('Installation by trained and accredited technicians','stannah-whitelabel'); ?></a></li>
                    </ul>
                    <div class="tab-content">

                        <!-- Step 1 -->
                        <div id="step-1" class="tab-pane active">
                        
                            <div class="section-div section-div-grey section-div-arrowdown">
                                <?php if ( get_field('step_statement') ) : ?>
                                    <p class="statement"><?php the_field('step_statement'); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="section-div section-div-ltgrey section-div-arrowdown">
                                <span></span>
                                <h2><?php _e('We\'re here to help you','stannah-whitelabel'); ?></h2>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <?php if ( get_field('block_body_text') ) : ?>
                                            <div class="tan-box-bg round-5">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <?php $image = get_field('block_body_text_image'); ?>
                                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <?php the_field('block_body_text'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php if ( get_field('customer_quote') ) : ?>
                                            <div class="quote-wrap source-external">
                                                <blockquote class="text-right">
                                                    <p><?php the_field('customer_quote'); ?></p>
                                                    <span></span>
                                                </blockquote>
                                                <footer><?php the_field('customer_name'); ?></footer>
    				                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="dark-grey-bg cta-msg text-left round-5">
                                    <div class="row vertically-centered">
                                        <div class="col-sm-8">
                                            <?php _e('To speak to our advisors or to book a <span>FREE no-obligation</span> appointment on a date and time that suits you call:','stannah-whitelabel');?>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="white-box-bg cta-msg-panel text-center round-5">
                                                <?php _e('Speak to our friendly advisors now','stannah-whitelabel'); ?> <br />
                                                <a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="icon-phone"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-div section-div-grey section-div-arrowdown">
                                <span></span>
                                <div class="question-box">
						            <h4><span></span><?php _e('Did you know...','stannah-whitelabel'); ?></h4>
						            <p><?php _e('Our phones get answered <b>24-hours a day</b>, seven days a week, 365 days a year. And, if there’s ever a problem, our technicians are based locally, ready to help.','stannah-whitelabel'); ?></p>
					            </div>					
                            </div>

                            <div class="tab-pane-cta text-center">
                                <a href="#step-2" data-tab-step="step-2" data-toggle="tab" class="cta-arrow cta-red"><span><?php _e('<em>Next step:</em> Book a no-obligation FREE home assessment','stannah-whitelabel');?></span></a>
                            </div>

                        </div>
                        <!--/ Step 1 -->

                        <!-- Step 2 -->
                        <div id="step-2" class="tab-pane">
                            <div class="section-div section-div-grey section-div-arrowdown">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2><?php _e('Book a FREE no obligation home appointment','stannah-whitelabel'); ?></h2>
                                        <p><?php _e('When our advisor visits your home, he or she will talk with you about what you need out of a stairlift.','stannah-whitelabel'); ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="arrow-down-box arrow-down-box-white round-15 text-center">
                                            <p><?php _e('Appointments last about','stannah-whitelabel'); ?> <em><?php the_field('appointment_length'); ?></em> <?php _e('or less depending on <span class="brand">your</span> needs','stannah-whitelabel'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php if ( get_field('what_is_a_stairlift_assessment_text') ) : ?>
                                            <div class="white-box-shadow">
                                                <h3><?php _e('What is a stairlift assessment?','stannah-whitelabel'); ?></h3>
                                                <?php the_field('what_is_a_stairlift_assessment_text'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php if ( get_field('about_the_appointment_text') ) : ?>
                                            <div class="white-box-shadow">
                                                <h3><?php _e('What will happen during the appointment?','stannah-whitelabel'); ?></h3>
                                                <?php the_field('about_the_appointment_text'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <p class="statement"><?php _e('Your consultant will leave you with a fixed, written quotation that you can decide on in your own time.','stannah-whitelabel'); ?></p>
                            </div>

                            <div class="section-div section-div-ltgrey section-div-arrowdown">
                                <span></span>
                                <h2><?php _e('What will happen following the appointment','stannah-whitelabel'); ?></h2>
                                
                                <div class="clearfix">
                                    <?php if ( get_field('following_an_appointment_text') ) : ?>
                                        <div class="banner-flash banner-flash-blue pull-left response-time">
                                            <div class="banner-content-wrapper">
                                                <?php _e('Within','stannah-whitelabel'); ?>
                                                <span><?php the_field('response_time'); ?></span>
                                                <?php _e('We will be in touch<br /> to answer any<br /> questions','stannah-whitelabel'); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="banner-flash-content">
                                            <?php the_field('following_an_appointment_text'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="dark-grey-bg cta-msg text-left round-5">
                                    <div class="row vertically-centered">
                                        <div class="col-sm-8">
                                            <p><?php _e('To speak to our advisors or to book a <span>FREE no-obligation</span> appointment on a date and time that suits you call:','stannah-whitelabel');?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="white-box-bg cta-msg-panel text-center round-5">
                                                <span class="text-uppercase icon-label"><?php _e('Toll-free','stannah-whitelabel'); ?></span>
                                                <a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="icon-phone icon-offset"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-div section-div-grey section-div-arrowdown">
                                <span></span>
                                <div class="question-box">
                                    <h4><span></span><?php _e('Did you know...','stannah-whitelabel'); ?></h4>
                                    <p><?php _e('Our phones get answered <b>24-hours a day</b>, seven days a week, 365 days a year. And, if there’s ever a problem, our technicians are based locally, ready to help.','stannah-whitelabel'); ?></p>
                                </div>                  
                            </div>

                            <div class="section-div section-div-ltgrey section-div-arrowdown-sml round-bottom-5 help-advice-when-youre-ready">
                                <span></span>

                                <?php if ( get_field('how_long_it_will_take_blurb') ) : ?>
                                    <div class="arrow-down-box arrow-down-box-dkgrey round-15 text-center">
                                        <em><?php the_field('delivery_time'); ?></em>
                                        <p><?php _e('Is the <span class="brand"><b>average time</b></span> from ordering your stairlift to having it installed','stannah-whitelabel'); ?></p>
                                    </div>
                                <?php endif; ?>

                                <h2><?php _e('When you\'re ready we will...','stannah-whitelabel'); ?></h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><?php _e('Review your chosen order with you','stannah-whitelabel'); ?></h3>
                                        <p><b><?php _e('We\'ll double check the product options you have chosen with you','stannah-whitelabel'); ?></b></p>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/advisor2.jpg" alt="<?php _e('Stannah advisor talks with customer','stannah-whitelabel'); ?>" />
                                    </div>
                                    <div class="col-sm-6">
                                        <h3><?php _e('If you\'re not sure what to choose?','stannah-whitelabel'); ?></h3>
                                        <p><b><?php _e('Don\'t worry thats why we are here to help you decide','stannah-whitelabel'); ?></b></p>
                                        <p><?php _e('Our advisors or the representatives that visited you, are more than happy to talk through your options with you again in detail','stannah-whitelabel'); ?></p>
                                        <div class="box-grey-bg">
                                            <div class="box-grey-bg-content">
                                                <p><b><?php _e('We are:','stannah-whitelabel'); ?></b></p>
                                                <ul class="blue-arrow-list">
                                                    <li><?php _e('Friendly and open','stannah-whitelabel'); ?></li>
                                                    <li><?php _e('Experts in mobility','stannah-whitelabel'); ?></li>
                                                    <li><?php _e('We\'re not pushy, we just want to make the right choice','stannah-whitelabel'); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dark-grey-bg cta-msg text-left round-5">
                                    <div class="row vertically-centered">
                                        <div class="col-sm-8">
                                            <p><span><?php _e('Ready to put your life back on track?','stannah-whitelabel'); ?></span></p>
                                            <p class="smaller"><?php _e('Within 3 to 10 days*, you can be getitng up and down stairs smoothly. Make an appointment for a free consultation with one of our experts.','stannah-whitelabel'); ?></p>
                                            <p class="smaller"><?php _e('* Depending on your staircase','stannah-whitelabel'); ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="white-box-bg cta-msg-panel text-center round-5">
                                                <?php _e('Call our advisors for FREE','stannah-whitelabel'); ?> <br />
                                                <a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="icon-phone"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane-cta text-center">
                                <a href="#step-3" data-tab-step="step-3" class="cta-arrow cta-red"><span><em><?php _e('Next step:','stannah-whitelabel'); ?></em> <?php _e('Installation by trained and accredited technicians','stannah-whitelabel'); ?></span></a>
                            </div>
                        </div>
                        <!--/ Step 2 -->

                        <!-- Step 3 -->
                        <div id="step-3" class="tab-pane">
                            <div class="section-div section-div-grey section-div-arrowdown">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <?php if ( get_field('how_long_it_will_take_blurb') ) : ?>
                                            <h2><?php _e('It will only take about half a day.','stannah-whitelabel'); ?></h2>
                                            <?php the_field('how_long_it_will_take_blurb'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php if ( get_field('fitting_length') ) : ?>
                                            <div class="arrow-down-box arrow-down-box-white round-15 text-center">
                                                <em><?php the_field('fitting_length'); ?></em>
                                                <p><?php _e('Is the <span class="brand">average</span> time to install your stairlift after the technician arrives at your home','stannah-whitelabel'); ?></p>
    					                    </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="section-div section-div-ltgrey section-div-arrowdown help-advice-installation-process">
                                <span></span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php if ( get_field('installation_process_text') ) : ?>
                                            <h3><?php _e('The <b>installation process.</b>','stannah-whitelabel'); ?></h3>
                                            <?php the_field('installation_process_text'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-5 col-sm-push-1">
                                        <div>
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/Stannah-instalacion-salvaescaleras.jpg" alt="<?php _e('Stannah technician installs a new Stairlift for a couple','stannah-whitelabel'); ?>" />
                                        </div>
                                        <?php if ( get_field('install_customer_quote') ) : ?>
                                            <div class="quote-wrap source-external source-img-alt">
                                                <blockquote class="text-center">
                                                    <p><?php the_field('install_customer_quote'); ?></p>                                            
                                                    <span></span>
                                                </blockquote>
                                                <footer>
                                                    <?php the_field('install_customer_name'); ?>
                                                </footer>
    				                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row thumbnails">
                                    <div class="col-sm-4">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/Stannah-tecnico-salvaescaleras.jpg" alt="<?php _e('Stannah technician fits Stairlift','stannah-whitelabel'); ?>" />
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/Stannah-tecnico-ayuda-salvaescaleras.jpg" alt="<?php _e('Stannah technician adjusts Stairlift to users','stannah-whitelabel'); ?>" />
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/Stannah-tecnico-demostracion-salvaescaleras.jpg" alt="<?php _e('Stannah technician give users a demonstration','stannah-whitelabel'); ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="section-div section-div-grey section-div-arrowdown">
                                <span></span>
                                <div class="question-box">
						            <h4><span></span><?php _e('Did you know...','stannah-whitelabel'); ?></h4>
						            <p><?php _e('Our phones get answered <b>24-hours a day</b>, seven days a week, 365 days a year. And, if there’s ever a problem, our technicians are based locally, ready to help.','stannah-whitelabel'); ?></p>
					            </div>					
                            </div>

                            <div class="section-div section-div-ltgrey section-div-arrowdown-sml round-bottom-5 help-advice-warranty-support">
                                <span></span>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="arrow-down-box arrow-down-box-dkgrey round-5">
                                            <div style="display:none; class="banner-flash banner-flash-sml pull-left support-line-banner">
                                                <div class="banner-content-wrapper">-->
                                                    <<?php _e('<span>Asistencià</span> Support','stannah-whitelabel'); ?>
                                                </div>
                                            </div>
                                            <p><?php _e('Whether it’s a new installation or regular maintenance, you can always expect the highest level of experience and professionalism when working with Stannah','stannah-whitelabel'); ?></p>
					                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <?php if ( get_field('what_youre_getting_text') ) : ?>
                                            <div class="white-box-shadow">
                                                <h2><?php _e('What you\'re getting','stannah-whitelabel'); ?></h2>
                                                <?php the_field('what_youre_getting_text'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/media/stannah-tecnico-instalacion-salvaescaleras.jpg" alt="<?php _e('Stannah technician fitting Stair lift','stannah-whitelabel'); ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="dark-grey-bg cta-msg text-left round-5 help-advice-final-cta">
                                <div class="row vertically-centered">
                                    <div class="col-sm-8">
                                        <p><span><?php _e('Ready to take control of your stairs?','stannah-whitelabel'); ?></span></p>
                                        <p class="smaller"><?php _e('Within three to ten days*, you can be gliding up and down stairs comfortably.','stannah-whitelabel'); ?> <a href="<?php the_field('contact_us','stannah-whitelabel'); ?>"><?php _e('Book an appointment with one of our friendly advisors now.','stannah-whitelabel'); ?></a></p>
                                        <p class="smaller"><?php _e('* Depending on your staircase','stannah-whitelabel'); ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="white-box-bg cta-msg-panel text-center round-5">
									        <?php _e('Call our advisors for FREE <span class="text-uppercase icon-label"> Toll-free','stannah-whitelabel'); ?></span>
									        <a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="icon-phone icon-offset"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a>
								        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/ Step 3 -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ 3 Simple Steps -->

<?php get_footer(); ?>