<?php
/**
 * The template for displaying the footer
 *
 */
?>

    <!-- Footer -->
    <footer class="footer v3-2">
        <!-- Grey nav -->
        <nav class="footer-nav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="http://www.stannah.es/category/recursos" target="_self">RECURSOS</a></li>
                            <?php if (get_field('sitemap', 'option')) : ?><li><a href="<?php the_field('sitemap', 'option'); ?>"><?php _e('Site map', 'stannah-whitelabel'); ?></a></li><?php endif; ?>
                            <?php if (get_field('privacy_and_terms', 'option')) : ?><li><a href="<?php the_field('privacy_and_terms', 'option'); ?>"><?php _e('Privacy &amp; T&C\'s', 'stannah-whitelabel'); ?></a></li><?php endif; ?>
                            <?php if (get_field('contact_us_footer', 'option')) : ?><li><a href="<?php the_field('contact_us_footer', 'option'); ?>"><?php _e('Contact us', 'stannah-whitelabel'); ?></a></li><?php endif; ?>
                            <?php if (get_field('facebook_page', 'option')) : ?><li><a class="f-icon facebook" href="<?php the_field('facebook_page', 'option'); ?>"><?php _e('Facebook', 'stannah-whitelabel'); ?></a></li><?php endif; ?>
                            <?php if (get_field('youtube_page', 'option')) : ?><li><a class="f-icon youtube" href="<?php the_field('youtube_page', 'option'); ?>"><?php _e('Youtube', 'stannah-whitelabel'); ?></a></li><?php endif; ?>
                            <?php if (get_field('google_page', 'option')) : ?><li><a class="f-icon google" href="<?php the_field('google_page', 'option'); ?>"><?php _e('Google+', 'stannah-whitelabel'); ?></a></li><?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!--/ Grey nav -->
        <div class="container">
            <div class="footer-main row">
                <div class="col-sm-3">
                    <div class="footer-col">
                            <p class="titlefooter"><?php _e('Contact details', 'stannah-whitelabel'); ?></p>
                            <div class="info-box clearfix">
                                <address>
                                    <?php the_field('contact_address', 'option'); ?>
                                </address>
                                <p><b>Tel:</b> <span class="InfinityNumber"><?php include 'includes/stannah-phone-num.php'; ?></span></p>
                                <a class="more-dealer-info" href="<?php the_field('contact_us','option'); ?>"><?php _e('More ways to contact us','stannah-whitelabel'); ?></a>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-3">
                    <div class="footer-col">
                        <p class="titlefooter"><?php _e('A stairlift in 3 simple steps', 'stannah-whitelabel'); ?></p>
                        <ol>
                            <li><?php _e('Call our friendly advisors to discuss your options', 'stannah-whitelabel'); ?></li>
                            <li><?php _e('Book a no-obligation FREE assessment of your stairs', 'stannah-whitelabel'); ?></li>
                            <li><?php _e('Quickly installed by trained and accredited technicians', 'stannah-whitelabel'); ?></li>
                        </ol>
                    </div>
                    <a href="<?php the_field('simple_steps_page','options') ?>/"><?php _e('Learn more about the steps', 'stannah-whitelabel'); ?></a>
                </div>
                <div class="col-sm-3">
                    <div class="footer-col">
                        <p class="titlefooter"><?php _e('Why choose Stannah?', 'stannah-whitelabel'); ?></p>
                        <ul>
                            <li><?php _e('Experienced local representatives and installers to serve your needs', 'stannah-whitelabel'); ?></li>
                            <li><?php _e('Experienced local representatives &amp; installers', 'stannah-whitelabel'); ?></li>
                            <li><?php _e('Safety features included as standard, and sensible options to meet your needs', 'stannah-whitelabel'); ?></li>
                            <li><?php _e('Excellent warranty', 'stannah-whitelabel'); ?></li>
                        </ul>
                    </div>
                    <a href="<?php the_field('about_page','option'); ?>"><?php _e('Learn more about Stannah','stannah-whitelabel'); ?></a>
                </div>
                <div class="col-sm-3">
                    <div class="footer-col">
                        <p class="titlefooter"><?php _e('International Stannah sites:','stannah-whitelabel'); ?></p>
                        <select class="chosen-select" data-placeholder="<?php _e('...Choose Country','stannah-whitelabel'); ?>">
                            <option value=""><?php _e('Choose Country','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannahstairlifts.co.uk/"><?php _e('United Kingdom','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.com.ar/"><?php _e('Argentina','stannah-whitelabel'); ?></option>
                            <option value="http://www.prking.com.au/"><?php _e('Austrailia - NSW','stannah-whitelabel'); ?></option>
                            <option value="http://www.prking.com.au/"><?php _e('Austrailia - Queensland','stannah-whitelabel'); ?></option>
                            <option value="http://www.prking.com.au/"><?php _e('Austrailia - Victoria','stannah-whitelabel'); ?></option>
                            <option value="http://www.blueskymobility.com.au/"><?php _e('Austrailia - Southern','stannah-whitelabel'); ?></option>
                            <option value="http://www.blueskyhealthcare.com.au/"><?php _e('Austrailia - Western','stannah-whitelabel'); ?></option>
                            <option value="http://www.weigl.at/"><?php _e('Austria','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.com.cn/"><?php _e('Beijing','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.be/"><?php _e('Belgium','stannah-whitelabel'); ?></option>
                            <option value="http://www.surimex.com.br/"><?php _e('Brazil','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.com/"><?php _e('Channel Islands','stannah-whitelabel'); ?></option>
                            <option value="http://www.salvaescaleras.cl/"><?php _e('Chile','stannah-whitelabel'); ?></option>
                            <option value="http://www.simecingenieros.com"><?php _e('Colombia','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.com.cy"><?php _e('Cyprus','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.cz/"><?php _e('Czech Republic','stannah-whitelabel'); ?></option>
                            <option value="http://www.botved.dk/"><?php _e('Denmark','stannah-whitelabel'); ?></option>
                            <option value="http://www.oriola.fi/"><?php _e('Finland','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.fr/"><?php _e('France','stannah-whitelabel'); ?></option>
                            <option value="https://www.lifta.de/"><?php _e('Germany','stannah-whitelabel'); ?></option>
                            <option value="http://www.draculis.gr/GRE/01_Home.asp"><?php _e('Greece','stannah-whitelabel'); ?></option>
                            <option value="http://stannahtrapliften.nl/"><?php _e('Holland','stannah-whitelabel'); ?></option>
                            <option value="http://www.chunming.com/"><?php _e('Hong Kong','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.hu/"><?php _e('Hungary','stannah-whitelabel'); ?></option>
                            <option value="http://www.taamal.co.il/"><?php _e('Israel','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.it/"><?php _e('Italy','stannah-whitelabel'); ?></option>
                            <option value="https://www.steplift.jp/"><?php _e('Japan','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.lu/"><?php _e('Luxemburg','stannah-whitelabel'); ?></option>
                            <option value="http://www.liftserv.com/"><?php _e('Malta','stannah-whitelabel'); ?></option>
                            <option value="https://solucionesaccesibilidad.squarespace.com/"><?php _e('Mexico (South/central)','stannah-whitelabel'); ?></option>
                            <option value="http://www.desin.com.mx/"><?php _e('Mexico (North)','stannah-whitelabel'); ?></option>
                            <option value="http://www.independence.co.nz/"><?php _e('New Zealand','stannah-whitelabel'); ?></option>
                            <option value="http://www.olympiclifts.co.uk/"><?php _e('Northern Ireland','stannah-whitelabel'); ?></option>
                            <option value="http://www.accessvital.no/"><?php _e('Norway','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.pt/"><?php _e('Portugal','stannah-whitelabel'); ?></option>
                            <option value="http://www.arian.com.sg/"><?php _e('Singapore','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.sk/"><?php _e('Slovakia','stannah-whitelabel'); ?></option>
                            <option value="http://www.lifta.co.za/"><?php _e('South Africa','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.es/"><?php _e('Spain','stannah-whitelabel'); ?></option>
                            <option value="http://www.kalealifts.com/sv/"><?php _e('Sweden','stannah-whitelabel'); ?></option>
                            <option value="http://www.herag.ch/de/"><?php _e('Switzerland','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.tw/"><?php _e('Taiwan','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah-thailand.com/"><?php _e('Thailand','stannah-whitelabel'); ?></option>
                            <option value="http://www.erimas.com/"><?php _e('Turkey','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannah.ae"><?php _e('UAE','stannah-whitelabel'); ?></option>
                            <option value="http://www.stannahstairlifts.com/"><?php _e('USA and Canada','stannah-whitelabel'); ?></option>
                        </select>
                        <a href="http://www.stannah.com" class="brand corp-site"><?php _e('Stannah.com','stannah-whitelabel'); ?></a>
                        <!--<div class="accreditation-container">
                            Accreditations and associations.
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Social -->
            <div class="footer-social text-center row">
                <p><?php _e('©Stannah Stairlifts Inc. 2015. All rights reserved.','stannah-whitelabel'); ?></p>
            </div>
            <!--/ Social -->
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/lib/jquery-1.11.1.min.js"><\/script>')</script>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/lib/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/plugins.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/lightbox.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/popup.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.cookie.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/custom.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/lib/harvey.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/media-queries.js"></script>
    <?php if(is_page_template( 'page-contact-us.php' )) : ?>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-ui-datepicker.min.js"></script>
    <?php endif; ?>
    <?php wp_footer(); ?>
</body>
</html>
