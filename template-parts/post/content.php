<div id="post-<?php the_ID(); ?>" <?php post_class('blog-entry ftco-animate d-md-flex'); ?>>
	<a href="<?php the_permalink() ?>">
		<?php the_post_thumbnail('thumbnail', array('class' => 'img img-2')) ?>
	</a>
	<div class="text text-2 pl-md-4">
		<h3 class="mb-2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
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
		echo wp_kses_post($output);
		?>
		<p class="mb-4">
			<?php
			$post_content = get_the_content(get_the_ID());
			echo wp_trim_words($post_content, 30, false);
			?>
		</p>
		<p>
			<a href="<?php the_permalink() ?>" class="btn-custom">
				<?php _e('Read More', 'andrea') ?> 
				<span class="ion-ios-arrow-forward"></span>
			</a>
		</p>
	</div>
</div>