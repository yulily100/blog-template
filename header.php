<!doctype html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- ここからOGP -->
    <meta property="og:type" content="blog">
    <?php
    if (is_single()){//単一記事ページの場合
    if(have_posts()): while(have_posts()): the_post();
    echo '<meta property="og:description" content="'.get_post_meta($post->ID, _aioseop_description, true).'">';echo "\n";//抜粋を表示
    endwhile; endif;
    echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";//単一記事タイトルを表示
    echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//単一記事URLを表示
    } else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
    echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
    echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのタイトルを表示
    echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」管理画面で指定したブログのURLを表示
    }
    $str = $post->post_content;
    $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
    if (is_single()){//単一記事ページの場合
    if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
    $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src( $image_id, 'full');
    echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
    } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
    echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
    } else {//投稿にサムネイルも画像も無い場合の処理
    echo '<meta property="og:image" content="http://civic-economy.impacthubkyoto.net/wp-content/themes/CIVICECONOMYLAB/images/og-image.png">';echo "\n";
    }
    } else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
    echo '<meta property="og:image" content="http://civic-economy.impacthubkyoto.net/wp-content/themes/CIVICECONOMYLAB/images/og-image.png">';echo "\n";
    }
    ?>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <!-- ここまでOGP -->

    <!-- Use title if it's in the page YAML frontmatter -->
    <title></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  </head>

  <body>
    <header class="header">
      <h1 class=""><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/header-logo.png" alt=""></a></h1>

    </header>
