<?php
/**
 * Template Name: Homepage
 * The front page of the Wordpress site
 */

get_header(); ?>
    <!-- Banner -->
    <!--/ Top promo image -->
    <?php $bg_image = get_field('background_image'); ?>
    <div class="banner div-btm" style="background-image: url(<?php echo $bg_image['url']; ?>);">
        <div class="container">
            <div class="row">
                <?php if( have_rows('list_of_benefits')) : ?>
                   <div class="col-md-7">
                        <div class="banner-holder">
                            <h1><?php the_field('main_title'); ?></h1>
                            <div class="banner-content">
                                <ul class="tick-list">
                                    <?php while ( have_rows('list_of_benefits') ) : the_row(); ?>
                                        <li><?php the_sub_field('key_point'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <a class="cta-red cta-arrow" href="<?php the_field('button_link'); ?>"><span><?php the_field('button_text'); ?></span></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ( get_field('show_teaser', 'option') &&  get_field('teaser_badge', 'option') ) : ?>
            <?php $image = get_field('teaser_badge','option') ?>
                <img class="teaser-badge" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php else : ?>
                <div class="banner-flash">
                    <div class="banner-content-wrapper">
                        <?php the_field('mini_banner'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Platform lift range -->
            <?php include 'includes/second-range-teaser.php'; ?>
    <!--/ Platform lift range -->

    <!-- Teaser section -->
    <!--<?php if (get_field('show_teaser', 'option')) : ?>
    <div class="div-black-shadow teaser-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text">
                    <h2><?php the_field('teaser_title','option'); ?></h2>
                    <p>
                        <?php the_field('teaser_blurb','option'); ?>
                    </p>
                    <a class="cta-red cta-arrow" href="<?php the_field('teaser_button_link','option'); ?>"><span><?php the_field('teaser_button_text','option'); ?></span></a>
                </div>
                <div class="col-sm-6">
                    <?php $teaser_image = get_field('teaser_image','option'); ?>
                    <div class="image-caption">
                        <img src="<?php echo $teaser_image['url']; ?>" alt="<?php echo $teaser_image['alt']; ?>" />
                        <?php if ($teaser_image['caption']) : ?>
                            <div class="caption"><?php echo $teaser_image['caption']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php endif; ?>-->

    <!-- About section -->
    <?php if (have_rows('customer_feedback') || get_field('customer_feedback_embed')) : ?>
        <div class="div-white">
            <span></span>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 about-left">
                        <h2><?php the_field('intro_heading'); ?></h2>
                        <ul class="border-list">
                            <?php while ( have_rows('short_list_of_facts_about_the_company') ) : the_row(); ?>
                                <li><?php the_sub_field('short_fact'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="clearfix">
                            <a class="cta-red cta-arrow" href="<?php the_field('about_page','options') ?>"><span><?php _e('More about Stannah','stannah-whitelabel'); ?></span></a>
                            <a class="brand" href="<?php the_field('advice_page','options') ?>"><?php _e('Read our advice on getting a Stairlift','stannah-whitelabel'); ?></a>
                        </div>
                    </div>
                    <div class="col-sm-5 about-right">
                        <?php if (get_field('customer_feedback_source') == "written_feedback") : ?>
                            <?php if(have_rows('customer_feedback')) : ?>
                                    <div class="box-tan-bg">
                                        <h3><?php _e('See what <b>Stannah</b> customers say about us','stannah-whitelabel'); ?></h3>
                                        <div class="box-tan-bg-content text-right">
                                            <?php while ( have_rows('customer_feedback') ) : the_row(); ?>
                                                <div class="quote-wrap source-external source-img clearfix">
                                                    <blockquote class="text-right blockquote-white">
                                                        <p><?php the_sub_field('quote'); ?></p>
                                                        <span></span>
                                                    </blockquote>
                                                    <footer>
                                                        <?php the_sub_field('customer_initials'); ?> <cite><?php the_sub_field('customer_location'); ?></cite>
                                                    </footer>
                                                </div>
                                            <?php endwhile; ?>
                                            <a class="cta-mini-arrow" href="<?php the_field('customer_stories','options') ?>"><?php _e('See more customer stories','stannah-whitelabel'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php elseif(get_field('customer_feedback_source') == "embed") : ?>
                                <?php if(get_field('customer_feedback_embed')) : ?>
                                    <div class="box-tan-bg-content text-right">
                                        <?php the_field('customer_feedback_embed'); ?>
                                        <a class="cta-mini-arrow" href="<?php the_field('customer_stories','options') ?>"><?php _e('See more customer stories','stannah-whitelabel'); ?></a>
                                    </div>
                                <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Stairlift range -->
            <?php include 'includes/range-teaser.php'; ?>
    <!--/ Stairlift range -->

    <!-- Can Stannah help you -->
    <div class="div-black-shadow text-center">
        <span></span>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php _e('<b>Got a question</b> or need help deciding?','stannah-whitelabel'); ?></h2>
                    <p><?php _e('Call our expert team of friendly advisors now to discuss your needs.','stannah-whitelabel'); ?></p>
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1 col-sm-6">
                            <div class="box-black-top call round-5">
                                <h3><?php _e('Call our friendly advisors now','stannah-whitelabel'); ?></h3>
                                <div class="box-black-top-content grey">
                                    <p class="tt-u"><?php _e('Toll-free','stannah-whitelabel'); ?></p>
                                    <span class="tel"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></span><br />
                                    <span class="tt-u bordered"><?php _e('or','stannah-whitelabel'); ?></span><br />
                                    <a class="cta-red cta-arrow" href="<?php the_field('contact_us','options') ?>"><span><?php _e('Request a callback','stannah-whitelabel'); ?></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <div class="box-black-top round-5">
                                <h3><?php _e('Alternatively...','stannah-whitelabel'); ?></h3>
                                <div class="box-black-top-content">
                                    <p><?php _e('You can','stannah-whitelabel'); ?> <a href="<?php the_field('contact_us','options') ?>"><?php _e('book a no obligation FREE stairlift assessment','stannah-whitelabel'); ?></a> <?php _e('at your home from one of our friendly advisors, who will be able to give you an exact quote for your needs.','stannah-whitelabel'); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Can Stannah help you -->

    <!-- Arrange and 4 reasons -->
    <!-- Why choose Stannah -->
    <?php if( have_rows('reasons') ): ?>
        <div class="div-grey-shadow text-center">
            <span></span>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2><?php _e('Why choose <b><span class="brand">Stannah</span></b>...','stannah-whitelabel'); ?></h2>
                        <p class="lead"><?php the_field('reasons_description'); ?></p>
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
    <!--/ Arrange and 4 reasons -->

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

    <!-- stannah news -->
    <?php
        /* The 2nd Query (without global var) */
        $cats = _x( 'News', 'The translation of your category for news - this makes the listing work on the homepage', 'stannah-whitelabel') . ', ' . _x( 'Customer story', 'The translation of your category for customer stories - this makes the listing work on the Customer stories and homepage page', 'stannah-whitelabel');
        $args2 = array(
            'posts_per_page'    => 4,
            'category_name'     => $cats
        );
        $query2 = new WP_Query( $args2 );
        $count = count($query2);
        if ( have_posts() ) :
    ?>
        <div class="div-cream-dropshadow text-center">
            <span></span>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2><?php _e('The latest from <b class="brand">Stannah</b>','stannah-whitelabel'); ?></h2>
                        <div class="news-list">
                            <?php
                            // Get the ID of a given category
                            $category_id_news = get_cat_ID( 'News' );
                            $i = 0;
                            while ( $query2->have_posts() ) : $query2->the_post();
                                if ( $i % 2 == 0 ) : ?>
                                    <div class="row">
                                <?php
                                endif;

                                if (has_category('news')) :
                                    //NEWS
                                ?>
                                    <?php $link = get_the_permalink(); ?>
                                    <div class="col-sm-6">
                                        <div class="news-item round-5 clearfix">
                                            <div class="news-item-left">
                                                <span class="news-type"><?php _e('News','stannah-whitelabel'); ?></span>
                                                <span class="date"><?php the_time("\<\s\p\a\\n\>M\<\/\s\p\a\\n\> Y"); ?></span>
                                            </div>
                                            <div class="news-item-right">
                                                <div class="news-item-right-inner">
                                                    <h4><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
                                                    <p><?php the_excerpt(); ?></p>
                                                    <a class="cta-mini-arrow" href="<?php echo $link; ?>"><?php _e('Read more','stannah-whitelabel'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif (has_category('customer-story')) :
                                    // Customer review
                                ?>
                                    <?php $link = get_the_permalink(); ?>
                                    <div class="col-sm-6">
                                        <div class="news-item news-review round-5 clearfix">
                                            <div class="news-item-left">
                                                <span class="news-type"><?php _e('Customer review','stannah-whitelabel'); ?></span>
                                                <span class="date"><?php the_time("\<\s\p\a\\n\>M\<\/\s\p\a\\n\> Y"); ?></span>
                                            </div>
                                            <div class="news-item-right">
                                                <div class="news-item-right-inner">
                                                    <h4><a href="<?php echo $link; ?>"><?php the_title(); ?></h4>
                                                    <p><?php the_excerpt(); ?></p>
                                                    <a class="cta-mini-arrow" href="<?php echo $link; ?>"><?php _e('Read more','stannah-whitelabel'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; if ( $i % 2 == 1 ) : ?>
                                    </div>
                            <?php endif; $i++; endwhile; ?>
                        </div>
                        <?php

                            // Get the URL of this category
                            $category_link = get_category_link( $category_id_news );
                        ?>

                        <a class="cta-grey cta-arrow" href="<?php echo esc_url( $category_link ); ?>"><span><?php _e('See more news','stannah-whitelabel'); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; wp_reset_query(); wp_reset_postdata(); ?>
    <!--/ stannah news -->

    <!-- See what customers say -->
    <?php

    $customer_stories = get_field('customer_story', $orig_id);

    if ($customer_stories) : ?>
        <div class="div-white-shadow text-center">
            <span></span>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2><?php _e('See what our customers say about us...','stannah-whitelabel'); ?></h2>
                        <hr class="arrow" />
                        <?php foreach( $customer_stories as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                            <div class="customers-review row">
                                <div class="col-md-4">
                                    <!-- Responsive video holder -->
                                    <?php if (get_field('customer_video')) : ?>
                                        <div class="video-responsive">
                                            <?php the_field('customer_video'); ?>
                                        </div>
                                    <?php else : ?>
                                        <?php $image = get_field('customer_image'); ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8">
                                    <!-- Quote -->
                                    <h3 class="brand"><?php the_title(); ?></h3>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <?php the_field('short_story'); ?>
                                            <a class="cta-red cta-arrow" href="<?php the_field('customer_stories','options') ?>"><span><?php _e('See all our customer stories','stannah-whitelabel');?></span></a>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="quote-wrap source-external">
                                                <blockquote class="text-right">
                                                    <p><?php the_field('customer_quote');?></p>
                                                    <span></span>
                                                </blockquote>
                                                <footer><?php the_field('customer_name'); ?></footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; wp_reset_query(); wp_reset_postdata(); ?>
    <!--/ See what customers say -->

<?php get_footer(); ?>
