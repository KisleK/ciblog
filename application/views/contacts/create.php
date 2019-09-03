<h2><?= $title;?></h2>
   <?php //echo form_open('contacts/create'); ?>
    <!-- <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea id="editor1" name="message" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary" type="submit">Send Email</button>
</form> -->

<?php
echo form_open('/Sendingemail_Controller/send_mail');
?>
<input type = "email" name = "email" required />
<input type = "submit" value = "SEND MAIL">
<?php
echo form_close();
?>

