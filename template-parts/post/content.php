<div class="blog-entry d-md-flex"> <!-- "ftco-animate" use this class not showing this section-->
	<a href="<?php the_permalink() ?>">
		<?php the_post_thumbnail( 'thumbnail', array('class'=>'img img-2') )?>
	</a>
	<div class="text text-2 pl-md-4">
		<h3 class="mb-2"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
		<div class="meta-wrap">
			<p class="meta">
				<span><i class="icon-calendar mr-2"></i><?php the_time( 'M j, Y' ); ?></span>
				<span>
					<?php
						foreach((get_the_category()) as $category) {
							$postcat= $category->cat_ID;
							$post_cat_link = get_category_link( $postcat );
							$catname =$category->cat_name;
							?>
							<a href="<?php echo $post_cat_link; ?>"><i class="icon-folder-o mr-2"></i><?php echo $catname; ?></a>
							<?php
						}
					?>
				</span>
				<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
			</p>
		</div>
		<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
		<p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
	</div>
</div>