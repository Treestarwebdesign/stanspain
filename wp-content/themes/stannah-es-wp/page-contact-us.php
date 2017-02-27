<?php
/**
 * Template Name: Contact Us
 *
 * Contact us page
 */

// Process HTML forms

// Process HTML forms
if (isset($_POST['brochure-submitted'])) {
    build_email_message($_POST);
    $form_submitted = $_POST['brochure-submitted'];
    $brochure = true;
}

if (isset($_POST['submitted'])) {
    build_email_message($_POST);
    $form_submitted = $_POST['submitted'];
}

get_header(); ?>

    <?php include 'includes/brochure-modals.php'; ?>

	<!-- Top section -->
	<div class="div-white div-top">
		<span></span>
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-sm-12">
                    <ol class="breadcrumb">
                    <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
                    </ol>
					<h1><?php _e('How would you like to <b>contact us?</b>','stannah-whitelabel'); ?></h1>
				</div>
				<!-- Speak to advisors -->
                <div class="col-md-6 col-sm-12">
					<div class="tan-box-shadow contact-block-top text-center">
						<h2 class="h3"><b><?php _e('Speak to our specialist advisors','stannah-whitelabel'); ?></b></h2>
						<h4><?php _e('Friendly <b class="brand">Stannah</b> advisors are<br /> available to help you','stannah-whitelabel'); ?></h4>
						<p>Información sobre nuestra política de protección de privacidad</p>
						<div class="box-black-top call">
							<div class="box-black-top-content grey">
								<p class="tt-u"><?php _e('Toll-free','stannah-whitelabel'); ?></p>
								<span class="tel"><a href="tel:"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a></span><br>
							</div>
						</div>
					</div>
				</div>
				<!-- Request callback -->
				<div class="col-md-6 col-sm-12">
					<div class="grey-box contact-block-top text-center">
						<h2 class="h3"><b><?php _e('Request a call back from an advisor','stannah-whitelabel'); ?></b></h2>
						    <!-- <?php if (!$form_submitted == "Callback form" ) : ?>
								<form action="<?php the_permalink(); ?>?<?php _e('contact','stannah-whitelabel'); ?>=<?php _e('contact_sent','stannah-whitelabel'); ?>" method="post">
									<div class="row text-left">
										<div class="col-sm-6">
											<div class="form-group form-group-name">
												<label for="callbackName" class="text-uppercase"><?php _e('Your name','stannah-whitelabel'); ?></label>
												<input type="text" name="callback-<?php _e('Name','stannah-whitelabel'); ?>" class="form-control" id="callbackName" required>
											</div>
										</div>
										<div class="col-sm-6">
		                                    <div class="form-group form-group-zip">
		                                        <label for="callbackDate" class="text-uppercase"><?php _e('Prefered date for call','stannah-whitelabel'); ?></label>
		                                        <input type="text" name="callback-<?php _e('Date','stannah-whitelabel'); ?>" class="form-control form-date" id="callbackDate" placeholder="MM/DD/YYYY">
		                                    </div>
		                                </div>
										<div class="col-sm-6">
		                                    <div class="form-group form-group-tel">
		                                        <label for="callbackTel" class="text-uppercase"><?php _e('Your phone number','stannah-whitelabel'); ?></label>
		                                        <input type="tel" name="callback-<?php _e('Telephone','stannah-whitelabel'); ?>" class="form-control" id="callbackTel" required>
		                                    </div>
		                                </div>
										<div class="col-sm-6">
											<div class="form-group form-group-email">
												<label for="callbackTime" class="text-uppercase"><?php _e('Prefered time for call','stannah-whitelabel'); ?></label>
												<select class="chosen-select" name="callback-<?php _e('Time','stannah-whitelabel'); ?>" id="callbackTime" data-placeholder="<?php _e('Choose a time','stannah-whitelabel'); ?>">
													<option value=""><?php _e('Choose a time','stannah-whitelabel'); ?></option>
													<option value="8 a.m.">8 a.m.</option>
													<option value="9 a.m.">9 a.m.</option>
													<option value="10 a.m.">10 a.m.</option>
													<option value="11 a.m.">11 a.m.</option>
													<option value="12 <?php _e('noon','stannah-whitelabel'); ?>">12 <?php _e('noon','stannah-whitelabel'); ?></option>
													<option value="1 p.m.">1 p.m.</option>
													<option value="2 p.m.">2 p.m.</option>
													<option value="3 p.m.">3 p.m.</option>
													<option value="4 p.m.">4 p.m.</option>
													<option value="5 p.m.">5 p.m.</option>
													<option value="6 p.m.">6 p.m.</option>
													<option value="7 p.m.">7 p.m.</option>
													<option value="8 p.m.">8 p.m.</option>
												</select>
											</div>
										</div>
		                            </div>
		                            <div class="cta">
		                                <button class="cta-red cta-plain" type="submit" name="submitted" value="<?php _e('Callback form','stannah-whitelabel'); ?>"><span><?php _e('Request a callback','stannah-whitelabel'); ?></span></a>
		                            </div>
		                        </form>
		                    <?php else : ?>
								<h3> <?php _e('Thank you, your callback request has been sent.','stannah-whitelabel'); ?></h3>
		                    <?php endif; ?>-->

		                    <?php echo do_shortcode('[gravityform id=1 title=false]'); ?>
					</div>
				</div>
			</div>
			<?php if (get_field('email_address')) : ?>
				<div class="row">
					<div class="arrow-box-grey contact-block email-us col-sm-12 text-center">
						<h3><?php _e('You can also contact us by','stannah-whitelabel'); ?> <a href="mailto:<?php the_field('email_address'); ?>"><?php _e('email','stannah-whitelabel'); ?></a></h3>
						<p><?php _e('A Stannah repesentative will get back to you as soon as possible.','stannah-whitelabel'); ?></p>
					</div>
	        	</div>
	        <?php endif; ?>
		</div>
	</div>

	<!-- Dealer finder -->
 	<?php include 'includes/dealer-finder-12-col.php'; ?>
    <!--/ Dealer finder -->

	<!-- Order a brochure -->

	<!-- Visit a showroom -->
	<?php if (get_field('location1_title')): ?>
		<div class="div-white-noshadow text-center">
			<span></span>
	        <div class="container">
	            <div class="row">
					<div class="col-sm-12">
						<h2><b><?php the_field('section_title'); ?></b></h2>
						<br />
						<hr class="arrow" />
					</div>
					<div class="col-sm-12">
						<h3><?php the_field('location1_title'); ?></h3>
						<div class="arrow-box-grey contact-block text-left">
							<!-- Responsive map holder -->
							<div class="video-responsive">
                <?php echo do_shortcode('[wpgmza id="1"]'); ?>
							</div>
							<div class="address-container">
								<?php the_field('location1_information'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>
