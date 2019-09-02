<h2><?= $title;?></h2>
   <?php echo form_open('contacts/create'); ?>
    <div class="form-group">
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
</form>



