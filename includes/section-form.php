<div class="entry-content">
    <div class="post-inner">
    
    <form id="message-form" class ="myform">

      <label>Username:
        <input type="text" name="username" />
      </label><br>

      <label style="margin-top: 20px; margin-bottom: 20px;">Email:
        <input type="email" name="email" />
      </label><br>

      <label>Message:
        <textarea name="message"></textarea>
      </label>
      <input type="hidden" name="smf-nonce" value="<?php echo wp_create_nonce('send_message_form'); ?>" /><br>


      <?php wp_nonce_field('send_message_form', 'smf-nonce');?>

       <button type="submit">Send</button>

    </form>

    </div>
  </div>
</main>

<script type="text/javascript">
  const messageForm = document.getElementById('message-form');

console.log({messageForm})

if (messageForm) {

  messageForm.addEventListener('submit', (e) => {
    e.preventDefault();

    fetch(ajax_object.ajax_url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams(new FormData(messageForm))
    }).then(response => {

      return response.json();

    }).then(jsonResponse => {

      console.log({jsonResponse});

    });

  });
}
</script>

