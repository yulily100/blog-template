<?php
	//アイキャッチ画像を使用する
	add_theme_support('post-thumbnails');

	//サイズを指定して切り抜きをする(縦：100px 横100px)
	set_post_thumbnail_size(360, 226, true);

	// entry page
	add_image_size('entry-image',1200, 515, true);
?>
