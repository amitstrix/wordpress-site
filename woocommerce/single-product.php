  <?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


    <header class="page-banner product-header container-fluid">
        <div class="container">
            <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                <?php echo woocommerce_template_single_title(); ?>
            <?php endif; ?>
            <?php woocommerce_breadcrumb(); ?>
            <?php do_action('woocommerce_archive_description'); ?>
        </div>
    </header>

    <section class="single-product container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <?php
                        /**
                         * woocommerce_sidebar hook.
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    ?>
                </div>
                <div class="col-8">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php wc_get_template_part( 'content', 'single-product' ); ?>

                    <?php endwhile; // end of the loop. ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer( 'shop' );
