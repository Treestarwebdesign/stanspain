    <?php //HOMEPAGE PRODUCT LIST

        $posts = get_field('product_listing_2');

    ?>

    <? if( $posts ): ?>
        <div class="div-mid-grey-shadow text-center">
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="h2-sml"><?php the_field('product_listing_title_2'); ?></h2>
                        <!-- Newest stairlifts -->
                        <div class="spotlight-three">
                            <?php if (get_field('product_listing_sub_title_2')) : ?>
                                <h3 class="round-5"><?php the_field('product_listing_sub_title_2'); ?></h3>
                            <?php endif; ?>
                            <div class="row">
                                <!-- Starlift -->
                                <?php foreach( $posts as $post): ?>
                                    <?php setup_postdata($post); ?>
                                    <div class="col-sm-4">
                                        <div class="spotlight-item">
                                            <?php //NOTE: All products must links to the product listing page. ?>
                                            <a href="<?php the_field('product_button_link_2'); ?>">
                                                <div class="spotlight-title">
                                                    <h3><?php the_title(); ?></h3>
                                                </div>
                                                <div class="spotlight-content">
                                                    <?php
                                                        $rows = get_field('listing_images' ); // get all the rows
                                                        $first_row = $rows[0]; // get the first row
                                                        $first_row_image = $first_row['product_image']; // get the sub field value
                                                    ?>
                                                    <img src="<?php echo $first_row_image['url']; ?>" alt="<?php echo $first_row_image['alt']; ?>" />

                                                    <div class="spotlight-details">
                                                        <?php the_field('product_listing_blurb'); ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Starlift end -->
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            </div>
                        </div>
                        <!--/ Newest stairlifts -->
                        <a class="cta-red cta-arrow" href="<?php the_field('product_button_link_2'); ?>"><span><?php the_field('product_button_text_2'); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
