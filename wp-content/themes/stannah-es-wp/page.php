<?php
/**
 * The default template for displaying pages
 */

get_header(); ?>

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
            </div>
        </div>
    </div>
    <!--/ About section -->

    <!-- News detail -->
    <div class="div-white div-top news-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12 news-content">
                    <h1><b><?php the_title(); ?></b></h1>

                    <div class="news-info-box">
                        <div class="panel panel-news-side ">
                            <div class="panel-heading clearfix">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icon-cal.png" alt="icon cal" />
                                <p><?php the_time("jS <b>M Y</b>"); ?></p>
                            </div>
                            <div class="panel-body">
                                <div class="panel-content-wrapper">
                                    <p><b><?php __('SHARE','stannah-whitelabel'); ?></b></p>
                                    <ul class="social-icons-list">
                                        <li><a href="https://twitter.com/intent/tweet?text=<?php urlencode( the_title() ); ?>&url=<?php urlencode( the_permalink() ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-twitter.png" alt="<?php __('Twitter','stannah-whitelabel'); ?>" />
                                        </a></li>
                                        <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php urlencode( the_permalink() ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-facebook.png" alt="<?php __('Facebook','stannah-whitelabel'); ?>" />
                                        </a></li>
                                        <li><a href="https://plus.google.com/share?text=<?php urlencode( the_title() ); ?>&url=<?php urlencode( the_permalink() ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-googleplus.png" alt="<?php __('Google+','stannah-whitelabel'); ?>" />
                                        </a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

					<?php the_post_thumbnail( 'large' ); ?>
					<div class="the-content">
                        <?php if (have_posts()) : while (have_posts()) : the_post();?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
					</div>

                </div>
            </div>
            </div>
    </div>
    <!--/ News detail -->

<?php get_footer(); ?>
