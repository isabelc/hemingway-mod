<?php
/*
Template Name: Full width template
*/
?>

<?php get_header(); ?>

<div class="wrapper section-inner">						

	<div class="content full-width">
	
		<?php if (have_posts()) : while (have_posts()) : the_post();

		$is_gallery_page = che_is_gallery_page();
		?>
		<div class="posts">
			<div class="post">
			
				<?php
				// do not show featured image on gallery pages.
				if ( ! $is_gallery_page ) {
					if ( has_post_thumbnail() ) : ?>
						
						<div class="featured-media">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							
								<?php the_post_thumbnail('post-image'); ?>
								
								<?php if ( !empty(get_post(get_post_thumbnail_id())->post_excerpt) ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
										
									</div>
									
								<?php endif; ?>
								
							</a>
									
						</div> <!-- /featured-media -->
					<?php endif;
				} else {

					// show breadcrumb on gallery pages
					che_breadcrumbs();
				} ?>
												
				<div class="post-header">
											
				    <h1 class="post-title"><?php the_title(); ?></h1>
				    				    
			    </div> <!-- /post-header -->
			   				        			        		                
				<div class="post-content">
							                                        
					<?php the_content(); ?>
		            
		            <?php if ( current_user_can( 'manage_options' ) ) : ?>
																	
						<p><?php edit_post_link( __('Edit', 'hemingway') ); ?></p>
					
					<?php endif; ?>
					
					<div class="clear"></div>
														            			                        
				</div> <!-- /post-content -->

<?php // add share buttons to gallery pages
if ( $is_gallery_page ) {
	?><div class="clear"></div>
	<div class="post-meta-bottom">
	<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" class="simple-share ss-gplus" title="Share on G+">G+ Share</a>
	<a target="_blank" href="https://twitter.com/share?text=<?php the_title_attribute(); ?>" class="simple-share ss-twitter" title="Tweet">Tweet</a>
	<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="simple-share ss-facebook" title="Share on Facebook">Share</a>
	<br /><br />
	</div>
<?php } ?>

			</div> <!-- /post -->
			
			<?php if ( comments_open() ) : ?>
			
				<?php comments_template( '', true ); ?>
			
			<?php endif; ?>
		
		</div> <!-- /posts -->
		
		<?php endwhile; else: ?>

			<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hemingway"); ?></p>
	
		<?php endif; ?>
	
	</div> <!-- /content -->
	
</div> <!-- /wrapper section-inner -->
								
<?php get_footer(); ?>