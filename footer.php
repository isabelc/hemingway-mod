	<div class="footer section large-padding bg-dark">
		
		<div class="footer-inner section-inner">
		
			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
			
				<div class="column column-1 left">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-a' ); ?>
											
					</div>
					
				</div>
				
			<?php endif; ?> <!-- /footer-a -->
				
			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
			
				<div class="column column-2 left">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-b' ); ?>
											
					</div> <!-- /widgets -->
					
				</div>
				
			<?php endif; ?> <!-- /footer-b -->
								
			<?php if ( is_active_sidebar( 'footer-c' ) ) : ?>
			
				<div class="column column-3 left">
			
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-c' ); ?>
											
					</div> <!-- /widgets -->
					
				</div>
				
			<?php endif; ?> <!-- /footer-c -->
			
			<div class="clear"></div>
		
		</div> <!-- /footer-inner -->
	
	</div> <!-- /footer -->
	
	<div class="credits section bg-dark no-padding">
	
		<div class="credits-inner section-inner">
	
			<p class="credits-left">
				&copy; Copyright <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. All rights reserved. Pictures on chemacastillo.com are protected by copyright law. For permission to use a picture, post a comment on the picture page.</p>
			
			<p class="credits-right">&mdash; <a title="Go to the top" class="tothetop">Up &uarr;</a>
			</p>
			
			<div class="clear"></div>
		
		</div> <!-- /credits-inner -->
		
	</div> <!-- /credits -->

</div> <!-- /big-wrapper -->

<?php wp_footer(); ?>

</body>
</html>