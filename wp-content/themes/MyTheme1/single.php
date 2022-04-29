<?php
get_header();
?>
        <!-- Breadcrumbs & Page Title Start -->
        <div class="breadcrumbs-title bg-img-4 parallax overlay dark-5 blank-space">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs-menu ptb-150">
                            <h1 class="l-height">Blog One</h1>
                            <ul class="clearfix">
                                <li><a href="index.html">Home</a> <i class="zmdi zmdi-chevron-right"></i></li>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- Breadcrumbs & Page Title End -->
        <!-- Blog Section Start -->
        <section class="blog-details section-padding white-bg">
            <div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 mobi-mb-50">
					<?php 
					if(have_posts()):
						while(have_posts()):
							the_post();
							get_template_part( 'partials/content' );
						endwhile;
					endif;
					?>
					</div>
					<?php 
						get_sidebar();
					?>
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- Blog Section End -->
<?php
get_footer();
?>