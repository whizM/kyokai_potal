<?php
    get_header();  
        /*
    Template Name: category
*/
?>

<?php

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <div class="tag_bar">
    <p class="tag_bar_item"><a href="<?php echo site_url();?>">HOME</a>　＞</p>
    <p class="tag_bar_item"><a href=""><?php single_cat_title(); ?></a></p>
  </div>
  <section class="top-page-section">
      <div class="instagram_banner">
        <p class="advert_title1">
            <?php single_cat_title(); ?>
        </p>
      </div>
      <div class="top-page-section-inner">      
        <div  class="article-cards">

        <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();?>

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
                  echo '|&nbsp;';
                  if (!empty($categories)) {
                      foreach ($categories as $category) {
                        $category_name = esc_html($category->name);
                          echo $category_name . '&nbsp;|';
                      }
                  }
                ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_the_date('Y-m-d'); ?></div>
              <p class="article-card-title"> <?php the_title(); ?> </p>
            </div>
          </a>
        </div>
            <?php
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;
        ?>
    </div>
    <?php
    // Previous/next page navigation.
    the_posts_pagination( array(
        'prev_text'          => __( '前へ', 'twentyfifteen' ),
        'next_text'          => __( '次へ', 'twentyfifteen' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
    ) );

    // If no content, include the "No posts found" template.
    else :
    get_template_part( 'template-parts/content', '投稿が見つかりませんでした。' );

    endif;
    ?>
    </div>


  </section>
<?php get_footer(); ?>
