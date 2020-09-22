<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/reset.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/asset/css/default.min.css?20200727">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <?php // description ?>
      <?php if ( is_single()): ?>
      <?php if ($post->post_excerpt){ ?>
      <meta name="description" content="<? echo $post->post_excerpt; ?>" />
      <?php } else {
        $summary = strip_tags($post->post_content);
        $summary = str_replace("\n", "", $summary);
        $summary = mb_substr($summary, 0, 120). "…"; ?>
      <meta name="description" content="<?php echo $summary; ?>" />
      <?php } ?>
      <?php elseif ( is_home() || is_front_page() ): ?>
      <meta name="description" content="<?php bloginfo('description'); ?>" />
      <?php elseif ( is_category() ): ?>
      <meta name="description" content="<?php echo category_description(); ?>" />
      <?php elseif ( is_tag() ): ?>
      <meta name="description" content="<?php echo tag_description(); ?>" />
      <?php else: ?>
      <meta name="description" content="<?php the_excerpt();?>" />
      <?php endif; ?>
    <?php // canonical ?>
      <?php if ( is_home() ) {
        $canonical_url=get_bloginfo('url')."/";
      } else if (is_category()) {
        $canonical_url=get_category_link(get_query_var('cat'));
      } else if (is_page()||is_single()) {
        $canonical_url=get_permalink();
      } if ( $paged >= 2 || $page >= 2) {
        $canonical_url=$canonical_url.'page/'.max( $paged, $page ).'/';
      } ?>
      <?php if(!(is_404())):?>
        <link rel="canonical" href="<?php echo $canonical_url; ?>" />
      <?php endif;?>
    <meta name="format-detection" content="telephone=no">
    <title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>

  <body>
    <div class="wrapper">
      <main>
