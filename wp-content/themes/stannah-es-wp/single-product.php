
<?php
/**
 * Product post template
 *
 * The product details page
 */

// Process HTML forms
if (isset($_POST['brochure-submitted'])) {
    build_email_message($_POST);
    $form_submitted = $_POST['brochure-submitted'];
    $brochure = true;
}

if (isset($_POST['submitted'])) {
    build_email_message($_POST);
    $form_submitted = $_POST['submitted'];
    $post_brochure = true;
}

get_header(); ?>

    <?php include 'includes/brochure-modals.php'; ?>

    <!-- About section -->
    <div class="div-white div-top product-detail-header">
        <span></span>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                    <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
                    </ol>
                </div>
                <div class="col-sm-5">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-sm-7 text-right">
                    <h2 class="brand brand-text"><strong><?php _e('Meet','stannah-whitelabel'); ?> <?php the_title(); ?></strong></h2>  
                    <p><?php the_field('product_byline'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!--/ About section -->
    
    <!-- Product detail -->
    <div class="div-white product-detail">
        <div class="container">
            <div class="row">  
                <div class="col-sm-8">
                    <div class="product-spotlight">
                        <div class="image-container">
                            <?php

                            $rows = get_field('carousel_images' ); // get all the rows
                            $first_row = $rows[0]; // get the first row
                            $first_row_image = $first_row['large_product_image' ]; // get the sub field value 

                            ?>                          

                                <img src="<?php echo $first_row_image['url']; ?>" alt="<?php echo $first_row_image['alt']; ?>" />
                                <span></span>
                        </div>
                        <!-- </a> -->
                        <nav class="navbar">
                            <ul class="nav navbar-nav">
                                <?php 
                                    $i = 0;
                                    while ( have_rows('carousel_images') ) : the_row(); 
                                        $main_image = get_sub_field('large_product_image');
                                        $thumb_image = get_sub_field('thumbnail_image');
                                ?>                               
                                        <li <?php if ($i == 0) : ?>class="active"<?php endif; ?>><img src="<?php echo $thumb_image['url']; ?>" data-previewimg="<?php echo $main_image['url']; ?>" data-largeimg="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['alt']; ?>" /><span></span></li>
                                <?php 
                                        $i++;
                                    endwhile; 
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <?php if (have_rows('gallery_item')) : ?>
                        <div class="product-spotlight-cta">
                            <a href="#gallery"><?php _e('View more images &amp; videos','stannah-whitelabel'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-4 product-info">
                    <div class="dark-grey-bg promo-msg"> 
                        <h3><?php _e('Book a FREE no-obligation appointment now!','stannah-whitelabel'); ?></h3>                        
                        <div class="promo-msg-panel">
                            <p><?php _e('Call our friendly advisors FREE on','stannah-whitelabel'); ?></p>
                            <a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>"><strong><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></strong></a>
                        </div>
                    </div>
                                       
                    <div class="product-description">
                        <?php the_field('product_blurb'); ?>
                    </div>
                </div>
            </div>
            <div class="row product-features-row">
                <div class="col-sm-4 product-features">
                    <h3><?php _e('Key features &amp; benefits','stannah-whitelabel'); ?></h3>
                    <?php the_field('key_feature_and_benefits'); ?>
                    <a href="#benefits" class="cta-arrow cta-grey"><span><?php _e('Read more','stannah-whitelabel'); ?></span></a>
                </div>
                <?php if (get_field('customisable_options')) : ?>
                    <div class="col-sm-4 product-styles">
                        <?php if (count(get_field('customisable_options')) > 1) : ?>
                            <h3><?php _e('Customisable! It\'s your choice','stannah-whitelabel'); ?></h3>
                        <?php else : ?>
                            <h3><?php _e('Upholstery color','stannah-whitelabel'); ?></h3>
                        <?php endif; ?>
                        <?php while ( have_rows('customisable_options') ) : the_row();  ?>                    
                            <div class="product-styles-group round-5">
                                <span><?php the_sub_field('option_name'); ?></span>
                                <ul class="swatches">
                                    <?php 
                                        while ( have_rows('option_choices') ) : the_row();  
                                            $image = get_sub_field('choice_example_image');
                                    ?>
                                        
                                            <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></li>        
                                    <?php 
                                        endwhile; 
                                    ?>
                                </ul>
                            </div>
                        <?php endwhile; ?>
                        <?php if( get_field('show_customisations') ) : ?>
                            <a href="#styles" class="cta-arrow cta-grey"><span><?php _e('View all options','stannah-whitelabel'); ?></span></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-4 product-suitability">
                    <h3><?php _e('Suitable for / Dimensions','stannah-whitelabel'); ?></h3>
                    <ul class="stair-type-list">
                        <?php if ( in_array( 'straight_stairs', get_field('suitability_types') ) ) : ?>
                            <li class="stair-type-straight"><span class="stairs-icon"><?php _ex( 'S', 'This letter is the key for "Straight Stairs" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Straight stairs','stannah-whitelabel'); ?></li>
                        <?php endif; ?>
                        <?php if ( in_array( 'curved_stairs', get_field('suitability_types') ) ) : ?>
                            <li class="stair-type-curved"><span class="stairs-icon"><?php _ex( 'C', 'This letter is the key for "Curved Stairs" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Curved stairs','stannah-whitelabel'); ?></li>
                        <?php endif; ?>
                        <?php if ( in_array( 'narrow_stairs', get_field('suitability_types') ) ) : ?>
                            <li class="stair-type-narrow"><span class="stairs-icon"><?php _ex( 'N', 'This letter is the key for "Narrow Stairs" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Narrow stairs','stannah-whitelabel'); ?></li>
                        <?php endif; ?>
                        <?php if ( in_array( 'outdoor_stairs', get_field('suitability_types') ) ) : ?>
                            <li class="stair-type-outdoor"><span class="stairs-icon"><?php _ex( 'O', 'This letter is the key for "Outdoor Stairs" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Outdoor stairs','stannah-whitelabel'); ?></li>
                        <?php endif; ?>
                          <?php if ( in_array( 'inclined_lift', get_field('suitability_types') ) && $product_type == "platform-lift" ) : ?>
                            <li class="lift-type-inclined"><span class="lift-icon"><?php _ex( 'I', 'This letter is the key for "Inclined lift" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Inclined lift','stannah-whitelabel'); ?></li>
                        <?php endif; ?>
                        <?php if ( in_array( 'vertical_lift', get_field('suitability_types') ) && $product_type == "platform-lift" ) : ?>
                            <li class="lift-type-vertical"><span class="lift-icon"><?php _ex( 'V', 'This letter is the key for "Vertical lift" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Vertical lift','stannah-whitelabel'); ?></li>
                        <?php endif; ?>
                    </ul>
                    <dl class="dl-inline">
                            <dd>
                                <?php the_field('dimensions'); ?>
                            </dd>
                    </dl>
                    <a href="#specs" class="cta-arrow cta-grey"><span><?php _e('View detailed specification','stannah-whitelabel'); ?></span></a>
                </div>
            </div>
        </div>
    </div>
    <!--/ Product detail -->
    
    <!-- What our experts say -->    
    <?php if( get_field('experts_quote') && get_field('experts_name') && get_field('experts_position_and_tenature') ) : ?>
        <div class="div-white product-expert-opinion">
            <div class="container">
                <div class="product-expert-opinion-content">
                    <h2><?php _e('What our experts say about the','stannah-whitelabel'); ?> <span class="brand"><?php the_title(); ?></span></h2>

                    <div class="row">
                        <div class="col-sm-2">
                            <?php 
                                $image = get_field('experts_image');
                            ?>
                            <?php if ($image) : ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-10">
                            <div class="quote-wrap">
                                <blockquote class="blockquote-white">
                                    <?php the_field('experts_quote'); ?>
                                </blockquote>
                                <footer><b><?php the_field('experts_name'); ?></b>, <?php the_field('experts_position_and_tenature'); ?></footer>
                            </div>
                        </div>
                    </div>                            
                </div>
            </div>
        </div> 
    <?php endif; ?>
    <!--/ What our experts say -->    

    <!-- How much does it cost? -->
    <?php if ( get_field('pricing_blurb') ) : ?>
        <div class="div-cream-shadow product-price">
            <span></span>

            <div class="container">
                <h2 class="text-center"><?php _e('How much does a <span class="brand">Stairlift cost?</span>','stannah-whitelabel'); ?></h2>

                <div class="row">
                    <div class="col-sm-8">
                        <?php the_field('pricing_blurb'); ?>
                    </div>

                    <div class="col-sm-4">
                        <div class="dark-grey-bg promo-msg">
                            <p>
                                <?php _e('Call our experts for <b>FREE</b> on<br>','stannah-whitelabel'); ?>
                                <b><a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="tel"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a><br></b>
                                <?php _e('and make an appointment for a custom quote.','stannah-whitelabel'); ?>
                            </p>
                        </div>                    
                    </div>
                </div>    
            
                <?php if (get_field('customer_name')) : ?>
                    <div class="white-box-bg round-5">
                        <h2 class="text-center"><?php _e('Our customers share their stairlift <b>requirements</b> and <b>prices</b> with you','stannah-whitelabel'); ?></h2>
                        <hr class="arrow" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="tan-box-bg round-5">
                                    <dl class="dl-inline">
                                        <dt>Product:</dt>
                                        <dd><?php the_title(); ?></dd>
                                        <dt><?php echo the_field('customer_name'); ?>'s requirements:</dt>
                                        <dd><?php echo the_field('requirements_of_the_customer'); ?></dd>
                                    </dl>
                                    <p class="text-center product-price-figure"><b>Cost of <?php echo the_field('customer_name'); ?>'s <?php the_title(); ?>:</b> <?php echo the_field('cost_to_customer'); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <?php 
                                $image = get_field('customer_image');
                                if( !empty($image) ): ?>

                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>   
    <?php endif; ?>
    <!--/ How much does it cost? -->     

    <!-- Key benefits -->
    <?php if( have_rows('benefits') ) : ?>
        <div id="benefits" class="div-tan-shadow product-benefits"> 
            <span></span>
            <div class="container">
                <div class="row">
                    <h2 class="text-center"><?php _e('Key benefits','stannah-whitelabel'); ?></h2>
                    <div class="row-clear">
                        <?php while( have_rows('benefits') ): the_row(); ?>
                            <div class="col-sm-6">
                                <div class="product-benefit round-5">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <?php $main_image = get_sub_field('main_image'); ?>
                                            <a href="<?php echo $main_image['url']; ?>" class="magnifier magnifier-lrg magnifier-white" data-lightbox="features" data-title="<?php the_sub_field('title'); ?>">
                                                <?php $thumb_image = get_sub_field('thumbnail_image'); ?>
                                                <img src="<?php echo $thumb_image['url']; ?>" alt="<?php echo $thumb_image['alt']; ?>" />
                                                <span></span>
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <h3><?php the_sub_field('title'); ?></h3>
                                            <p><?php the_sub_field('description'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>         
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--/ Key benefits-->
        
    <!-- Product specification -->
    <?php if (have_rows('design_specs')) : ?>
        <div id="specs" class="div-tan-shadow product-spec"> 
            <div class="container">
                <div class="row">
                    <h2><?php the_title(); ?> <?php _e('Detailed Specification','stannah-whitelabel'); ?></h2>
                    <ul class="nav nav-tabs">
                        <li class="text-uppercase active"><a href="#design" data-toggle="tab"><?php _e('Design','stannah-whitelabel'); ?></a></li>
                        <li class="text-uppercase"><a href="#power" class="text-color" data-toggle="tab"><?php _e('Power','stannah-whitelabel'); ?></a></li>
                        <li class="text-uppercase"><a href="#safety" class="text-color" data-toggle="tab"><?php _e('Safety','stannah-whitelabel'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="design" class="tab-pane active">
                            <?php while( have_rows('design_specs') ): the_row(); ?>
                                <?php if( get_sub_field('spec_type') == "design" ) : ?>
                                    <dl class="dl-horizontal">
                                        <dt><?php the_sub_field('title'); ?></dt>
                                        <dd>
                                            <?php the_sub_field('specs'); ?>
                                        </dd>
                                    </dl>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                        <div id="power" class="tab-pane">
                            <?php while( have_rows('design_specs') ): the_row(); ?> 
                                <?php if (get_sub_field('spec_type') == "power" ) : ?>
                                    <dl class="dl-horizontal">
                                        <dt><?php the_sub_field('title'); ?></dt>
                                        <dd>
                                            <?php the_sub_field('specs'); ?>
                                        </dd>
                                    </dl>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                        <div id="safety" class="tab-pane">
                            <?php while( have_rows('design_specs') ): the_row(); ?>
                                <?php if ( get_sub_field('spec_type') == "safety" ) : ?>
                                    <dl class="dl-horizontal">
                                        <dt><?php the_sub_field('title'); ?></dt>
                                        <dd>
                                            <?php the_sub_field('specs'); ?>
                                        </dd>
                                    </dl>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--/ Product specification -->

    <!-- Gallery -->
    <?php if (have_rows('gallery_item')) : ?>
        <div id="gallery" class="div-white-noshadow product-gallery text-center"> 
            <span></span>

            <div class="container">
                <h2><?php _e('Gallery','stannah-whitelabel'); ?></h2>

                <div class="row"> 
                    <?php while( have_rows('gallery_item') ): the_row(); ?>
                        <div class="col-sm-3">
                            <div class="tan-box-bg">
                                <?php $main_image = get_sub_field('main_image'); ?>
                                <a href="<?php echo $main_image['url']; ?>" class="magnifier magnifier-lrg magnifier-white" data-lightbox="gallery" data-title="<?php the_sub_field('image_caption'); ?>">
                                    <?php $image_thumbnail = get_sub_field('image_thumbnail'); ?>
                                    <img src="<?php echo $image_thumbnail['url']; ?>" alt="<?php echo $image_thumbnail['alt']; ?>">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--/ Gallery -->

    <!-- Customise product -->
    <?php if( get_field('show_customisations') ) : ?>
        <div class="div-grey-shadow">
            <span></span>
            <div class="container">
                <div class="row">
                    <div id="styles" class="product-customizer">
                        <div class="product-customizer-header text-center">
                            <h2><?php _e('Customise your','stannah-whitelabel'); ?> <span class="brand"><?php the_title(); ?></span></h2>
                            <p><?php _e('You can choose from the following options','stannah-whitelabel'); ?></p>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-customizer-preview">
                                <?php 
                                    $rows = get_field('customisation_item' ); // get all the rows
                                    $first_row = $rows[0]; // get the first row 
                                    $full_product_image = $first_row['full_product_image'];
                                    $customisation_description = $first_row['customisation_description'];
                                ?>
                                    <img src="<?php echo $full_product_image['url']  ?>" alt="<?php echo $customisation_description; ?>" />
                                    <span><?php echo $customisation_description; ?></span>

                            </div>
                        </div>
                                            
                        <div class="col-sm-6">
                            <div class="product-customizer-options" data-base-path="<?php echo esc_url( get_template_directory_uri() ); ?>/media/">
                                <p><?php _e('Click on the swatches below to update the style of the stairlift on the left handside.','stannah-whitelabel'); ?></p>
                            <?php 
                                $list_length = count($rows); 
                                $i = 0;
                            ?>
                            <?php while( have_rows('customisation_item') ): the_row(); ?> 
                                <?php
                                    $terms = get_sub_field('customisation_type');
                                    $current_term = get_sub_field('customisation_type'); 
                                    //Get images
                                    $thumb_image = get_sub_field('thumbnail_image');
                                    $main_image = get_sub_field('full_product_image');                                     
                                    ?>
                                    <?php if($terms && $current_term->slug != $last_term->slug && $i != 0) : ?>                                                          
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    //Start a container
                                    if($terms && $current_term->slug != $last_term->slug) : 
                                    ?>
                                        <div class="trim-options text-center">
                                            <div class="navbar-header">
                                                <?php echo $terms->name; ?>
                                            </div>
                                            <ul class="nav navbar-nav">
                                    <?php endif; ?>
                                                <!-- print whatever box -->
                                                <li><img src="<?php echo $thumb_image['url']; ?>" alt="<?php echo $thumb_image['alt']; ?>" data-description="<?php the_sub_field('customisation_description'); ?>" data-main-image="<?php echo $main_image['url']; ?>" /><span></span></li>
                                <?php 
                                    $last_term = $current_term; //Set for comparison in next loop iteration 
                                    $i++;
                                ?>                          
                                <!-- close container -->
                                <?php if($i == $list_length) : ?>                                                          
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--/ Customise product -->

    <!-- Free home assessment -->
    <div class="div-black-shadow">
        <span></span>   
        <div class="container">
            <div class="row">
                <div class="col-md-7 free-home-assessment">
                    <h2><?php _e('Book a no obligation <b>FREE</b> home assessment','stannah-whitelabel'); ?></h2>
                    <p><?php _e('<b>Why wait to recapture the enjoyment of your home?</b><br>Arrange for an advisor to come and visit you to discuss the options available.','stannah-whitelabel'); ?></p>
                    <p class="lead"><b><?php _e('Or','stannah-whitelabel'); ?> <a href="<?php the_field('contact_us','options') ?>"><?php _e('book an appointment now online','stannah-whitelabel'); ?></a></b></p>
                </div>
                <div class="col-md-5">
                    <div class="box-black-top call round-5 text-center">
                        <h3><?php _e('Call our friendly advisors now','stannah-whitelabel'); ?></h3>
                        <div class="box-black-top-content grey">
                            <p class="tt-u"><?php _e('Toll-free','stannah-whitelabel'); ?></p>
                            <span class="tel"><a href="tel:"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a></span><br>
                            <span class="tt-u bordered"><?php _e('or','stannah-whitelabel'); ?></span><br>
                            <a class="cta-red cta-arrow" href="<?php the_field('contact_us','options') ?>"><span><?php _e('Request a callback','stannah-whitelabel'); ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Free home assessment -->
    <?php 
        $product_tax_id = get_field('product_type');
        $product_tax_obj = (get_term_by( 'id', $product_tax_id, 'product_type'));
        $product_set = $product_tax_obj->slug; 
    ?> 
    <!-- Easy as 1,2,3 / Brochure download -->
    <div class="div-white-noshadow text-center">
        <span></span>  
        <div class="container">
            <div class="row"> 
                <?php if ( $product_set != "platform-lift" ) : ?>
                    <div class="col-sm-6">
                        <h2><?php the_field('title','options'); ?> </h2>

                        <div class="arrow-box-grey steps-stacked">
                            <!-- Step 1 -->
                            <div class="step step-1">
                                <span class="step-num">1</span>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Llamar-visita-Stannah-Incisa-icon-1.png" alt="Comprar un salvaescaleras - 1">
                                <p><a href="<?php the_field('simple_steps_page','options') ?>?tab=1"><b><?php the_field('step_1_title','options'); ?></b></a></p>                               
                                <?php the_field('step_1_blurb','options'); ?> 
                            </div>
                            <!-- Step 2 -->
                            <div class="step step-2">
                                <span class="step-num">2</span>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Llamar-visita-Stannah-Incisa-icon-2.png" alt="Comprar un salvaescaleras - 2">
                                <p><a href="<?php the_field('simple_steps_page','options') ?>?tab=2"><b><?php the_field('step_2_title','options'); ?></b></a></p>
                                <?php the_field('step_2_blurb','options'); ?> 
                            </div>
                            <!-- Step 3 -->
                            <div class="step step-3">
                                <span class="step-num">3</span>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Llamar-visita-Stannah-Incisa-icon-3.png" alt="Comprar un salvaescaleras - 3">
                                <p><a href="<?php the_field('simple_steps_page','options') ?>?tab=3"><b><?php the_field('step_3_title','options'); ?></b></a></p>
                                <?php the_field('step_3_blurb','options'); ?> 
                            </div>
                            <a class="cta-red cta-arrow" href="<?php the_field('simple_steps_page','options') ?>"><span><?php _e('See more details about the steps','stannah-whitelabel'); ?></span></a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="<?php if ( $product_set != "platform-lift" ) : ?>col-sm-6 <?php else : ?> col-sm-12<?php endif; ?>">
                   
                    <h2><?php _e('Download or order a<br /> <b>Stannah</b> brochure','stannah-whitelabel'); ?></h2>
                    
                    <div class="arrow-box-grey brochure-download text-left">
                        <div class="row">
                            <div class="col-sm-7">
                                <p><b><?php _e('To download a brochure or get one delivered to your door, please complete the small form below.','stannah-whitelabel'); ?></b></p>
                                <p><?php _e('You\'ll be able to securely download a PDF brochure on the next screen as well as choosing to have one delivered to your door - Most brochures are delivered within 3 working days.','stannah-whitelabel'); ?></p>
                                <?php if ($form_submitted == "Brochure request" || $post_brochure ) : ?>
                                    <div class="details">
                                        <h3><?php _e('Download','stannah-whitelabel'); ?></h3>
                                        <p><?php _e('Please find your PDF download below.','stannah-whitelabel'); ?></p>
                                        <?php $file = get_field('brochure_pdf_file'); ?>
                                        <?php if ($file) : ?>
                                            <a class="cta-red cta-arrow" href="<?php echo $file ?>" target="_blank"><span><?php _e('Download','stannah-whitelabel'); ?></span></a>
                                            <div class="small-text"><?php _e('Size: less than 3mb - PDF format','stannah-whitelabel'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $brochure_image = get_field('brochure_cover_image'); ?>
                            <div class="col-sm-4 col-sm-push-1">
                                <?php if ($brochure_image) : ?>
                                    <img src="<?php echo $brochure_image; ?>" alt="<?php _e('Stannah brochure','stannah-whitelabel'); ?>" class="center-block" />
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!$form_submitted == "Brochure request" ) : ?>
                            <?php 
                                //Translated form attributes
                                $attr_name = _x('Name', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                                $attr_brochure = _x('brochure', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                                $attr_zip = _x('ZIP', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                                $attr_email = _x( 'Email', 'Multiple words should be hyphenated in just this case', 'stannah-whitelabel');
                                $attr_tel = _x('Telephone', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                                $attr_product = _x('Product', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                            ?>
                            <form action="<?php the_permalink(); ?>?<?php _e('process','stannah-whitelabel'); ?>=<?php _e('brochure_options','stannah-whitelabel'); ?>','stannah-whitelabel'); ?>" method="post">
                                <div class="form-group form-group-name">
                                    <label for="brochureName" class="text-uppercase"><?php _e('Your name','stannah-whitelabel'); ?></label>
                                    <input type="text" name="<?php echo $attr_brochure; ?>-<?php echo $attr_name; ?>" class="form-control" id="brochureName" required>
                                    <input type="hidden" name="<?php echo $attr_brochure; ?>-<?php echo $attr_product; ?>" class="form-control" id="brochureName" value="<?php the_title(); ?>">
                                </div>
                                
                                <div class="form-group form-group-zip">
                                    <label for="brochureZip" class="text-uppercase"><?php _e('Your zip code','stannah-whitelabel'); ?></label>
                                    <input type="text" name="<?php echo $attr_brochure; ?>-<?php echo $attr_zip; ?>" class="form-control" id="brochureZip">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-email">
                                            <label for="brochureEmail" class="text-uppercase"><?php _e('Your email address','stannah-whitelabel'); ?></label>
                                            <input type="email" name="<?php echo $attr_brochure; ?>-<?php echo $attr_email; ?>" class="form-control" id="brochureEmail" required>
                                        </div>
                                    </div>                                
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-tel">
                                            <label for="brochureTel" class="text-uppercase"><?php _e('Your phone number','stannah-whitelabel'); ?></label>
                                            <input type="tel" name="<?php echo $attr_brochure; ?>-<?php echo $attr_tel; ?>" class="form-control" id="brochureTel">
                                            <span class="text-uppercase"><?php _e('Optional','stannah-whitelabel'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cta">
                                    <button class="cta-red cta-arrow" type="submit" name="brochure-submitted" value="<?php _e('Brochure request','stannah-whitelabel'); ?>"><span><?php _e('Submit brochure request','stannah-whitelabel'); ?></span></button>
                                </div>
                            </form>
                        <?php else : ?>
                            <h3> <?php _e('Thank you, your brochure request has been sent.','stannah-whitelabel'); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Easy as 1,2,3 / Brochure download -->


<?php get_footer(); ?>