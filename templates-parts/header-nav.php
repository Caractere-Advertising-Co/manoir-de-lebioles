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
<script>

const btn = document.getElementById('btnMegamenu');
const megaMenu = document.getElementById('megamenu');
const svgOpenAnim = document.getElementById('animate_open');
const svgCloseAnim = document.getElementById('animate_close');
const menuItems = [...megaMenu.querySelectorAll('.content-megamenu ul li')];
const topHeader = document.getElementById('banner-top');

let isAnimating = false;

function showItems() {
  const delayBase = 80;
  const count = menuItems.length;

  menuItems.forEach((item, index) => {
    const delay = (count - 1 - index) * delayBase;
    item.style.transitionDelay = `${delay}ms`;
    item.style.opacity = '1';
    item.style.transform = 'translateX(0)';
  });
}

function hideItems() {
  const delayBase = 50;

  menuItems.forEach((item, index) => {
    const delay = index * delayBase;
    item.style.transitionDelay = `${delay}ms`;
    item.style.opacity = '0';
    item.style.transform = 'translateX(-100%)';
  });
}

btn.addEventListener('click', () => {

  if (isAnimating) return;
  isAnimating = true;

  const isOpen = megaMenu.classList.contains('active');

  if (!isOpen) {
    // Ouverture
    megaMenu.classList.add('active');
      topHeader.style.zIndex = "1";

    document.getElementById("main-header").classList.add('megamenu-open');

    
    svgOpenAnim.beginElement();

    setTimeout(() => {
      showItems();
      isAnimating = false;
    }, 300);
  } else {
    // Fermeture
    hideItems();
    svgCloseAnim.beginElement();
      topHeader.style.zIndex = "5";


    setTimeout(() => {
      megaMenu.classList.remove('active');
      document.getElementById("main-header").classList.remove('megamenu-open');

      isAnimating = false;
    }, 500);
  }
});


</script>
