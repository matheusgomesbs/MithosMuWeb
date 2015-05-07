<form data-ajax class="form" action="<?= url_to('/admin/configs/emails/edit/' . $file) ?>" method="post">
    <div class="fields">
        <textarea style="height:325px" name="filecontent"><?= $filecontent ?></textarea>
    </div>

    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>