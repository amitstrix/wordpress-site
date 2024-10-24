<?php
/**
 * Template Name: Project-Single-Page
 */
get_header();
?>

<div class="main">
    <div class="container">
        <div class="row">
          <?php
          $args = array(
              'post_type' => 'product',
              'posts_per_page' => -1,
              'orderby' => 'title',
              'order' => 'ASC'
          );
          $query = new WP_Query($args);
          
          if($query->have_posts()):

              while($query->have_posts()): $query->the_post();
                  global $product; // Get the global product object for accessing product data
          ?>
                  <div class="product">
                      <a href="<?php the_permalink(); ?>"> <!-- Link to the product page -->
                          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                          <h1><?php the_title(); ?></h1>
                      </a>
                      
                      <div class="price">
                          <?php echo wc_price( $product->get_price() ); ?> <!-- Display the product price -->
                      </div>

                      <div class="categories">
                          <strong>Categories: </strong>
                          <?php echo get_the_term_list( get_the_ID(), 'product_cat', '', ', ' ); ?> <!-- Display product categories -->
                      </div>

                      <div class="tags">
                          <strong>Tags: </strong>
                          <?php echo get_the_term_list( get_the_ID(), 'product_tag', '', ', ' ); ?> <!-- Display product tags -->
                      </div>

                      <div class="content">
                          <?php the_content(); ?> <!-- Display full product content -->
                      </div>
                      
                      <div class="add-to-cart">
                          <?php woocommerce_template_loop_add_to_cart(); ?> <!-- Display Add to Cart button -->
                      </div>
                  </div>
          <?php
              endwhile;

          else:
              echo "No product found. Try again later.";
          endif;

          wp_reset_postdata();
          ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
