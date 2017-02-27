<div class="ai1wm-field-set">
	<ul class="ai1wmme-sites-list">
		<li>
			<input type="checkbox" name="options[sites][]" value="network" id="ai1wmme-site-network" class="ai1wmme-sites" checked="checked" disabled="disabled" />
			<label for="ai1wmme-site-network"><?php _e( 'Network (all sites)', AI1WMME_PLUGIN_NAME ); ?></label>
		</li>

		<?php foreach ( $sites as $site ): ?>
			<li>
				<input type="checkbox" name="options[sites][]" value="<?php echo $site['blog_id']; ?>" id="ai1wmme-site-<?php echo $site['blog_id']; ?>" class="ai1wmme-sites" disabled="disabled" />
				<label for="ai1wmme-site-<?php echo $site['blog_id']; ?>">
					<?php echo $site['domain'] . $site['path']; ?>
				</label>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
