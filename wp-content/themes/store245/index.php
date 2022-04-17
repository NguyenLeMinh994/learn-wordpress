<?php get_header(); ?>
	<div id="content">
		<div class="container">
		<?php get_template_part('slider'); ?>
		</div>
		<div class="product-box">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 order-lg-0 order-1">
						<div class="sidebar">
							<?php get_sidebar(); ?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
						<div class="product-section">
							<h2 class="title-product">
								<a href="#" class="title">Sản phẩm nổi bật</a>
								<div class="bar-menu"><i class="fa fa-bars"></i></div>
								<div class="list-child">
									<ul>
										<?php
										$args = array(
											'type'      => 'product',
											'child_of'  => 0,
											'parent'  => 0,
											'hide_empty'  => 0,
											'taxonomy'  => 'product_cat',
											'number'  => '5',
										);
										$categories = get_categories( $args );
										foreach ( $categories as $category ) { ?>
											<li><a href="<?php echo get_term_link($category->slug, 'product_cat');?>"><?php echo $category->name; ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="clear"></div>
							</h2>
							<div class="content-product-box">
								<div class="row">
									<?php
										$tax_query[] = array(
											'taxonomy' => 'product_visibility',
											'field'    => 'name',
											'terms'    => 'featured',
											'operator' => 'IN',
										);
									?>
									<?php $args = array( 'post_type' => 'product','post_status' => 'publish','order' => 'DESC','posts_per_page' => 4,'ignore_sticky_posts' => 1,'tax_query'=>$tax_query); ?>
									<?php $getposts = new WP_query( $args);?>
									<?php global $wp_query; $wp_query->in_the_loop = true; ?>
									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
										<?php get_template_part('content/item_product')?>
									</div>
									<?php endwhile; wp_reset_postdata(); ?>
									
								</div>
							</div>
						</div>
						<a href="#"><img src="https://phongtrodn.com/wp-content/uploads/2020/02/huykira.png" alt=""></a>
						<br>
						<br>
						<div class="product-section">
							<?php $cate= get_term_by('slug','smart-phone','product_cat') ?>
							<h2 class="title-product">
								<a href="<?php echo get_term_link($cate->slug,'product_cat'); ?>" class="title"><?php echo $cate->name; ?></a>
								<div class="bar-menu"><i class="fa fa-bars"></i></div>
								<div class="list-child">
									<ul>
										<?php 
											$args = array(
												'type'       => 'product',
												'child_of'   => 0,
												'hide_empty' => 0,
												'taxonomy'   => 'product_cat',
												'number'     => '5',
												'parent'     => $cate->term_id,
											);
											$categories = get_categories( $args );
										foreach ( $categories as $category ) { ?>
										<li><a href="<?php echo get_term_link($category->slug, 'product_cat');?>"><?php echo $category->name; ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="clear"></div>
							</h2>
							<div class="content-product-box">
								<div class="row">
									<?php 
										$args = array(
											"product_cat"         => $cate->slug,
											'post_type'           => 'product',
											'ignore_sticky_posts' => 1,
											'posts_per_page'      => 8,
										);
									?>
									<?php $getposts = new WP_query( $args);?>
									<?php global $wp_query; $wp_query->in_the_loop = true; ?>
									<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
										<?php get_template_part('content/item_product')?>
									</div>
									<?php endwhile; wp_reset_postdata(); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
