<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header(); ?>

	    <div class="container page-404">
            <div class="row"> 
                <div class="col-sm-6">
					<h1 class="page-title"><?php _e( '404!' , 'stannah-us' ); ?></h1>
					<h2> <?php _e( 'That page can&rsquo;t be found.', 'stannah-whitelabel' ); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<p><?php _e( 'It looks like nothing was found at this location. Perhaps try the links at the top of page.', 'stannah-whitelabel' ); ?></p>
				</div>
			</div>
		</div>


<?php get_footer(); ?>
