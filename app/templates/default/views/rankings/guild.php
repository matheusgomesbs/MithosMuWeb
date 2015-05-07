<script>
    $(function () {
        infiniteScroll(".rankings", ".guild");
    });
</script>

<h1 class="title">Rankings</h1>

<div class="rankings">
    <? foreach ($results as $result): ?>
    	<div class="guild">
    		<div class="rank"><?= $result['doctrine_rownum'] ?>&deg;</div>
    		<div class="image">
                <div class="mold"></div>
                <img src="<?= static_to('/guild/logo/' . bin2hex($result['mark']) . '/64') ?>" />
    		</div>
    		<div class="desc">
    			<div class="name"><?= $result['name'] ?></div>
    			<div class="class"></div>
    			<div class="resets"></div>
    		</div>
    	</div>
    <? endforeach ?>
	<div class="nav-control" style="display:none;">
        <a href="<?= url_to('/rankings/' . $type) ?>/2"></a>
	</div>
</div>