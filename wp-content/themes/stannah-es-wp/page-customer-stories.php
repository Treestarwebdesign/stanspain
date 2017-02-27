<?php
/**
 * Template Name: Customer stories
 * Customer stories page
 */

get_header(); ?>

    <!-- About section -->
    <div class="div-white div-top customer-stories-header">
        <div class="container">
            <div class="row">   
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                    <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
                    </ol>
                    <h1> <?php _e('We\'ve sold over','stannah-whitelabel'); ?> <b><?php _e('600,000 stairlifts','stannah-whitelabel'); ?></b> <?php _e('in','stannah-whitelabel'); ?> <b> <?php _e('40 countries','stannah-whitelabel'); ?></b> <?php _e('worldwide.  Here are some of the reasons why...','stannah-whitelabel'); ?></h1>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer stories -->
    <div class="div-white customer-stories">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="grey-box">

                        <h2 class="text-center"><?php _e('Here are some extracts from what genuine, happy &amp; satisfied customers have had to say to us.','stannah-whitelabel'); ?></h2>

                        <!-- Customer carousel -->
                        <div class="customer-carousel">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="tab-content">

                                    <?php if( have_rows('story_teaser') ): ?>
                                     
                                        <?php $i = 1; ?>
                                        <?php while( have_rows('story_teaser') ): the_row(); ?>
                                            <?php
                                            $posts = get_sub_field('customer_story_link');

                                            if( $posts ): ?>
                                                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                                                    <?php setup_postdata($post); 
                                                        $customer_story_link = get_the_permalink();       
                                                        $customer_story_title = get_the_title();
                                                        $customer_first_name = get_field('customer_first_name');
                                                        $customer_image = get_field('customer_image');
                                                    ?>
                                                <?php endforeach; ?>
                                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                            <?php endif; ?>

                                                <div id="customer-<?php echo $i; ?>" class="tab-pane <?php if ($i == 1) : ?>active<?php endif; ?>">

                                                        <h3><b><?php echo $customer_story_title; ?></b></h3>
                                                        <p><?php echo $customer_first_name; ?> <?php _ex('chose the', 'Customer [chose the] X product' ,'stannah-whitelabel'); ?> <span class="brand text-uppercase"><?php the_sub_field('chosen_product'); ?></span></p>
                                                        
                                                        <hr />
                                                        <blockquote class="blockquote-white-basic"><?php the_sub_field('customer_quote'); ?></blockquote>
                                                        <a href="<?php echo $customer_story_link; ?>" class="cta-plain cta-red"><span><?php _e('Read more','stannah-whitelabel'); ?></span></a>
                                                        <?php if ($customer_image) : ?>
                                                            <?php $thumb = $customer_image['sizes']['thumbnail']; ?>
                                                            <img src="<?php echo $thumb; ?>" alt="<?php echo $customer_image['alt']; ?>" />
                                                        <?php endif; ?>
                                                </div>

                                            <?php $i++; ?>
                                        <?php endwhile; ?>
                                     
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="nav nav-tabs">
                                        <?php if( have_rows('story_teaser') ): ?>
                                         
                                            <?php $i = 1; ?>
                                            <?php while( have_rows('story_teaser') ): the_row(); ?>
                                                <?php
                                                $posts = get_sub_field('customer_story_link');

                                                if( $posts ): ?>
                                                    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                                                        <?php setup_postdata($post); 
                                                            $customer_story_link = get_the_permalink();       
                                                            $customer_story_title = get_the_title();
                                                            $customer_first_name = get_field('customer_first_name');
                                                         
                                                        ?>
                                                    <?php endforeach; ?>
                                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                                <?php endif; ?>

                                                    <li class="customer-<?php echo $i; ?> <?php if ($i == 1) : ?>active<?php endif; ?>">
                                                        <a href="#customer-<?php echo $i; ?>" data-toggle="tab">
                                                            <!--<b><?php echo $customer_first_name; ?><?php _ex('\'s story','E.g Fred\'s story - Story belongs to customer name','stannah-whitelabel'); ?></b>-->
                                                            <b>El caso de <?php echo $customer_first_name; ?></b>
                                                            <?php the_sub_field('listing_text'); ?>
                                                        </a>
                                                    </li>

                                                <?php $i++; ?>
                                            <?php endwhile; ?>
                                         
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Customer carousel -->

                        <!-- Customer stories -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-white-bg">
                                    <h3 class="text-center"><b><?php _e('Other Stories','stannah-whitelabel'); ?></b></h3>
                                    <div class="box-white-bg-content">
                                            <?php $query = new WP_Query( array( 'posts_per_page' => 4, 'category_name' => _x( 'Customer story', 'The translation of your category for customer stories - this makes the listing work on the Customer stories and home page', 'stannah-whitelabel') ) ); ?>
                                            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                            <?php $link = get_the_permalink(); ?>
                                            <ul class="date-list">
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2">
                                                        <span class="timestamp"><?php the_time("\<\b\>M\<\/\b\> Y"); ?></span>
                                                    </div>
                                                    <div class="col-sm-7 col-md-8">
                                                        <p><?php echo wp_trim_words( get_the_excerpt(), $num_words = 14, $more = null ); ?></p>
                                                        <a href="<?php echo $link; ?>"><?php _e('Read more...','stannah-whitelabel'); ?></a>
                                                    </div>
                                                    <?php if(has_post_thumbnail()) : ?>
                                                    <div class="col-sm-2 col-md-2">
                                                        <?php 
                                                            $attr = $arrayName = array('class' => 'round-5');
                                                            the_post_thumbnail( 'thumbnail', $attr ); 
                                                        ?> 
                                                    </div>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        <?php endwhile; else : ?>
                                            <h3><?php _e('There are no reviews on the site right now','stannah-whitelabel'); ?></h3>
                                        <?php endif; ?>
                                            <?php

                                                // Get the URL of this category
                                                $category_link = get_category_link( get_cat_ID( 'Customer story' ) );
                                            ?>
                                            <div class="text-center">
                                                <a href="<?php echo esc_url($category_link); ?>" class="cta-arrow cta-red"><span><?php _e('See all customer stories','stannah-whitelabel'); ?></span></a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-white-bg">
                                    <h3 class="text-center"><b><?php _e('Your letters','stannah-whitelabel'); ?></b></h3>
                                    <div class="box-white-bg-content">
                                            <?php $query = new WP_Query( array( 'posts_per_page' => 4, 'category_name' => _x( 'Customer letter', 'The translation of your category for customer letter - this makes the listing work on the Customer stories and home page', 'stannah-whitelabel') ) ); ?>
                                            <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                            <?php $link = get_the_permalink(); ?>
                                            <ul class="date-list">
                                                <li class="row">
                                                    <div class="col-sm-3 col-md-2">
                                                        <span class="timestamp"><?php the_time("\<\b\>M\<\/\b\> Y"); ?></span>
                                                    </div>
                                                    <div class="col-sm-7 col-md-8">
                                                        <?php if ( get_the_excerpt() ) : ?> 
                                                            <p><?php echo wp_trim_words( get_the_excerpt(), $num_words = 14, $more = null ); ?></p>
                                                        <?php else : ?>
                                                            <p><?php the_title(); ?></p>
                                                        <?php endif ?>
                                                        <a href="<?php echo $link; ?>"><?php _e('Read more...','stannah-whitelabel'); ?></a>
                                                    </div>
                                                    <?php if(has_post_thumbnail()) : ?>
                                                    <div class="col-sm-2 col-md-2">
                                                        <?php 
                                                            $attr = $arrayName = array('class' => 'round-5');
                                                            the_post_thumbnail( 'thumbnail', $attr ); 
                                                        ?> 
                                                    </div>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        <?php endwhile; else : ?>
                                            <h3><?php _e('There are no letters on the site right now','stannah-whitelabel'); ?></h3>
                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>
                                        <div class="text-center">
                                            <?php

                                                // Get the URL of this category
                                                $category_link = get_category_link( get_cat_ID( 'Customer letter' ) );
                                            ?>
                                            <div class="text-center">
                                                <a href="<?php echo esc_url($category_link); ?>" class="cta-arrow cta-red"><span><?php _e('See all customer letters','stannah-whitelabel'); ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <!--/ Customer stories -->

                        <!-- Testiomonials -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="smoke-box text-center round-5">
                                    <h3><?php _e('Tell us your story','stannah-whitelabel'); ?></h3>
                                    <p><?php _e('Write and let us know what you think about your stair lift and how it\'s impacted your life.','stannah-whitelabel'); ?></p>
                                    <a href="<?php the_field('contact_us','options') ?>" class="cta-plain cta-red"><span><?php _e('Send us your story','stannah-whitelabel'); ?></span></a>
                                </div>
                            </div>
                           
                            <?php if( get_field('customer_quote_1') ) : ?>
                                <div class="col-sm-4">
                                    <div class="quote-wrap source-external">
                                        <blockquote class="text-right">
                                            <p><?php the_field('customer_quote_1'); ?></p>
                                            <span></span>
                                        </blockquote>
                                        <footer><?php the_field('customer_name_1'); ?></footer>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if( get_field('customer_quote_2') ) : ?>
                                <div class="col-sm-4">
                                    <div class="quote-wrap source-external">
                                        <blockquote class="text-right">
                                            <p><?php the_field('customer_quote_2'); ?></p>
                                            <span></span>
                                        </blockquote>
                                        <footer><?php the_field('customer_name_2'); ?></footer>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!--/ Testiomonials -->


                        <!-- Footer CTA -->
                        <div class="section-div section-div-dkgrey section-div-arrowup-sml cta-msg round-5">
                            <div class="row vertically-centered">
                                <div class="col-sm-8">
                                    <p><?php _e('Join over <span>600,000 households</span> that have enjoyed the new life that a Stannah Stairlift brings','stannah-whitelabel'); ?></p>
                                    <p class="smaller"><?php _e('Within three to ten days, you can be gliding up and down stairs comfortably.','stannah-whitelabel'); ?> <a href="<?php the_field('contact_us','options') ?>"><?php _e('Book an appointment with one of our friendly advisors now','stannah-whitelabel'); ?></a>.</p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="white-box-bg cta-msg-panel text-center">
                                        <?php _e('Call our friendly advisors for <b>FREE</b> on','stannah-whitelabel'); ?>
                                        <br />
                                        <b><a href="tel:<?php include 'includes/stannah-phone-num.php'; ?>" class="icon-phone ga-number"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Footer CTA -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Customer stories -->

<?php get_footer(); ?>