<?php
/**
 * Template Name: Blog Template
 */
get_header(); ?>
<div class="container mt-4">
	<div class="row">
		<div class="col-md-8">
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 5,
				'paged' => get_query_var('paged') ? get_query_var('paged') : 1
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) : ?>
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<article class="mb-4">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div><?php the_excerpt(); ?></div>
					</article>
				<?php endwhile; ?>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<?php
						$big = 999999999;
						$pagination_args = array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'current' => max(1, get_query_var('paged')),
							'total' => $query->max_num_pages,
							'prev_text' => '<span aria-hidden="true">&laquo;</span>',
							'next_text' => '<span aria-hidden="true">&raquo;</span>',
							'type' => 'array'
						);
						$links = paginate_links($pagination_args);

						if ($links) :
							foreach ($links as $link) :
								echo '<li class="page-item">' . str_replace(array('<a', '</a>'), array('<a class="page-link"', '</a>'), $link) . '</li>';
							endforeach;
						endif;
						?>
					</ul>
				</nav>

			<?php else : ?>
				<p><?php _e('Вибачте, жодна публікація не відповідає вашим критеріям.', 'basic-theme'); ?></p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
