<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" type="text/css" 
		href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<?php wp_head(); //HOOK. required for the admin bar & plugins to work ?>
</head>
<body>
	<header id="header">
		<h1>
			<a href="<?php echo home_url(); ?>">
			<?php bloginfo( 'name' ); ?>
			</a>
		</h1>
		<h2><?php bloginfo( 'description' ); ?></h2>

		<nav>
			<ul>
				<?php wp_list_pages(); ?>
			</ul>
		</nav>

		<?php get_search_form(); ?>

		<?php 
		//if logged in, logout button, otherwise show the login
		wp_loginout(); ?>
	</header>
	<main id="content">
		<?php //THE LOOP. this can display ANY wordpress posts or pages
		if( have_posts() ){
			while( have_posts() ){
				the_post();
		 ?>
		<article>
			<h2>
				<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				</a>
			</h2>
			<?php the_content(); ?>
			<footer><?php the_date(); ?></footer>			
		</article>

		<?php comments_template(); ?>

		<?php
			} //end of the while loop 
		}else{
			echo 'no posts found';
		} ?>
	</main>

	<aside id="sidebar">
		<section>
			<h2>Categories</h2>
			<ul>
				<?php wp_list_categories( array(
					'title_li'		=> '',
					'show_count'	=> 1,
					'orderby'		=> 'count',
					'order'			=> 'DESC',
					'number'		=> 20,     //max number of categories
				) ); ?>
			</ul>
		</section>
		
		<section>
			<h2>Tags</h2>	
			<?php wp_tag_cloud( array(
				'smallest' 	=> 1,
				'largest' 	=> 1,
				'unit'		=> 'em',
				'format'	=> 'list',
				'orderby'	=> 'count',
				'order'		=> 'DESC',
			) ); ?>
		</section>

	</aside>
	<footer id="footer">Simple theme by Melissa Cabral</footer>
	<?php wp_footer(); //HOOK. required for plugins & admin bar to work ?>
</body>
</html>