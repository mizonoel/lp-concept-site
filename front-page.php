<?php get_header(); ?>
    
    <main>
      <section class="hero">
        <div class="mainvisual">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/mainvisual.png" alt="main">
        </div>
        <div class="inner">
          <p class="title">限界を超える、<br>その瞬間を。</p>
          <p class="text">あなたの中にある、強さ、美しさを、<br>ENERGY GYMが引き出す。</p>
          <p class="description">初心者から大会出場者まで、目的に合わせた<br>完全パーソナル指導を提供。</p>
          <div class="main-btn">
            <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">無料体験を申し込む</a>
          </div>
        </div>
      </section>

      <section id="about" class="fadein">
        <div class="wrapper">
          <h2 class="section-title">WHAT ENERGY GYM?</h2>
          <p class="upper-text">ENERGY GYMは、あなたの限界を超えるためのパートナーです。<br>大会を目指す上級者はもちろん、ダイエットを目的とした初心者まで、 一人ひとりの目標に合わせた最適な<br>トレーニングプランを提供しています。</p>
          <p class="bottom-text">高品質なマシン、経験豊富なトレーナー、充実したサポート体制で、 “継続できる環境”を実現。<br>あなたの「変わりたい」を、私たちは本気で支えます。</p>
          <div class="about-stats">
            <div class="stat">
              <span class="count" data-target="500">0</span><span class="unit">+</span>
              <p>会員数</p>
            </div>
            <div class="stat">
              <span class="count" data-target="99">0</span><span class="unit">%</span>
              <p>満足度</p>
            </div>
            <div class="stat">
              <span class="count" data-target="95">0</span><span class="unit">%</span>
              <p>継続率</p>
            </div>
          </div>
        </div>        
      </section>

      <section id="reason">
        <div class="wrapper">
          <h2 class="section-title">Why ENERGY GYM?</h2>
          <div class="inner">
            <div class="item panel">
              <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reason1.png" alt="Personal Training">
              </div>
              <p class="title">パーソナルトレーニング</p>
              <p class="text">一人ひとりの体質・目的に合わせたオーダーメイド指導で最短で理想の体へ。</p>
            </div>
            <div class="item panel">
              <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reason2.png" alt="Facility">
              </div>
              <p class="title">最新のトレーニング設備</p>
              <p class="text">国内外の最新マシンを導入。安全で効率的なトレーニングをサポート。</p>
            </div>
            <div class="item panel">
              <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reason3.png" alt="Support">
              </div>
              <p class="title">継続しやすいサポート体制</p>
              <p class="text">食事指導・メンタルケア・オンライン相談など、継続できる環境を提供。</p>
            </div>
            <div class="item panel">
              <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reason4.png" alt="24hours">
              </div>
              <p class="title">24時間年中無休</p>
              <p class="text">ご自身の都合に合わせ予約が可能。不規則な仕事でも通いやすい環境です。</p>
            </div>
            <div class="item panel">
              <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reason5.png" alt="Distance">
              </div>
              <p class="title">渋谷駅徒歩5分</p>
              <p class="text">アクセス抜群の立地。ショッピング帰りにも気軽に利用できます。</p>
            </div>
            <div class="item panel">
              <div class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/reason6.png" alt="Plan">
              </div>
              <p class="title">3つのプラン</p>
              <p class="text">初心者から上級者までカバーする3つプランを用意。目的別に選択可能です。</p>
            </div>
          </div>
        </div>
      </section>


        <?php
        $args = array(
            'post_type'      => 'plan',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'ASC',
        );
        $works_query = new WP_Query($args);
        ?>

        <section id="plan">
            <div class="wrapper">
                <h2 class="section-title">PLAN</h2>
                <div class="plan-inner">

                <?php if ( $works_query->have_posts() ) : ?>
                    <?php $i = 1; // 番号用カウンター ?>
                    <?php while ( $works_query->have_posts() ) : $works_query->the_post(); ?>

                    <div class="plan-item plan-item<?php echo $i; ?>">
                        <div class="upper">
                            <div class="plan-name">
                                <p><?php echo get_field('plan_name'); ?></p>
                            </div>
                            <div class="price-inner">
                                <p class="price"><?php echo get_field('price'); ?></p>
                                <span class="unit">円(税込)/月</span>
                            </div>

                            <ul class="content">
                                <?php for ($n=1; $n<=3; $n++) : 
                                    $content = get_field("content{$n}");
                                    if ($content): ?>
                                        <li><?php echo esc_html($content); ?></li>
                                <?php endif; endfor; ?>
                            </ul>
                        </div>

                        <div class="bottom">
                            <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">申し込む</a>
                        </div>
                    </div>

                    <?php $i++; endwhile; ?>
                <?php endif; ?>

                </div> <!-- .plan-inner -->
            </div> <!-- .wrapper -->
        </section>

      <section id="equipment">
        <div class="wrapper">
          <h2 class="section-title">EQUIPMENT</h2>
          <div class="eq-inner">
            <div class="eq-item">
              <p class="title">FREE WEIGHT</p>
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bull_logo.png" alt="Bull">
              </div>
              <p class="description">日本発「安全・堅牢・機能的」を兼ね備えた人気のBULLシリーズがラインナップ。</p>
              <ul class="eq-list">
                <li>パワーラック</li>
                <li>スミスマシン</li>
                <li>デュアルアジャスタブルプーリ</li>
                <li>ダンベル1kg〜50kg</li>
                <li>アームカールシャフト</li>
                <li>エクササイズシャフト</li>
                <li>アジャスタブルインクラインベンチ</li>
              </ul>
            </div>

            <div class="eq-item">
              <p class="title">machine</p>
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delta_logo.png" alt="Bull">
              </div>
              <p class="description">フィットネス機器日本最大級のラインナップ持つ「デルタフィットネス」のマシンを採用。</p>
              <ul class="eq-list">
                <li>ロータリートルソー</li>
                <li>ペックフライ/リアデルト</li>
                <li>ラットプルダウンハイプーリー</li>
                <li>シーテッドロウ</li>
                <li>レッグプレス</li>
                <li>レッグエクステンション</li>
                <li>ディップス＆チンニングアシスト</li>
              </ul>
            </div>

            <div class="eq-item">
              <p class="title">cardio</p>
              <div class="img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/technogym_logo.png" alt="Bull">
              </div>
              <p class="description">タッチパネル式の先進マシンをラインナップ。「テクノジム」のマシンを採用。</p>
              <ul class="eq-list">
                <li>トレッドミル</li>
                <li>アップライトバイク</li>
                <li>リカベントバイク</li>
                <li>クロスストレーナ</li>
              </ul>
            </div>
          </div>
          
        </div>
        
        <div class="horizontal-wrapper">
          <ul class="horizontals">
            <li class="free-wight">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/EQUIPMENT1.jpg" alt="">
              <p>FREE WEIGHT</p>
            </li>
            <li class="machine">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/EQUIPMENT2.jpg" alt="">
              <p>MACHINE</p>
            </li>
            <li class="cardio">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/EQUIPMENT3.jpg" alt="">
              <p>CARDIO</p>
            </li>
          </ul>
        </div>
      </section>

      <section id="campaign" class="pop-up">
        <div class="img">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
          <?php else : ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaing.png" alt="">
          <?php endif; ?>
        </div>
      </section>

      <?php
        $args = array(
            'post_type'      => 'faq', 
            'posts_per_page' => -1,       
            'orderby'        => 'date',        
            'order'          => 'ASC'             
        );
        $faq_query = new WP_Query($args); 
        ?>

      <section id="faq" class="wrapper">
      <div class="faq-container">
        <h2 class="section-title">FAQ</h2>
        
        <ul class="accordion">
          <?php if ($faq_query->have_posts()) : ?>
            <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
              <li>
                <div class="accordion-q">
                  <p class="accordion-q-prefix">Q</p>
                  <p class="accordion-q-content"><?php echo esc_html(get_field('question')); ?></p>
                </div>
                <div class="accordion-a">
                  <p class="accordion-a-prefix">A</p>
                  <p class="accordion-a-content"><?php echo esc_html(get_field('answer')); ?></p>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </ul>
      </div>
    </section>

    <section id="access">
      <div class="wrapper">
        <h2 class="section-title">ACCESS</h2>
        <p class="address">東京都渋谷区○○1-2-3 ENERGY GYMビル<br>渋谷駅から徒歩5分</p>
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.605737188023!2d139.69513367694242!3d35.6620842310236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ca93f01526f%3A0x614ac5cbed07c5a7!2z44CSMTUwLTAwNDIg5p2x5Lqs6YO95riL6LC35Yy65a6H55Sw5bed55S6!5e0!3m2!1sja!2sjp!4v1764198599518!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>

    <div class="enroll">
      <div class="enroll-btn">
        <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">入会・見学・体験はこちら</a>
      </div>
    </div>
    </main>

<?php get_footer(); ?>