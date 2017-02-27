<?php
/**
 *
 * Template Name: Warrenty page
 * A special form page
 */

if (isset($_POST['submitted'])) {
    build_email_message($_POST);
    $form_submitted = $_POST['submitted'];
}

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

    <!-- Warrenty form -->
    <div class="div-white div-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <h1><b><?php the_title(); ?></b></h1>
                    <div class="the-content">
                        <?php if (have_posts()) : while (have_posts()) : the_post();?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>   
                    <?php if (!$form_submitted == "Warranty Registration" ) : ?>
                        <form action="<?php the_permalink(); ?>" method="post">
                            <div class="row text-left">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="warrantyName" class="text-uppercase"><?php _e('Your Full Name*','stannah-whitelabel'); ?></label>
                                        <input type="text" name="warranty-<?php _e('Name','stannah-whitelabel'); ?>" class="form-control" id="warrantyName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="warrantyStairliftInstallAddress" class="text-uppercase"><?php _e('Address of stairlift installation*','stannah-whitelabel'); ?></label>
                                        <textarea id="warranty-<?php _e('Address','stannah-whitelabel'); ?>" class="form-control" name="warranty-stairliftInstallAddress"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="warrantyTel" class="text-uppercase"><?php _e('Your phone number*','stannah-whitelabel'); ?></label>
                                        <input type="tel" name="warranty-<?php _e('Tel','stannah-whitelabel'); ?>" class="form-control" id="warrantyTel" required>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="warrantyEmail" class="text-uppercase"><?php _e('Your email address','stannah-whitelabel'); ?></label>
                                        <input type="email" name="warranty-<?php _e('Email','stannah-whitelabel'); ?>" class="form-control" id="warrantyEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="warrantyInstallDate" class="text-uppercase"><?php _e('Date of Stairlift installation*','stannah-whitelabel'); ?></label>
                                        <input type="date" name="warranty-<?php _e('installDate','stannah-whitelabel'); ?>" class="form-control form-date" id="warrantyInstallDate" placeholder="MM/DD/YYYY" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="warrantySerialNum" class="text-uppercase"><?php _e('Carridge serial number*','stannah-whitelabel'); ?></label>
                                        <p class="help-text"><?php _e('Avaliable from your installer. Serial number beings with "U".','stannah-whitelabel'); ?></p>
                                        <input type="text" name="warranty-<?php _e('SerialNumber','stannah-whitelabel'); ?>" class="form-control" id="warrantySerialNum" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="warrantyDealerName" class="text-uppercase"><?php _e('Your Stannah stairlift dealer*','stannah-whitelabel'); ?></label>
                                        <input type="text" name="warranty-<?php _e('DealerName','stannah-whitelabel'); ?>" class="form-control" id="warrantyDealerName" required>
                                    </div>
                                </div>   
                            </div>
                            <div class="cta">
                                <button class="cta-red cta-plain" type="submit" name="submitted" value="<?php _e('Warranty Registration','stannah-whitelabel'); ?>"><span><?php _e('Send','stannah-whitelabel')?></span></a>
                            </div>
                        </form>
                    <?php else : ?>
                        <h3><?php _e('Thank you','stannah-whitelabel'); ?></h3> 
                        <p><?php _e('Your warranty form will now be processed.','stannah-whitelabel'); ?></p>
                    <?php endif; ?>                                     
                </div>
            </div>
        </div>
    </div>
                    

<?php get_footer(); ?>
