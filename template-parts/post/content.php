<div class="blog-entry ftco-animate d-md-flex">
	<a href="<?php the_permalink() ?>">
		<?php the_post_thumbnail('thumbnail', array('class' => 'img img-2')) ?>
	</a>
	<div class="text text-2 pl-md-4">
		<h3 class="mb-2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<div class="meta-wrap">
			<p class="meta">
				<span><i class="icon-calendar mr-2"></i><?php the_time('M j, Y'); ?></span>
				<span><i class="icon-folder-o mr-2"></i>
					<?php
					$output = '';
					foreach ((get_the_category()) as $category) {
						$postcat = $category->cat_ID;
						$post_cat_link = get_category_link($postcat);
						$catname = $category->cat_name;
						
						if (!empty($output))
							$output .= ', ';
						$output .= '<a href="' . $post_cat_link . '">' . $catname . '</a>';
					}
					echo $output;
					?>
				</span>
				<span><i class="icon-comment2 mr-2"></i>
					<?php echo get_comments_number($post->ID); ?> Comment
				</span>
			</p>
		</div>
		<p class="mb-4">
			<?php
			$post_content = get_the_content();
			echo substr($post_content, 0, 120);
			?>
		</p>
		<p><a href="<?php the_permalink() ?>" class="btn-custom"><?php _e('Read More', 'andrea') ?> <span class="ion-ios-arrow-forward"></span></a></p>
	</div>
</div>