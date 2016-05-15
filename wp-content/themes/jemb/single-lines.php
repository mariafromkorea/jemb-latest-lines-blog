<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>

<!-- Wrapper start -->
	<div class="main">
		<div class="latest-lines-post">
		<!-- Post single start -->
			<div class="lines-container">

				<div class="row wider">

					<!-- Content column start -->
					<div class="col-sm-12">

						<?php while ( have_posts() ) : the_post(); ?>

						<?php endwhile; // end of the loop. ?>
						<div class="lines-title">
							<?php the_title( '<h1>', '</h1>' ); ?>
						</div>
						
						<div class="photo-wrapper">
						<?php $image = get_field('lines_photo'); if( !empty($image) ): ?>
						<div class="photo">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

						</div>
						<?php endif; ?>
						<div class="profile-img">
								<?php
							//Assuming $post is in scope
							if (function_exists ( 'mt_profile_img' ) ) {
							    $author_id=$post->post_author;
							    mt_profile_img( $author_id, array(
							        'size' => 'thumbnail',
							        'attr' => array( 'alt' => 'Alternative Text' ),
							        'echo' => true )
							    );
							}
						?>
							</div>

							<div class="name-block">
								<span class="author">
									<?php the_author(); ?>
								</span>
								<span class="date">
									<?php the_date(); ?>
								</span>
							</div>
						</div>
						<div class="profile">
							<div class="row">
								<a id="bio-toggle" onclick="document.getElementById('bio').classList.toggle('show-bio');">More Info</a>
							<div class="social">
								<a href="<?php echo get_the_author_meta( 'sabfacebook' );?>" target="_blank" class="facebook">facebook</a>
								<a href="<?php echo get_the_author_meta( 'sabinstagram' );?>" target="_blank" class="instagram">instagram</a>
							</div>
						</div>
						<div class="row">
							<div class="bio" id="bio">
								<div>
    							<?php echo get_the_author_meta('description'); ?>
    						</div>
							</div>
						</div>
						</div>

						<div class="row lines-content">
							<div class="col-sm-12">
								<div class="video">
									<?php the_field('lines_video'); ?>
								</div>

								<div class="quote">
									<h3>Quote of the Day</h3>
									<span class="quote-text"><?php the_field('lines_quote'); ?></span>
									<span class="quote-author"><?php the_field('quote_author'); ?></span>
								</div>
								<div class="body-content">
									<?php
										$content = get_the_content('Read more');
										print $content;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Content column end -->

					<!-- Sidebar column end -->
					
					
				</div><!-- .row -->
			</div>
			</div>
		<!-- Post single end -->
		

<?php get_footer(); ?>