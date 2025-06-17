<section id="main-header">
    <div class="container columns content">
        <a href="#!" class="btnMegamenu" id="btnMegamenu">Menu</a>

        <div class="block-img">
            <img src="" alt="" />
        </div>

        <div class="colg">
            <a href="#">Contact</a>
            <select>
                <option>FR</option>
                <option>NL</option>
            </select>
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
const menuItems = [...megaMenu.querySelectorAll('.content-megamenu ul li')];
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
  const delayBase = 300;

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
    // OUVERTURE
    megaMenu.classList.add('active');

    setTimeout(() => {
      showItems();
      isAnimating = false;
    }, 300); // Attend que le volet soit ouvert (transition: 300ms)
  } else {
    // FERMETURE
    hideItems(); // Laisse le temps aux <li> de partir
    setTimeout(() => {
      megaMenu.classList.remove('active');
      isAnimating = false;
    }, 500); // Attends que les <li> aient fini de disparaître
  }
});

</script>
