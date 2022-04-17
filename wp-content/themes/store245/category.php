<?php get_header(); ?>
	<div id="content">
		<div class="product-box page-category">
			<div class="container">
				<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 ">
                        <div class="category-page-contet">
                            <h1 class="cat-title"><?php single_cat_title(); ?></h1>
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="list-news">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="<?php the_permalink();?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                        <?php the_excerpt();?>
                                        <a href="<?php the_permalink();?>" class="read-more">read more</a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; else:?>
                                <p>Hiện tại chưa có bài viết</p>
                            <?php endif; ?>
                        </div>
                        <?php if(paginate_links()!='') {?>
                            <div class="phantrang">
                                <?php
                                global $wp_query;
                                $big = 999999999;
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'prev_text'    => __('« Previous'),
                                    'next_text'    => __('Next »'),
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages
                                    ) );
                                ?>
                            </div>
                        <?php } ?>
                    </div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 ">
						<div class="sidebar">
							<?php get_sidebar(); ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
