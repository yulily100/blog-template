<?php
get_header();
$thumbnail_id =  get_post_thumbnail_id($id);
if($thumbnail_id)
{
  $_image  = wp_get_attachment_image_src($thumbnail_id,'entry-image');
  $image = $_image[0];
}
else{
  $image = TPL_URL . '/assets/img/common/noimage.png';
}
$image_tag = '<img src="'. $image .'" class="eyecatch" alt="'. get_the_title() .'" />';

?>

<div class="contents-inner">
  <div class="entry-page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php echo $image_tag;?>
    <div class="entry-meta">
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
      <p class="entry-category"><?php the_category(" "); ?></p>
      <p class="entry-date"><?php echo get_the_date(); ?></p>
      <div class="entry-share">
        <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title(); ?>&via=hogehoge&tw_p=tweetbutton&related=hogehoge" class="btn tweet" target="_blank">TWEET</a>
        <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php echo get_the_title(); ?>" class="btn share" target="_blank">SHARE</a>
      </div>
    </div>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <?php
      endwhile;
      endif;
    ?>
  </div>
</div>

<div class="recent-post">
  <?php
  $args = array(
    'posts_per_page' => 4
  );
  $the_query = new WP_Query( $args );
  ?>
  <?php if ( $the_query->have_posts() ) : ?>
    <ul>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink() ?>"><?php the_post_thumbnail();?></a>
      <h3 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
      <p class="entry-date"><?php echo get_the_date(); ?></p>
    </li>
  <?php endwhile; ?>
    </ul>
  <?php endif; wp_reset_postdata(); ?>

</div>
<?php get_footer(); ?>
