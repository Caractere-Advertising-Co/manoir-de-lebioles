<?php 
  $introNl = get_field('introduction-nl','options');
?>

<section id="section-newsletter">
  <div class="container columns content">
    <div class="colg">
      <?php if($introNl): echo $introNl; endif;?>
    </div>
    <div class="cold">
      <form id="bdp-brevo-form" class="form-newsletter">
        <input type="email" name="bdp_brevo_email" placeholder="Entrez votre email" required>
        <button class="block-img"><img src="<?php echo get_template_directory_uri(  ).'/assets/src/img/avion.png';?>" alt="envoi_nl"/></button>
        <p id="bdp-brevo-msg" style="display:none;"></p>
      </form>
    </div>
  </div>
</section>

<script>
document.getElementById('bdp-brevo-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const form = this;
  const email = form.bdp_brevo_email.value;
  const msg = document.getElementById('bdp-brevo-msg');

  if (!email) return;

  const formData = new FormData();
  formData.append('action', 'bdp_brevo_add_contact');
  formData.append('email', email);

  fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
    method: 'POST',
    body: formData,
    credentials: 'same-origin'
  })
  .then(r => r.json())
  console.warn(r);
  .then(data => {
    if (data.success) {
      console.warn('Inscription réussie');
    } else {
      msg.style.display = 'block';
      msg.textContent = 'Erreur : ' + (data.data || 'Impossible d’ajouter l’adresse.');
    }
  })
  .catch(err => {
    msg.style.display = 'block';
    msg.textContent = 'Erreur de réseau. Essayez plus tard.';
  });
});
</script>
