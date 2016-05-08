<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>

<!-- Wrapper start -->
	<div class="main">

		<!-- Post single start -->
		<section class="page-module-content module">
			<div class="container">

				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-12">

					<?php while ( have_posts() ) : the_post(); ?>

					<?php endwhile; // end of the loop. ?>
						<?php the_title( '<h3>', '</h3>' ); ?>
						
							<?php $image = get_field('lines_photo'); if( !empty($image) ): ?>
							<div class="photo">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
							<?php endif; ?>
						
						<div class="video">
							<?php the_field('lines_video'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Content column end -->

					<!-- Sidebar column start -->
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-1 sidebar">
						<span class="author">
							<?php the_author(); ?>
						</span>
						<span class="date">
						<?php the_date(); ?>
						</span>
						<div class="quote">
							<?php the_field('lines_quote'); ?>
							<?php the_field('quote_author'); ?>
						</div>

					</div>
					<!-- Sidebar column end -->
					<div class="body-content col-sm-12">
						<?php
							$content = get_the_content('Read more');
							print $content;
						?>
					</div>
					<div class="bio col-sm-12">
						<?php $author = get_the_author(); ?>
						<?php 
						    if ( function_exists( 'get_Sexy_Author_Bio' ) ) {
						        echo get_Sexy_Author_Bio();
						    }
						?>
					</div>
				</div><!-- .row -->

			</div>
		</section>
		<!-- Post single end -->
		

<?php get_footer(); ?>