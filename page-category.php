<?php
    get_header();  
        /*
    Template Name: Category1
*/
?>

<div class="tag_bar">
    <p class="tag_bar_item"><a href="<?php echo site_url();?>">HOME</a>　＞</p>
    <p class="tag_bar_item"><a href="">
        <?php
          $category_slug = isset($_GET['category']) ? $_GET['category'] : '';
          echo($category_slug)
        ?>
    </a></p>
  </div>
  <section class="top-page-section">
      <div class="instagram_banner">
        <p class="advert_title1">
          <?php
          $category_slug = isset($_GET['category']) ? $_GET['category'] : '';
          echo($category_slug)
          ?>
        </p>
      </div>
      <div class="top-page-section-inner">      
        <div  class="article-cards">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          // $category_slug = isset($_GET['category']) ? $_GET['category'] : '';
          // $paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
          $category_slug = (get_query_var('category')) ? get_query_var('category') : '';
          echo '<script>console.log("Variable value: '. $category_slugs . '")</script>';
          $args = array(
              'post_type' => 'post',
              'category_name' => $category_slug,
              'posts_per_page' => 9,
              'paged' => $paged,
              'orderby' => 'date',
              'order' => 'DESC'
          );
          
          $query = new WP_Query($args);
          
          if ($query->have_posts()) {
              while ($query->have_posts()) {
                  $query->the_post();
          ?>
                    <div class="article-card-3col">
                      <a href="<?php the_permalink(); ?>">
                        <figure class="article-card-thumbnail lazyload" width="160px" height="90px">
                          <?php
                              if (has_post_thumbnail()) {
                                  the_post_thumbnail('thumbnail', array("class" => "news_img"));
                              } else {
                                  echo '<img style="width:100%; height:100%" src="' . get_stylesheet_directory_uri() . '/src/img/news/news_1.webp" alt="Default Image">';
                              }
                            ?>
                        </figure>
                        <div class="news_title">
                          <div class="article-card-info"> 
                          <?php
                              $categories = get_the_category();
                              echo '|';
                              if (!empty($categories)) {
                                  foreach ($categories as $category) {
                                     $category_name = esc_html($category->name);
                                      echo $category_name . '|';
                                  }
                              }
                            ?>　|　<?php echo get_the_date('Y-m-d'); ?></div>
                          <p class="article-card-title"> <?php the_title(); ?> </p>
                        </div>
                      </a>
                    </div>
            <?php
              }
              $total_pages = $query->max_num_pages;
              if ( $total_pages > 1 ) {
                  echo paginate_links( array(
                      'base' => get_pagenum_link( 1 ) . '%_%',
                      'format' => 'page/%#%',
                      'current' => max( 1, get_query_var( 'paged' ) ),
                      'total' => $total_pages,
                      'prev_text' => '<i class="fa fa-angle-left"></i>',
                      'next_text' => '<i class="fa fa-angle-right"></i>',
                  ) );
              }
            } else {
              echo '<p style="text-align:center; color:red; font-size:20px;">投稿が見つかりませんでした。</p>';
            }
            
            wp_reset_postdata();
            ?>
            </div>
      </div>


    </section>
<?php 
    get_footer();
?>