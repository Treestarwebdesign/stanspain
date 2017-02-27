<?php
/**
 * Author(s): 3chillies, James Morris
 * The template for displaying the header
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon.ico">
    <?php if (get_the_title($post->ID )) : ?>
        <meta property="og:title" content="<?php _e(get_the_title( $post->ID), 'stannah-whitelabel'); ?>" />
    <?php endif; ?>
    <?php if (is_front_page()) : ?>
      <meta name="robots" content="index, follow, noodp">
    <?php endif; ?>
    <?php if (get_the_permalink($post->ID)) : ?>
        <meta property="og:url" content="<?php echo get_the_permalink($post->ID); ?>" />
    <?php endif; ?>
    <?php if (has_post_thumbnail($post->ID)) :
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>
        <meta property="og:image" content="<?php echo $url; ?>" />
    <?php endif; ?>

    <?php if (!is_front_page()) : ?>
        <title><?php _e(get_the_title($post->ID)); ?> - <?php _e('Stannah', 'stannah-whitelabel'); ?></title>
    <?php else : ?>
        <title><?php _e('Stannah', 'stannah-whitelabel'); ?> - <?php _e('The Stairlift People', 'stannah-whitelabel'); ?></title>
    <?php endif; ?>
    <meta name="google-site-verification" content="w0Vmz8BY3CkQHG3t5UvuUIaBp3RwsrNpPf-Jidr0rPQ" />
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <?php if(is_page_template( 'page-contact-us.php' )) : ?>
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/jquery-ui-datepicker.min.css" rel="stylesheet">
    <?php endif; ?>
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/styles.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/lightbox.css" rel="stylesheet">
    <script async type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if IE 9]>
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <?php the_field('head_code','options'); ?>

    <?php wp_head(); ?>
</head>
<?php
    $body_class = "";
    if (isset($_COOKIE['stannah-dealer-name']) && strpos(get_page_template_slug(), "page-dealer") >= 0 && !is_front_page()) {
        $body_class = "dealer-page";
    };
    //If product listing page
    if ( is_page_template( 'page-product-listing.php' ) ) {
        //Get user selection from the CMS
        $product_set = get_field('product_set');
        $body_class .= " product-set-".$product_set;
    }
?>
<body <?php body_class($body_class); ?>>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php the_field('tracking_id','options'); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php the_field('tracking_id','options'); ?>');</script>
    <!-- End Google Tag Manager -->
    <!-- Utils bar -->
    <?php get_sidebar( 'utils' ); ?>
    <!-- End utils bar -->
    <!-- Header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 header-logo">

                        <?php if (!is_front_page()) : ?>
                        <a href="/">
                        <?php endif; ?>
                            <span class="sr-only"><?php _e('Incisa powered by Stannah', 'stannah-whitelabel'); ?></span>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/stannah_incisa_home_web.jpg" alt="<?php _e('Incisa powered by Stannah', 'stannah-whitelabel'); ?>" />
                        <?php if (!is_front_page()) : ?>
                        </a>
                        <?php endif; ?>

				</div>
				<div class="col-sm-7 col-sm-offset-1">
					<div class="header-contact clearfix">
                        <div class="contact-phone">
							<span class="phone-message"><?php _e('Got a question? Phone FREE', 'stannah-whitelabel'); ?></span>
							<span class="extra-message"><?php _e('Friendly UK advisors available 24 hours a day', 'stannah-whitelabel'); ?></span>
                            <span class="num"><a href="tel:"><span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--/ Header -->

	<!-- Navigation -->

    <nav class="navbar yamm navbar-default main-menu" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-right navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation-bar" aria-expanded="false" aria-controls="navbar" role="navigation">
                    <span><?php _e('Menu', 'stannah-whitelabel'); ?></span>
                    <button type="button" class="hamburger">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="main-navigation-bar collapse navbar-collapse">
            <div class="container">
                <?php

                $defaults = array(
                    'menu'            => 'main-menu',
                    'menu_class'      => 'main-navigation',
                    'echo'            => false,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                );
                echo strip_tags(mark_active_menu_item( wp_nav_menu($defaults), "active")," <a>");
                ?>
            </div>
        </div>
    </nav>
	<!--/ Navigation -->
