<?php
/**
 * Template Name: Portfolio Page
 *
 *
 * @package Betelnut
 */

get_header(); ?>

<div id="primary" class="site-content cf" role="main">

	<div class="front-two-wrap cf">

			<?php
				if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;

				$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '10' );
				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'posts_per_page' => $posts_per_page,
					'paged'          => $paged,
				);
				$project_query = new WP_Query( $args );
				if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :
			?>
			
				<div class="portfolio-wrapper">

					<?php /* Start the Loop */ ?>
					<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>

						
						<div id="img-container-one" class="img-container">
						
									<a href="<?php the_permalink(); ?>" class="fp-img-link">
										<?php the_post_thumbnail('thumbnail'); ?>
									</a>
								
									<div id="front-two-slogan-one" class="front-two-slogan">
										<?php the_title(); ?>
									</div><!-- end #front-two-slogan-one -->
									
						</div><!-- end #img-container-->
						

					<?php endwhile; ?>

				</div><!-- .portfolio-wrapper -->

				<?php
					// blask_paging_nav( $project_query->max_num_pages );
					wp_reset_postdata();
				?>

			<?php else : ?>

				<section class="no-results not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'blask' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<?php if ( current_user_can( 'publish_posts' ) ) : ?>

							<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'blask' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

						<?php else : ?>

							<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'blask' ); ?></p>
							<?php get_search_form(); ?>

						<?php endif; ?>
					</div><!-- .page-content -->
				</section><!-- .no-results -->

			<?php endif; ?>

	</div><!-- end .front-two-wrap -->
</div><!-- end #primary -->


<?php get_footer(); ?>