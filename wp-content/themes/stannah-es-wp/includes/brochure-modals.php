<?php if($brochure) : ?>
    <div class="container">
        <div id="address-step" class="in-content-modal">
            <div class="close-btn" title="<?php _e('Ok, got it. Close','stannah-whitelabel'); ?>">&times;</div>
            <div class="row">
                <div class="download col-sm-6">
                    <?php $file = get_field('brochure_pdf_file'); ?>
                    <?php if ($file) : ?>
                        <a class="brochure-image" href="<?php echo $file ?>" target="_blank">
                    <?php endif; ?>
                        <?php $brochure_image = get_field('brochure_cover_image'); ?>
                        <?php if ($brochure_image) : ?>
                            <img src="<?php echo $brochure_image; ?>" alt="<?php _e('Brochure','stannah-whitelabel'); ?>">
                        <?php endif; ?>
                    <?php if ($file) : ?>
                        </a>
                    <?php endif; ?>
                    <div class="details">
                        <h3><?php _e('Download','stannah-whitelabel'); ?></h3>
                        <p><?php _e('Please find your PDF download below.','stannah-whitelabel'); ?></p>
                        <?php if ($file) : ?>
                            <a class="cta-red cta-arrow" href="<?php echo $file ?>" target="_blank"><span><?php _e('Download','stannah-whitelabel'); ?></span></a>
                            <div class="small-text"><?php _e('Size: less than 3mb - PDF format','stannah-whitelabel'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="or-message"><?php _e('Or','stannah-whitelabel'); ?></div>
                </div>
                <div class="address-form col-sm-6">
                    <div class="address-wrapper">
                        <h3><?php _e('Mail me a copy','stannah-whitelabel'); ?></h3>
                        <p><?php _e('Fill in your address and we\'ll mail you a copy','stannah-whitelabel'); ?></p>
                        <?php 
                            //Translated form attributes
                            $attr_name = _x('Name', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                            $attr_brochure = _x('brochure', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                            $attr_zip = _x('ZIP', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                            $attr_email = _x( 'Email', 'Multiple words should be hyphenated in just this case', 'stannah-whitelabel') ;
                            $attr_tel = _x('Telephone', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                            $attr_product = _x('Product', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                            $attr_address = _x('Address', 'Multiple words should be hyphenated just in this case', 'stannah-whitelabel');
                        ?>                        
                        <form action="<?php the_permalink(); ?>?proccess=brochure_mailed" method="post">
                            <div class="form-group-name">
                                <input type="hidden" name="<?php echo $attr_brochure; ?>-<?php echo $attr_name; ?>" class="form-control" id="brochureName" value="<?php echo $_POST[$attr_brochure.'-'.$attr_name]; ?>">
                                <input type="hidden" name="<?php echo $attr_brochure; ?>-<?php echo $attr_product; ?>" class="form-control" id="brochureName" value="<?php the_title(); ?>">
                            </div>                           
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="hidden" name="<?php echo $attr_brochure; ?>-<?php echo $attr_email; ?>" class="form-control" id="brochureEmail" value="<?php echo $_POST[$attr_brochure.'-'.$attr_email]; ?>" required>
                                </div>                                
                                <div class="col-sm-6">
                                    <div class="form-group-tel">
                                        <input type="hidden" name="<?php echo $attr_brochure; ?>-<?php echo $attr_tel; ?>" class="form-control" value="<?php echo $_POST[$attr_brochure.'-'.$attr_tel]; ?>" id="brochureTel">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group form-group-address">
                                        <label for="brochureAddress"><?php _e('Your address','stannah-whitelabel'); ?></label>
                                        <textarea id="brochureAddress" class="form-control" name="<?php echo $attr_brochure; ?>-<?php echo $attr_address; ?>" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-zip">
                                <label for="brochureZip"><?php _e('Your zip code','stannah-whitelabel'); ?></label>
                                <input type="text" name="<?php echo $attr_brochure; ?>-<?php echo $attr_zip; ?>" class="form-control" id="brochureZip" value="<?php echo $_POST[$attr_brochure.'-'.$attr_zip]; ?>">
                            </div>
                            <div class="cta">
                                <button class="cta-red cta-arrow" type="submit" name="submitted" value="<?php _e('Post Brochure request from:','stannah-whitelabel');?> <?php echo $_POST[$attr_brochure.'-'.$attr_name]; ?>"><span><?php _e('Mail my Brochure','stannah-whitelabel'); ?></span></button>
                            </div>
                        </form> 
                    </div>           
                </div>
            </div>        
        </div>
    </div>
    <?php endif; ?>
    <?php if($post_brochure) : ?>
    <div class="container">
        <div class="row">
            <div id="final-thank-you" class="in-content-modal col-sm-6">
                <div class="close-btn" title="<?php _e('Ok, got it. Close','stannah-whitelabel'); ?>">&times;</div>
                <h3><?php _e('Thank you','stannah-whitelabel'); ?></h3>
                <p><?php _e('Your brochure is in the mail and will be with you soon.','stannah-whitelabel'); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>