<form id="bdp-brevo-form" method="POST" action="">
  <input type="email" name="bdp_brevo_email" placeholder="Votre email" required>
</form>

<script>
document.getElementById('bdp-brevo-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const email = this.bdp_brevo_email.value;
  if (!email) return;
  fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
    method: 'POST',
    credentials: 'same-origin',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      action: 'bdp_brevo_add_contact',
      email
    })
  }).then(r => {
    if (r.ok) window.location.href = '/thank-you-inscription/';
  });
});
</script>
