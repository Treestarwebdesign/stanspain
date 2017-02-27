<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
                        <div class="panel panel-news-side" style="display: none;">
                            <div class="panel-heading clearfix">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icon-cal.png" alt="" />
                                <p><?php the_date("jS <b>M Y</b>"); ?></p>
                            </div>
                            <div class="panel-body">
                                <?php
                                    if (!in_category('Customer review')) :
                                ?>
                                    <div class="panel-content-wrapper">
                                        <p><b><?php _e('POSTED BY', 'stannah-whitelabel'); ?></b></p>
                                        <a href="#" class="brand"><?php the_author(); ?></a>
                                    </div>

                                    <div class="panel-content-wrapper">
                                        <p><b><?php _e('IN CATEGORY', 'stannah-whitelabel'); ?></b></p>
                                        <?php the_category(" "); ?>
                                    </div>

    	                            <?php if (has_tag()): ?>
    	                                <div class="panel-content-wrapper">
    	                                    <p><b><?php _e('TAGS', 'stannah-whitelabel'); ?></b></p>
    	                                    <?php the_tags(""," ",""); ?>
    	                                </div>
    	                            <?php endif; ?>
                                <?php endif; ?>
                                <div class="panel-content-wrapper">
                                    <p><b><?php _e('SHARE', 'stannah-whitelabel'); ?></b></p>
                                    <ul class="social-icons-list">
                                        <li><a href="https://twitter.com/intent/tweet?text=<?php urlencode( the_title() ); ?>&url=<?php urlencode( the_permalink() ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-twitter.png" alt="<?php _e('Twitter', 'stannah-whitelabel'); ?>" />
                                        </a></li>
                                        <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php urlencode( the_permalink() ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-facebook.png" alt="<?php _e('Facebook', 'stannah-whitelabel'); ?>" />
                                        </a></li>
                                        <li><a href="https://plus.google.com/share?text=<?php urlencode( the_title() ); ?>&url=<?php urlencode( the_permalink() ); ?>">
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social-googleplus.png" alt="<?php _e('Google plus', 'stannah-whitelabel'); ?>" />
                                        </a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

					<!--<?php the_post_thumbnail( 'large' ); ?>-->
					<div class="the-content">
						<?php the_content(); ?>
					</div>
                    <?php if (in_category('Customer review')) : ?>
                    <div class="box-white-bg section-div-lightergrey related-stories">
                        <h3 class="text-center"><b><?php _e('Related stories', 'stannah-whitelabel'); ?></b></h3>
                        <div class="box-white-bg-content">
                            <div class="row">
                                <?php $post_id = get_the_ID(); ?>
                                <?php $query = new WP_Query(array( 'posts_per_page' => 3, 'cat' => 4, 'post__not_in' => array($post_id))); ?>
                                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                <?php $link = get_the_permalink(); ?>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <?php
                                            $attr = $arrayName = array('class' => 'round-5');
                                            the_post_thumbnail( 'thumbnail', $attr );
                                        ?>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo wp_trim_words( get_the_excerpt(), $num_words = 14, $more = null ); ?></p>
                                            <a href="<?php echo $link; ?>"><?php _e('Read more...', 'stannah-whitelabel'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!--/ News detail -->

</article><!-- #post-## -->
