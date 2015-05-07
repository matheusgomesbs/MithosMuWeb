<script>
//    tinymce.init({
//        selector: "#news-body",
//        language : "pt_BR",
//        height: 249
//    });
</script>

<form data-ajax class="form" method="post" action="<?= url_to('/admin/news/edit/' . $news['id']) ?>">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="news-title">Título: <span class="required">*</span></label>
            </div>
            <div class="field">
                <input type="text" value="<?= $news['title'] ?>" name="title" id="news-title" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="news-link">Link:</label>
            </div>
            <div class="field">
                <input type="text" value="<?= $news['link'] ?>" name="link" id="news-link" />
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="news-link">Tipo: <span class="required">*</span></label>
            </div>
            <div class="field">
                <select name="type" id="news-type">
                    <? foreach (config('news.types', array()) as $id => $type): ?>
                        <option value="<?= $id ?>"<?= $news['type'] == $id ? ' selected="selected"' : '' ?>><?= $type['name'] ?></option>
                    <? endforeach ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="field block">
                <textarea name="body" id="news-body"><?= $news['body'] ?></textarea>
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>