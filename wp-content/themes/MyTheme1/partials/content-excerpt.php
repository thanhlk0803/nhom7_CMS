<div class="col-xs-12 col-sm-6 mb-30">
    <div class="blog-post">
        <div class="thumb text-center">
            <a href="<?php the_permalink( ); ?>">
            <?php
            the_post_thumbnail( 'grid_post_thumbnail', array(
                'alt'	=> get_post_meta( get_post_thumbnail_id(get_the_ID()),
                '_wp_attachment_image_alt', true)
            ) );
            ?>
            </a>
        </div>
        <div class="blog-content ptb-30 plr-35">
            <div class="date-box clearfix mb-20">
                <h4 class="theme-color pull-left no-margin"><?php echo get_the_time('d'); ?> <span><?php echo get_the_time('m') ?></span></h4>
                <div class="name-comment pl-15">
                    <h5 class=" mb-5"><span class="theme-color"><?php echo __('By: ', 'glw');?></span> <?php the_author(); ?></h5>
                    <h5 class="no-margin"><span class="theme-color"><?php echo __('Comments: ', 'glw'); ?></span> <?php echo get_comments_number( get_the_ID() ); ?></h5>
                </div>
            </div>
            <a href="<?php the_permalink( ); ?>">
                <h3 class="text-capitalize"><?php glw_post_title(4,get_the_ID(  )); ?></h3>
            </a>
            <p><?php glw_post_excerpt(7, get_the_ID(  )); ?></p>
        </div>
    </div>
</div>
<!-- /.Post End -->