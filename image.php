<?php get_header(); ?>
<div class="wrapper section-inner">
<div class="content full-width">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="posts">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php che_breadcrumbs(); ?>
				<div class="content-inner">
					<div class="featured-media">
						<?php $imageArray = wp_get_attachment_image_src($post->ID, 'full', false); ?>
						
							<a href="<?php echo esc_url( $imageArray[0] ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
								<?php echo wp_get_attachment_image( $post->ID, 'post-image' ); ?></a>
						
						</div> <!-- /featured-media -->
						
						<div class="post-header">
							<h1 class="post-title"><?php echo $post->post_title; ?></h1>
							<div class="post-meta">See full size image: 
							
							<span><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="see full size"><?php echo $imageArray[1] // 1 is the width ?> <span style="text-transform:lowercase;">x</span> <?php echo $imageArray[2] . ' px'; // 2 is the height ?></a></span>
							
							</div>
						
						</div> <!-- /post-header -->
		
						<?php if ( ! empty( $post->post_excerpt ) ) : ?>
						
							<div class="post-content">
							
								<?php the_excerpt(); ?>
	<p>Originally posted in: <a href="<?php echo esc_url( get_permalink($post->post_parent) ); ?>"><?php echo esc_html( get_the_title($post->post_parent) ); ?></a></p>

							</div> <!-- /post-content -->
							
						<?php endif; ?>
												
					</div> <!-- /content-inner -->
					
					<div class="post-meta-bottom">
									
						<div class="post-nav">
						
							<?php
		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
		 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
		 */
		$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
		foreach ( $attachments as $k => $attachment ) :
			if ( $attachment->ID == $post->ID )
				break;
		endforeach;
		$l = ($k > 0) ? ( $k - 1 ) : 0;// @isa
		$k++;
		
		if ( isset( $attachments[ $k ] ) ) :
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
			$prev_attachment_url = get_attachment_link( $attachments[ $l ]->ID );
		else :
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
		endif;


		if ( ! empty( $prev_attachment_url ) ) { ?>
			<a href="<?php echo esc_url( $prev_attachment_url ); ?>" class="post-nav-older" rel="attachment">&laquo; Previous<span> image</span></a>
		<?php 
		} 
		if ( ! empty( $next_attachment_url ) ) { ?>
			<a href="<?php echo esc_url( $next_attachment_url ); ?>" class="post-nav-newer" rel="attachment">Next<span> image</span> &raquo;</a>
		<?php } ?>
		<div class="clear"></div>
	</div> <!-- /post-nav -->
					
	
					</div> <!-- /post-meta-bottom -->

<div class="post-meta-bottom"><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" class="simple-share ss-gplus" title="Share on G+">G+ Share</a>
	<a target="_blank" href="https://twitter.com/share?text=<?php the_title_attribute(); ?>" class="simple-share ss-twitter" title="Tweet">Tweet</a>
	<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="simple-share ss-facebook" title="Share on Facebook">Share</a><div class="post-meta-bottom">

						
					<?php comments_template( '', true ); ?>
																                        
			   	<?php endwhile; else: ?>
			
					<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hemingway"); ?></p>
				
				<?php endif; ?>    
					
			</div> <!-- /post -->
			
		</div> <!-- /posts -->
		
	</div> <!-- /content -->
	
	<?php get_sidebar(); ?>
	
	<div class="clear"></div>

</div> <!-- /wrapper section-inner -->
		
<?php get_footer(); ?>