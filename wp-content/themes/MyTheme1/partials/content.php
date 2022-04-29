<div class="blog-post column-1 mb-50 mr-minus-30">
    <div class="thumb text-center">
        <?php
        the_post_thumbnail( 'single_post_thumbnail', array(
            'alt'	=> get_post_meta( get_post_thumbnail_id(get_the_ID()),
            '_wp_attachment_image_alt', true)
        ) );
        ?>
    </div>
    <div class="blog-content">
        <div class="date-box clearfix mb-25">
            <h4 class="theme-color pull-left no-margin"><?php echo get_the_time( 'd' ); ?> <span><?php echo get_the_time( 'M' ); ?></span></h4>
            <div class="name-comment">
                <h2 class="text-capitalize"><?php the_title( ); ?></h2>
                <h5 class="pull-left no-margin"><span class="theme-color"><?php _e('By: ','glw'); ?></span> <?php the_author(); ?></h5>
                <h5 class="pl-45 no-margin"><span class="theme-color"><?php _e('Comment: ','glw'); ?></span> <?php echo get_comments_number( get_the_ID() ); ?></h5>
            </div>
        </div>
        <!-- categories  -->
        <div class="widget mb-45">
            <div class="widget-title mb-30">
                <h5 class="mb-5"><?php _e('Categories ','glw'); ?></h5>
                <div class="horizontal-line">
                    <hr class="top" />
                    <hr class="bottom" />
                </div>
            </div>
            <div class="category">
                <?php the_category( ' | ' ); ?>
            </div>
        </div>
        <?php 
        the_content(); 
        wp_link_pages();
        ?>
        <!-- post tags  -->
        <div class="widget">
            <div class="widget-title mb-30">
                <h5 class="mb-5"><?php _e('Tags','glw'); ?></h5>
                <div class="horizontal-line">
                    <hr class="top" />
                    <hr class="bottom" />
                </div>
            </div>
            <div class="tags">
                <?php the_tags('',' ',null); ?>
            </div>
        </div>
    </div>

    <!-- author box -->
    <div class="author-box bg-color-3">
        <div class="author-img pull-left">
            <?php
            echo get_avatar( get_the_author_meta('ID'), 82 );
            ?>
        </div>
        <div class="text pt-5">
            <h3 class="text-capitalize no-margin"><?php the_author(); ?></h3>
            <p>
            <?php $user_meta = get_userdata(get_the_author_meta('ID'));
            // echo '<pre>';
            // var_dump($user_meta);
            // echo '</pre>';
            echo $user_meta->roles[0];
            ?>
            </p>
        </div>
        <p class="pt-30">
        <?php echo nl2br(get_the_author_meta( 'description' )); ?>
        </p>
    </div>

</div>
<!-- /.Post Details -->
<?php
if(comments_open( ) || get_comments_number( )){
    comments_template( );
}
?>
<!-- <div class="comment-area mr-minus-30">
    <div class="comment-list mb-60">
        <div class="comment-title mb-40">
            <h5 class="mb-5">Comments</h5>
            <div class="horizontal-line">
                <hr class="top" />
                <hr class="bottom" />
            </div>
        </div>
        <ul>
            <li>
                <div class="author-img pull-left">
                    <img src="assets/img/blog/comment/1.png" alt="Author" />
                </div>
                <div class="text pt-5">
                    <h5 class="text-capitalize">Selina Gomez</h5>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure praising pain w born and I will give you a complete account of the system, </p>
                    <h6>Mar 05 2017 <span>|</span> <a href="#">Reply</a></h6>
                </div>
            </li>
            <li>
                <div class="author-img pull-left">
                    <img src="assets/img/blog/comment/2.png" alt="Author" />
                </div>
                <div class="text pt-5">
                    <h5 class="text-capitalize">Daniel Rice</h5>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure praising pain w born and I will give you a complete account of the system, </p>
                    <h6>Mar 05 2017 <span>|</span> <a href="#">Reply</a></h6>
                </div>
            </li>
            <li>
                <div class="author-img pull-left">
                    <img src="assets/img/blog/comment/3.png" alt="Author" />
                </div>
                <div class="text pt-5">
                    <h5 class="text-capitalize">Alan Roberts</h5>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure praising pain w born and I will give you a complete account of the system, </p>
                    <h6>Mar 05 2017 <span>|</span> <a href="#">Reply</a></h6>
                </div>
            </li>
        </ul>
    </div>
    <div class="comment-box">
        <div class="comment-title mb-40">
            <h5 class="mb-5">leave a Comment</h5>
            <div class="horizontal-line">
                <hr class="top" />
                <hr class="bottom" />
            </div>
        </div>
        <form class="custom-input" action="#">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <input type="text" name="name" placeholder="Your Name" />
                </div>
                <div class="col-xs-12 col-sm-6">
                    <input type="email" name="email" placeholder="Email" />
                </div>
            </div>
            <input type="text" name="website" placeholder="Website" />
            <textarea name="message" id="comment" rows="3" placeholder="Comment"></textarea>
            <button class="btn" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div> -->
<!-- /.Comments Area End -->