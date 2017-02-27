	<!-- Why choose Stannah -->
	<?php if( have_rows('reasons') ): ?>
		<div class="div-grey-shadow text-center">  
			<span></span>  
	        <div class="container">
	            <div class="row"> 
	                <div class="col-sm-12">
	                    <h2><?php _e('Why choose <b><span class="brand">Stannah</span></b>...','stannah-whitelabel'); ?></h2>
						<p class="lead"><?php the_field('introduction'); ?></p>
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