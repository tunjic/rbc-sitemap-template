<?php
/*
Template Name: Sitemap
*/

remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'rbc_sitemap' );

function rbc_sitemap() { ?>
	<div class="post hentry sitemap">

		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h3>Main Camp Pages</h3>
				<ul><?php wp_list_pages(
					array(
						'exclude' => '166,311,2641,3285,2278,2287,2310,3219,10161,10162,10163,10164,10165,10166,10167,10193,10285',
						'title_li' => '',)
						); ?>
				</ul>
			<h3>Main Camp Categories</h3>
				<?php
				$cats = explode("<br />",wp_list_categories('title_li=&echo=0&depth=1&style=none&show_count=1'));
				$cat_n = count($cats) - 1;
				for ($i=0;$i<$cat_n;$i++):
				if ($i<$cat_n/2):
				$cat_left = $cat_left.'<li>'.$cats[$i].'</li>';
				elseif ($i>=$cat_n/2):
				$cat_right = $cat_right.'<li>'.$cats[$i].'</li>';
				endif;
				endfor;
				?>
				<ul class="catlist-left" style="float: left; width: 49%; clear: left;">
				<?php echo $cat_left;?>
				</ul>
				<ul class="catlist-right" style="float: right; width: 49%; clear: right;">
				<?php echo $cat_right;?>
				</ul>



			<?php switch_to_blog(2);?>

			<h3 style="clear:both;">Staff Pages</h3>
				<ul>
					<li><a href="<?php site_url() ?>/people">People</a></li>
					<?php wp_list_pages('title_li='); ?>
				</ul>

			<h3>Staff Categories</h3>
				<ul><?php wp_list_categories('title_li=&show_count=1'); ?></ul>

			<!-- Add list_pages and list_cats for the Staff Blog -->

			<?php restore_current_blog(); ?>

			<?php switch_to_blog(3);?>

			<h3>Alumnae Pages</h3>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>

			<h3>Alumnae Categories</h3>
				<ul><?php wp_list_categories('title_li=&show_count=1'); ?></ul>

			<!-- Add list_pages and list_cats for the Alumnae Blog -->

			<?php restore_current_blog(); ?>

			 <div style="clear:both;"></div>
				<?php edit_post_link('(Edit)', '', ''); ?>

		<?php endwhile; endif; ?>

		</div>
	</div>

<?php }

genesis();
