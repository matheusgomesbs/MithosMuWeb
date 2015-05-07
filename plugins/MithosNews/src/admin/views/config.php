<form data-ajax class="form" action="<?= url_to('/admin/news/config') ?>" method="post">
    <div class="fields">
        <div class="row">
            <div class="label">
                <label for="downloads-links">Tipos:</label>
            </div>
            <div class="field container-add-news-type">
                <? foreach ($types as $index => $type): ?>
                    <input type="text" value="<?= $type['name'] ?>" name="news_types[<?= $index - 1 ?>][name]" style="width:63%" />
                    <input type="text" value="<?= $type['color'] ?>" name="news_types[<?= $index - 1 ?>][color]" style="width:35%;float:right" />
                    <div style="margin-top:5px;"></div>
                <? endforeach ?>
                <input type="text" placeholder="Nome" name="news_types[<?= count($types) + 1 ?>][name]" style="width:63%" />
                <input type="text" placeholder="Cor" name="news_types[<?= count($types) + 1 ?>][color]" style="width:35%;float:right" />
            </div>
        
            <div style="text-align:right;margin-top:5px">
                <a class="button add-news-type" href="javascript:void(0)">Adicionar tipo</a>
            </div>
        </div>
        <div class="row">
            <div class="label">
                <label for="config-news-limit">Limite notícias</label>
            </div>
            <div class="field">
                <input type="text" id="config-news-limit" value="<?= config('news.limit', 5) ?>" name="news_limit" />
            </div>
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Salvar" />
    </div>
</form>