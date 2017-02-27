<?php
/**
 * Template Name: Product listing
 * A page for listing product post types
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
    <div class="div-white div-top product-listing-header">
        <span></span>
        <div class="container">
            <div class="row">   
                <div class="col-sm-12">
                    <div>
                        <ol class="breadcrumb">
                        <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
                        </ol>
                        <h1><?php the_field('product_listing_title'); ?></h1>
                    </div>
                    <div class="product-content">
                        <div class="content"> 
                            <?php the_field('listing_main_content'); ?>
                        </div>
                    </div>
                    <?php if (get_field('listing_main_content')) : ?>
                        <div class="arrow-down-box round-15 text-center">
                            <p><?php _e('Since 1975 <em>over <b>600,000</b></em> people have chosen <b class="brand">Stannah</b> as their stairlift provider','stannah-whitelabel');?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Product listing -->
    <div class="div-white product-listing">
        <span></span>
        <div class="container">

            <div class="product-container">
                <!-- Product information - Product 1 -->
                <?php  
                $product_set = get_field('product_set');

                $posts = get_posts(array(
                    'numberposts'   => -1,
                    'post_type' => 'product', //Post type
                    'product_type' => $product_set //Taxonomy 
                ));

                if( $posts ): ?>                   
                       
                    <?php foreach( $posts as $post ): 
                        
                        setup_postdata( $post )
                        
                        ?>
                        <div class="row product <?php if ($product_set == "plataformas") { echo "type-platform-lift"; } ?>" data-uses="<?php if ( in_array( 'straight_stairs', get_field('suitability_types') ) ) : ?>straight<?php endif; ?> <?php if ( in_array( 'curved_stairs', get_field('suitability_types') ) ) : ?>curved <?php endif; ?><?php if ( in_array( 'narrow_stairs', get_field('suitability_types') ) ) : ?> narrow<?php endif; ?><?php if ( in_array( 'outdoor_stairs', get_field('suitability_types') ) ) : ?> outdoor<?php endif; ?>">
                            <h2><?php the_title(); ?></h2>
                            <div class="product-gallery">
                                <!-- <a href="<?php echo esc_url( get_template_directory_uri() ); ?>/media/starla1.jpg" class="magnifier magnifier-lrg" > -->
                                <?php 
                                    $i = 0;

                                    while ( have_rows('listing_images') ) : the_row(); 
                                    $image = get_sub_field('product_image');
                                ?>                               
                                    <?php if ($i == 0) : ?>
                                        <span class="magnifier magnifier-lrg" >
                                           
                                                <img src="<?php echo $image['url']; ?>" data-base-url="./media/main-chair-shots/" alt="<?php echo $image['alt']; ?>" />
                                                <!-- <span></span> -->
                                        </span>                    
                                    <div class="product-thumbnails">
                                    <?php endif; ?>
                                    <?php if (count(get_field('listing_images')) > 1) : ?>
                                        <img src="<?php echo $image['url']; ?>" data-base-url="./media/main-chair-shots/" alt="<?php echo $image['alt']; ?>" />
                                    <?php endif; ?>
                                <?php 
                                    $i++;
                                    endwhile; 
                                ?>
                                    </div>

                                <div class="text-center">
                                    <a class="cta-red cta-arrow" href="<?php the_permalink(); ?>"><span><?php  _e('About the','stannah-whitelabel'); ?> <?php if ($product_set != "platform-lift") { the_title(); } ?></span></a>
                                </div>
                            </div>
							
							<?php if ($product_set == "plataformas") : ?>
                            <div class="product-details-plataformas">
                            <?php else : ?>
                            <div class="product-details">
                            <?php endif; ?>
                                <?php if ( get_field('listing_banner') ) : ?>
                                    <div class="banner-flash banner-flash-sml">
                                        <div class="banner-content-wrapper">
                                            <?php the_field('listing_banner'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>                                
                                <div class="product-header">
                                    <h3><?php the_field('product_byline'); ?></h3>
                                </div>
                                <?php if ($product_set != "platform-lift") : ?>
                                    <div class="product-keybenefits">
                                        <h4><?php _e('Key benefits:','stannah-whitelabel'); ?></h4>
                                        <?php the_field('key_features_listing'); ?>
                                    </div>

                                    <div class="product-suitability">
                                        <h4><?php _e('Suitable for:','stannah-whitelabel'); ?></h4>
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
                                        </ul>
                                    </div>
                               <?php else : ?>
                                    <div class="product-suitability">
                                        <h4><?php _e('Suitable for:','stannah-whitelabel'); ?></h4>
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
                                            <?php if ( in_array( 'inclined_lift', get_field('suitability_types') ) ) : ?>
                                                <li class="lift-type-inclined"><span class="lift-icon"><?php _ex( 'I', 'This letter is the key for "Inclined lift" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Inclined lift','stannah-whitelabel'); ?></li>
                                            <?php endif; ?>
                                            <?php if ( in_array( 'vertical_lift', get_field('suitability_types') ) ) : ?>
                                                <li class="lift-type-vertical"><span class="lift-icon"><?php _ex( 'V', 'This letter is the key for "Vertical lift" on Product pages', 'stannah-whitelabel' ); ?></span><?php _e('Vertical lift','stannah-whitelabel'); ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="product-keybenefits">
                                        <h4><?php _e('Key benefits:','stannah-whitelabel'); ?></h4>
                                        <?php the_field('key_features_listing'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (have_rows('customisable_options')) : ?>
                                    <div class="product-styles">
                                        <h4><?php _e('Styling options:','stannah-whitelabel'); ?></h4>
                                        <?php while ( have_rows('customisable_options')): the_row();  ?>                    
                                            <div class="product-styles-group round-5">
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
                                        <?php if (get_field('product_customisation_text')): ?>
                                        <em><?php the_field('product_customisation_text'); ?></em>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php $customer_story = get_field('product_customer_story');
                                    if ($customer_story) :
                                ?>       
                                    <?php foreach( $customer_story as $post): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>                         
                                            <div class="quote-wrap source-external">
                                                <blockquote class="text-right">                                    
                                                    <p><?php the_field('customer_quote'); ?></p>                                            
                                                    <span></span>
                                                </blockquote>
                                                <footer><?php the_field('customer_name'); ?></footer>
                                            </div>
                                    <?php endforeach; ?>                              
                                <?php endif; ?>
                            </div>

                            <?php if ($customer_story) : ?> 
                                <div class="product-story">
                                    <div class="row">
                                        <?php foreach( $customer_story as $post): // variable must be called $post (IMPORTANT) ?>
                                            <div class="cta" data-labelwhenopen="<?php _e("Close story","stannah-whitelabel"); ?>"><span><?php printf( __( "Read about %s's story", "stannah-whitelabel" ), get_field('customer_first_name') ); ?></span></div>
                                            <div class="row product-story-content">
                                                <div class="col-sm-7">
                                                    <h3><?php the_title(); ?></h3>
                                                    <?php the_field('short_story'); ?>
                                                    <p><a href="<?php the_permalink(); ?>"><?php _e('Read more','stannah-whitelabel'); ?></a></p>
                                                </div>
                                                <div class="col-sm-4 col-sm-push-1">
                                                    <?php 
                                                        $image = get_field('experts_image');
                                                    ?>
                                                    <?php if ($image) : ?>
                                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                                    <?php endif; ?>
                                                    <a class="cta-arrow cta-grey" href="<?php the_field('customer_stories','options') ?>"><span><?php _e('Read more stories','stannah-whitelabel'); ?></span></a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>                              
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                   
                    <?php endforeach; ?>
                    
                    
                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>
            </div>
            <!-- Product listing footer -->
            <div class="row product-listing-footer">
                <div class="col-md-7">
                    <div class="product-listing-footer-message">
                        <h2><?php _e('We\'re here to help','stannah-whitelabel'); ?></h2>
                        <p><?php _e('Our knowledgeable experts can help you choose the right stairlift for you or a loved one, without obligation.','stannah-whitelabel'); ?></p>                    
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box-black-top call round-5">
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

    <!-- Teaser -->
    <?php if (get_field('teaser_title')) : ?>
        <div class="div-cream-shadow text-center listing-teaser">
            <span></span>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="h2-sml"><?php the_field('teaser_title'); ?></h2>
                        <a class="cta-red cta-arrow" href="<?php the_field('teaser_button_link'); ?>"><span><?php the_field('teaser_button_text'); ?></span></a>
                    </div>
                </div>
            </div>           
        </div>
    <?php endif; ?>
    <!-- End teaser -->

    <!-- 3 steps -->
    <?php if (get_field('step_1_blurb', 'option')) : ?>
        <div class="div-black-shadow text-center">  
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
    <?php if ( $product_set != "platform-lift" ) : ?>
        <div class="product-listing near-footer">
            <span></span>
            <div class="container">
                <div class="row product-listing-footer">
                    <div class="col-md-7">
                        <div class="product-listing-footer-message">
                            <h2><?php _e('We\'re here to help','stannah-whitelabel'); ?></h2>
                            <p><?php _e('Our knowledgeable experts can help you choose the right stairlift for you or a loved one, without obligation.','stannah-whitelabel'); ?></p>                    
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="box-black-top call round-5">
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
    <?php endif; ?>

<?php get_footer(); ?>