<?php 

$logo       = get_field('logo-entreprise','options');
$blockCTA   = get_field('groupe_cta_header','options');

?>
<div id="sticky-trigger"></div>
<section id="main-header">
    <div class="container columns content">
      <a href="#!" class="btnMegamenu" id="btnMegamenu">
        <svg id="open_the_Mmenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" stroke="#ffffff" stroke-width=".6" fill="rgba(0,0,0,0)" stroke-linecap="round" style="cursor: pointer">
          <path d="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7">
            <animate id="animate_open" dur="0.2s" attributeName="d" values="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7;M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7" fill="freeze" />
            <animate id="animate_close" dur="0.2s" attributeName="d" values="M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7;M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7" fill="freeze" />
          </path>
        </svg>
        Menu
      </a>

        <?php if($logo):?>
            <a href="<?php echo get_bloginfo('url');?>">
              <div class="block-img">
                <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['title'];?>" />
              </div>
            </a>
        <?php endif;?>

        <div class="cold">
          <?php if($blockCTA): $i = 0; 
            foreach($blockCTA as $cta):
                $link = $cta['url'];

                $i == 0 ? $class = 'cta -no-border' : $class = 'cta -gold';

                if($link): 
                  echo '<a href="'.$link['url'].'" class="'.$class.'">'.$link['title'].'</a>';
                endif;
                $i++;
            endforeach;
          endif;?>
        </div>
    </div>
</section>
<section id="megamenu">
    <div class="content-megamenu">
        <?php wp_nav_menu(array(
            'menu' => 'Mega menu',
            'theme_location' => 'megamenu',
            'menu_class' => 'semi-bold nav'
        ));?>
    </div>
</section>

    <div class="circle-cursor"></div>