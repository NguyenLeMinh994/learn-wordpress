<div class="slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php 
                $args = array(
                    'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                    'post_type' => 'slider', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
                );
                $getposts = new WP_query($args); 
                $i=1;
            ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
            <div class="carousel-item <?php echo $i==1?'active':'' ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(),'full',array('class'=>'d-block w-100')); ?>
            </div>
            <?php $i++; endwhile; wp_reset_postdata(); ?>
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>