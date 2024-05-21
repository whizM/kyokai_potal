
<?php
    get_header();  
?>

<section class="top-page-section">
    <h1 style="display:none">オンラインで取得できる資格ポータルサイト｜協会ポータル</h1>
    <div class="pc-only key-visual">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
              $args = array(
                  'post_type' => 'post',
                  'orderby'    => 'date',
                  'post_status' => 'public',
                  'order'    => 'DESC',      
                  'posts_per_page' => 5,
              );
              $result_news = new WP_Query( $args );
              if ( $result_news-> have_posts() ) :
                  while ( $result_news->have_posts() ) :
                  $result_news->the_post();
            ?>
                <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('thumbnail', array("class" => "news_img"));
                    } else {
                        echo '<img style="width:100%; height:100%" src="' . get_stylesheet_directory_uri() . '/src/img/news/news_1.webp" alt="Default Image">';
                    }
                  ?>
                    </a>
                </div>
                <?php
              endwhile;endif;
              wp_reset_query();
              wp_reset_postdata();
          ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                </svg>
                <span></span>
            </div>
        </div>
        <div class="pc-only key-visual-text-pc">
            「好きなこと」で<br>
            次の「やりたい」<br>
            を見つける

            <!-- 今日の<span>「</span>選ぶ<span>」</span>で<br>
            明日の<span>「</span>したい<span>」</span><br> を叶える -->
        </div>
    </div>
    <img loading="lazy" class="sp-only lazyload" src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/top-sp.jpg"
        width="100%" alt="エラベル">
    <div class="sp-only key-visual-text-sp">
        「好ききなこと」で<br>
        次の「やりたい」<br>
        を見つける
    </div>
</section>

  <!--pick up-->
  <section class="top-page-section">
    <div class="top-page-section-inner">
      <div class="top-page-section-header">
        <h2 class="top-page-section-title">今月のピックアップ</h2>
        <span>Pick up</span>
      </div>
      <div class="article-cards">
      <?php
            $args = array(
                'post_type' => 'post',
                'orderby'    => 'date',
                'post_status' => 'publish',
                'order'    => 'DESC',      
                'posts_per_page' => 4,
            );
            $result_news = new WP_Query( $args );
            if ( $result_news-> have_posts() ) :
                while ( $result_news->have_posts() ) :
                $result_news->the_post();
          ?>

        <div class="article-card-4col">
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
            <div class="article-card-info"> <?php
                  $categories = get_the_category();
                  echo '| ';
                  if (!empty($categories)) {
                      foreach ($categories as $category) {
                          $category_name = esc_html('&nbsp;' . $category->name);
                          echo $category_name . ' |';
                      }
                  }
                ?>&nbsp;&nbsp;<?php echo get_the_date();?> </div>
            <p class="article-card-title"> <?php the_title(); ?> </p>
          </a>
              
        </div>
        <?php
            endwhile;endif;
            wp_reset_query();
            wp_reset_postdata();
        ?>   
      </div>
    </div>
  </section>

  <!--インタビュー・アンケート-->
  <section class="top-page-section news">
    <div class="top-page-section-inner">
      <div class="top-page-section-header">
        <h2 class="top-page-section-title">新着記事</h2>
        <p>New Article</a>
      </div>
      <div class="article-cards">
          <?php
            $args = array(
                'post_type' => 'post',
                'orderby'    => 'date',
                'post_status' => 'publish',
                'order'    => 'DESC',      
                'posts_per_page' => 6,
            );
            $result_news = new WP_Query( $args );

            // $result_news = new WP_Query(apply_filters('custom_query_by_views', $args));
            if ( $result_news-> have_posts() ) :
                while ( $result_news->have_posts() ) :
                $result_news->the_post();
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
                          $category_name = esc_html('&nbsp;' . $category->name);
                          echo $category_name . ' |';
                      }
                  }
                ?>&nbsp;&nbsp;<?php echo get_the_date(); ?> </div>
              <p class="article-card-title"> <?php the_title(); ?> </p>
            </div>
          </a>
        </div>

        <?php
            endwhile;endif;
            wp_reset_query();
            wp_reset_postdata();
        ?>   


      </div>
      <div class="top-page-section-header read_more_add">
        <a class="top-page-section-anchor read_more" href="<?php echo site_url();?>/newpost/"> 最新の記事をもっと見る </a>
      </div>
    </div>
  </section>


  <?php
    get_footer();
?>