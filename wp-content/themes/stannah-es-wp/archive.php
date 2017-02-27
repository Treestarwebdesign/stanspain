<?php
/**
 * The template for displaying archive pages
 */

	// Pagination vars
	global $wp_query;

	$big = 999999999; // need an unlikely integer
	$pag_args = array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'type' => 'list',
				'prev_text' => '◀',
				'next_text' => '▶',
				'mid_size' => 6,
	);
	//For use on with pagination

	$total_posts = $wp_query->found_posts;
	$num_of_displayed_posts = $wp_query->post_count;
    $paged_number = get_query_var( 'paged', false );
    $posts_per_page = get_query_var( 'posts_per_page', 1 );

    //Work out if we're on the first page
    if (!$paged_number) {
    	$page_one = true;
    }

    //The range of the pagenation
    $pag_range =  pagination_range($page_one, $posts_per_page, $num_of_displayed_posts, $paged_number );

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
  
    <!-- News results -->
    <div class="div-white div-top news-search">
        <div class="container">
            <div class="news-search-header row">
                <div class="col-md-12 main-content">
                    <h1><b><?php _e('Latest news from Stannah', 'stannah-whitelabel'); ?></b></h1>
                    <div class="row">
                        <div class="col-md-7 col-sm-12">
                            <p><?php _e('Here, you\'ll find what the', 'stannah-whitelabel'); ?> <b><?php _e('press and other media', 'stannah-whitelabel'); ?></b> <?php _e('have said about us , plus stairlift news, what\'s happening at Stannah and other snippets of information. It\'s all here to keep you up to date with the world of Stannah stairlifts.', 'stannah-whitelabel'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="showme-form clearfix">
                    <div class="search-filters-wrapper row">
                        <div class="col-md-5 col-sm-12">
							<form class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

								<?php
								$args = array(
									/*'show_option_none' => __( 'Select category', 'stannah-whitelabel' ),*/
									'show_count'       => 0,
									'orderby'          => 'name',
									'echo'             => 0,
									'class'            => 'form-control',
									'id'               => 'showme'
								);
								?>

								<label for="showme"><?php _e('Show me: ', 'stannah-whitelabel'); ?></label>
								<?php $select  = wp_dropdown_categories( $args ); ?>
								<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
								<?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>

								<?php echo $select; ?>

								<noscript>
									<input type="submit" value="<?php _e('View', 'stannah-whitelabel'); ?>" />
								</noscript>

							</form>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <div class="form-inline">
                                <p><b><?php _e('SHOWING:', 'stannah-whitelabel'); ?> </b><?php _e('Items', 'stannah-whitelabel'); ?> <?php echo $pag_range; ?> <?php _e('of', 'stannah-whitelabel'); ?> <?php echo $total_posts; ?></p>
								<?php echo paginate_links($pag_args); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="search-results">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    	<?php $i++; ?>
	                    <?php $link = get_the_permalink(); ?>
	                    <div class="search-result section-div section-div-arrowdown <?php if($i%2 == 0) : ?>section-div-grey<?php else : ?> section-div-white<?php endif; ?> ">
	                        <div class="row">
	                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden-xs hidden-sm">
	                                <?php if (has_post_thumbnail()) : ?>
	                                	<?php the_post_thumbnail("medium"); ?>
	                                <?php endif; ?>
	                            </div>
	                            <div class="col-lg-7 col-md-7 col-sm-10 col-xs-9 result-content">
	                                <h4><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
	                                <p><?php the_excerpt(); ?></p>
	                                <a href="<?php echo $link; ?>" class="cta-mini-arrow"><?php _e('Read more', 'stannah-whitelabel'); ?></a>
	                            </div>
	                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 result-meta">
	                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icon-cal.png" alt="<?php _e('Calander icon:', 'stannah-whitelabel'); ?>" class="img-responsive" />
	                                <p class="date">
	                                	<?php the_date("\<\b\>M\</\b\> \<\b\\r \/\> Y"); ?>
	                                </p>
	                                <p class="categories">
	                                    <?php _e('Categories', 'stannah-whitelabel'); ?> <?php echo get_the_category_list( "," ); ?>
	                                </p>
	                            </div>
	                        </div>
	                    </div>
                    <?php endwhile; else : ?>
                        <h3><?php _e('We don\'t have anything for you right now. Come back soon.', 'stannah-whitelabel'); ?></h3> 
                    <?php endif; ?>
                </div>       



                <div class="search-footer-wrapper">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-5 col-sm-12">
                            <div class="form-inline">
								<?php echo paginate_links($pag_args); ?>
                                <p><b><?php _e('SHOWING:', 'stannah-whitelabel'); ?> </b><?php _e('Items', 'stannah-whitelabel'); ?> <?php echo $pag_range; ?> <?php _e('of', 'stannah-whitelabel'); ?> <?php echo $total_posts; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!--// News Results-->

<?php get_footer(); ?>
