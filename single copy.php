<?php
    get_header();  
?>

  <div class="tag_bar">
      <p class="tag_bar_item"><a href="./index.htm">HOME</a>　＞</p>
      <!-- <p class="tag_bar_item"><a href="#">カテゴリ名</a>　＞</p> -->
      <p class="tag_bar_item"><a href="#"><?php the_title(); ?></a></p>
  </div>

  <div class="l-wrapper">
    <main class="l-main">
      <div class="dividerBottom">
        <!--archive-->
        <div class="archive">
          <div class="blog_title">
            <div class="archive__contents">
              <h2 class="heading heading-subtitle heading-bg">
                <?php the_title(); ?>
              </h2>
            </div>
          </div>

          <article class="archive__item">
            <div class="archive__contents">
              <p class="phrase phrase-secondary">
                <?php the_content(); ?>
              </p>
            </div>
          </article>
        </div>
        <!--/archive-->
      </div>
    </main>
    <div class="l-sidebar">
      <aside class="widget widget-side  widget_fit_thumbnail_archive_class">
        <div class="heading-widgetborder">
          <div class="ranking">
            <h2 class="heading">Ranking</h2><span class="ranking_subtitle">人気ランキング</span>
          </div>
        </div>
        <ol class="widgetArchive">
            <?php
              $args = array(
                  'post_type' => 'post',
                  // 'orderby'    => 'date',
                  'post_status' => 'publish',
                  'order'    => 'ASC',      
                  'meta_key' => 'post_views_count', // The post meta key for views
                  'orderby' => 'meta_value_num', // Order by the numeric post meta value
                  'posts_per_page' => 3,
              );
              $post_counter = 1;
              $result_news = new WP_Query( $args );
              if ( $result_news-> have_posts() ) :
                  while ( $result_news->have_posts() ) :
                  $result_news->the_post();
            ?>

              <a href="<?php the_permalink(); ?>">
                  <li class="widgetArchive__item widgetArchive__item-normal">
                  <div class="eyecatch eyecatch-11">
                    <span class="eyecatch__cat cc-bg7" style="z-index:10;">
                      <!-- <img src="src/img/crown.svg" alt="crown" class="crown"> -->
                      <?php
                        if ($post_counter == 1) {
                            echo '<figure class="gold_bg"><img src="' . get_stylesheet_directory_uri() . '/src/img/crown.svg" alt="crown" class="crown"></figure>'; // Gold medal emoji
                        } elseif ($post_counter == 2) {
                            echo '<figure class="silver_bg"><img src="' . get_stylesheet_directory_uri() . '/src/img/crown.svg" alt="crown" class="crown"></figure>'; // Silver medal emoji
                        } elseif ($post_counter == 3) {
                            echo '<figure class="copper_bg"><img src="' . get_stylesheet_directory_uri() . '/src/img/crown.svg" alt="crown" class="crown"></figure>'; // Bronze medal emoji
                        }
                      ?>
                    </span>
                    <div class="eyecatch__link eyecatch__link">
                      <figure class="article-eyecatch__link eyecatch__link">
                            <?php
                              if (has_post_thumbnail()) {
                                  the_post_thumbnail('thumbnail', array("class" => "news_img"));
                              } else {
                                  echo '<img style="width:100%; height:100%" src="' . get_stylesheet_directory_uri() . '/src/img/news/news_1.webp" alt="Default Image">';
                              }
                            ?>
                      </figure>
                    </div>
                  </div>
                  <div class="widgetArchive__contents">
                    <div class="dateList">
                      <span class="subtitle">
                          <?php
                            $categories = get_the_category();
                            echo '|';
                            if (!empty($categories)) {
                              foreach ($categories as $category) {
                                $category_name = esc_html($category->name);
                                echo $category_name . '|';
                              }
                            }
                          ?>
                      </span>
                      <span class="dateList__item">&nbsp;|&nbsp;<?php echo get_the_date();?></span>
                    </div>
                    <h3 class="heading heading-tertiary">
                      <?php echo the_title();?>
                    </h3>
                  </div>
                </li>
              </a>
            <?php
              $post_counter++;
              endwhile;endif;
              wp_reset_query();
              wp_reset_postdata();
            ?>  
        </ol>
      </aside>
      <aside class="widget widget-side  widget_fit_thumbnail_archive_class">
        <div class="heading-widgetborder">
          <div class="ranking">
            <h2 class="heading">News&nbsp;&nbsp;<span class="ranking_subtitle">新着記事</span></h2>
          </div>
        </div>
        <ol class="widgetArchive">
          <?php
              $args = array(
                  'post_type' => 'post',
                  'orderby'    => 'date',
                  'post_status' => 'publish',
                  'order'    => 'DESC',      
                  'posts_per_page' => 5,
              );
              $result_news = new WP_Query( $args );
              if ( $result_news-> have_posts() ) :
                  while ( $result_news->have_posts() ) :
                  $result_news->the_post();
          ?>
              <a href='<?php the_permalink(); ?>'>
                <div class="widgetArchive__item widgetArchive__item-normal">
                  <div class="eyecatch eyecatch-11">
                    
                    <div class="eyecatch__link eyecatch__link" href="function-list/index.htm">
                      <figure class="article-eyecatch__link eyecatch__link">
                          <?php
                              if (has_post_thumbnail()) {
                                  the_post_thumbnail('thumbnail', array("class" => "news_img"));
                              } else {
                                  echo '<img style="width:100%; height:100%" src="' . get_stylesheet_directory_uri() . '/src/img/news/news_1.webp" alt="Default Image">';
                              }
                          ?>
                      </figure>
                    </div>
                  </div>
                  <div class="widgetArchive__contents">
                    <div class="dateList">
                      <span class="subtitle">
                        <?php
                            $categories = get_the_category();
                            echo '|';
                            if (!empty($categories)) {
                              foreach ($categories as $category) {
                                $category_name = esc_html($category->name);
                                echo $category_name . '|';
                              }
                            }
                        ?>
                      </span>
                      <span class="dateList__item">&nbsp;|&nbsp;<?php echo get_the_date();?></span>
                    </div>
                    <h3 class="heading heading-tertiary">
                      <?php echo the_title();?>
                    </h3>
                  </div>
                </div>
              </a>
          <?php
            endwhile;endif;
            wp_reset_query();
            wp_reset_postdata();
          ?>  
        </ol>
      </aside>
    </div>
  </div>


<?php 
    get_footer();
?>