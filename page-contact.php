<?php
    get_header();  
    /*
    Template Name: Contact
*/
?>
  <div class="tag_bar">
    <p class="tag_bar_item"><a href="<?php echo site_url();?>">HOME</a>　＞</p>
    <p class="tag_bar_item"><a href="#">お問い合わせ</a></p>
  </div>
  <!--インタビュー・アンケート-->
  <section class="top-page-section">
    <div class="advert">
      <p class="advert_subtitle">お問い合わせ</p>
    </div>
    <div class="top-page-section-contact">
      <div class="contact_part">
      <?php echo do_shortcode('[contact-form-7 id="ea1266a" title="test"]'); ?>
        
      </div>
    </div>
  </section>

  <!--カテゴリから探す-->


  <?php
    get_footer();
?>