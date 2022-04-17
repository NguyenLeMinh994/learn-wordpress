<?php global $product; ?>
<div class="item-product">
    <div class="thumb">
        <a href="<?php the_permalink(); ?>">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'class' =>'thumnail') ); ?>
        </a>
        <?php if($product->is_on_sale()):?>
            <span class="sale">Sales <br> <?php echo percentSale($product->get_regular_price(), $product->get_sale_price()); ?>%</span>
        <?php endif;?>
        <div class="action">
            <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php echo $product->get_id(); ?>" class="buy"><i class="fa fa-cart-plus"></i> Mua ngay</a>
            <a href="<?php the_permalink(); ?>" class="like"><i class="fa fa-heart"></i> Yêu thích</a>
            <div class="clear"></div>
        </div>
    </div>
    <div class="info-product">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="price">
            <?php echo $product->get_price_html()?>
        </div>
        <a href="<?php the_permalink(); ?>" class="view-more">Xem chi tiết</a>
    </div>
</div>