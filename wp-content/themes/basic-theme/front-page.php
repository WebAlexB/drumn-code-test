<?php get_header(); ?>
<?php if ( ! current_user_can( 'administrator' ) ) : ?>
	<?php get_template_part( 'templates/section/welcome' ); ?>
<?php endif; ?>
<div class="container mt-4">
	<div class="row">
		<div class="col-md-8">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article class="mb-4">
						<h1><?php the_title(); ?></h1>
						<div><?php the_content(); ?></div>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<p><?php _e('Вибачте, жодна публікація не відповідає вашим критеріям.', 'basic-theme'); ?></p>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>