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
						<div class="lines-subtitle">
							<span class="author">
								<?php the_author(); ?>
							</span>
							<span class="date">
							<?php the_date(); ?>
							</span>
						</div>
						
						<?php $image = get_field('lines_photo'); if( !empty($image) ): ?>
						<div class="photo">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>
						<?php endif; ?>

						<div class="row">
							<div class="col-sm-12">
								<div class="video">
									<?php the_field('lines_video'); ?>
								</div>

								<div class="quote">
									<h3>Quote of the Day</h3>
									<span class="quote-text"><?php the_field('lines_quote'); ?></span>
									<span class="quote-author"><?php the_field('quote_author'); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Content column end -->

					<!-- Sidebar column end -->
					<div class="body-content">
						<?php
							$content = get_the_content('Read more');
							print $content;
						?>
					</div>
					<div class="bio col-sm-12">
						<?php $author = get_the_author(); ?>
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
						<?php 
						    if ( function_exists( 'get_Sexy_Author_Bio' ) ) {
						        echo get_Sexy_Author_Bio();
						    }
						?>
					</div>
				</div><!-- .row -->
			</div>
			</div>
		<!-- Post single end -->
		

<?php get_footer(); ?>