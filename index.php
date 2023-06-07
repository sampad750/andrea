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
								<ul>
									<li><a href="#">&lt;</a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
					<?php get_sidebar(); ?>
				</div><!-- END COL -->
			</div>
		</div>
	</section>
</div><!-- END COLORLIB-MAIN -->

<?php
get_footer();

?>