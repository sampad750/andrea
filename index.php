<?php
get_header(); ?>

<div id="colorlib-main">
	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row d-flex">
				<div class="col-xl-8 py-5 px-md-5">
					<div class="row pt-md-4">
						<?php
						if (have_posts()) { ?>
							<div class="col-md-12">
								<?php
								while (have_posts()) {
									the_post();
									get_template_part('template-parts/post/content');
								}
								?>
							</div>
						<?php
						} else {
							get_template_part('template-parts/post/content-none');
						} ?>

					</div><!-- END-->
					<div class="row">
						<div class="col">
							<div class="block-27">
								<?php
								the_posts_pagination( array(
									'mid_size'  => -1,
									'prev_text' => __( '&lt;', 'andrea' ),
									'next_text' => __( '&gt;', 'andrea' ),
								) );
								?>
							</div>
						</div>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
</div><!-- END COLORLIB-MAIN -->

<?php
get_footer();

?>