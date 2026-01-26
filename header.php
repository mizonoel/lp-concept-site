<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ENERGY GYM</title>
    <meta name="description" content="ENERGY GYMは、経験豊富なトレーナーが一人ひとりに寄り添うパーソナルトレーニングジム。初心者も安心して始められます。">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico">
    <?php wp_head(); ?>
</head>

  <body>
    <header id="header">
      <div class="inner">
        <h1 class="logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="ENERGY GYM">
          </a>
        </h1>
        <nav>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>#about">ABOUT</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>#reason">REASON</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>#plan">PLAN</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>#equipment">EQUIPMENT</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>#faq">FAQ</a></li>
            <li><a href="<?php echo esc_url(home_url('/')); ?>#access">ACCESS</a></li>
            </ul>
        </nav>
      </div>
      
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </header>