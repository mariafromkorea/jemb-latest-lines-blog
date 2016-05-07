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
					<div class="col-sm-8">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							
							do_action( 'shop_isle_single_post_before' );

							get_template_part( 'content', 'single' );

							/**
							 * @hooked shop_isle_post_nav - 10
							 */
							do_action( 'shop_isle_single_post_after' );
							?>

						<?php endwhile; // end of the loop. ?>
						<div class="photo">
							<?php 

							$image = get_field('lines_photo');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>
						</div>
						<div class="video">
							<?php the_field('lines_video'); ?>
						</div>
						<div class="quote">
							<?php the_field('lines_quote'); ?>
							<?php the_field('quote_author'); ?>
						</div>
					</div>
					<!-- Content column end -->

					<!-- Sidebar column start -->
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-1 sidebar">

						<?php do_action( 'shop_isle_sidebar' ); ?>

					</div>
					<!-- Sidebar column end -->

				</div><!-- .row -->

			</div>
		</section>
		<!-- Post single end -->
		

<?php get_footer(); ?>