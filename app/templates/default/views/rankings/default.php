<script>
    $(function () {
        infiniteScroll(".rankings", ".character");
    });
</script>

<h1 class="title">Rankings</h1>

<div class="rankings">
    <? foreach ($results as $result): ?>
    	<div class="character rank-<?= $result['doctrine_rownum'] ?>">
            <? if ($result['doctrine_rownum'] > 3): ?>
    		  <div class="rank"><?= $result['doctrine_rownum'] ?>&deg;</div>
            <? endif ?>
            <? if (Mithos\Core\Plugin::getInstance()->isActive('MithosCharacterAvatar')): ?>
        		<div class="image">
                    <div class="mold"></div>
                    <img src="<?= url_to('/resources/images/avatars/no-avatar.jpg') ?>" width="60" height="76" />
        		</div>
            <? else: ?>
        		<div class="image">
                    <div class="mold"></div>
                    <img src="<?= url_to('/resources/images/avatars/no-avatar.jpg') ?>" width="60" height="76" />
        		</div>
            <? endif ?>
    		<div class="desc">
    			<div class="name"><?= $result['name'] ?></div>
    			<div class="class"><?= util('Character')->className($result['class']) ?></div>
    			<div class="level"><?= $result['level'] ?></div>
    			<div class="status">Status: <?= util('Character')->status($result['status']) ?></div>
    			<div class="guild">Guid: <?= $result['guild'] ?></div>
    		</div>
    	</div>
    <? endforeach ?>
	<div class="nav-control" style="display:none;">
        <a href="<?= url_to('/rankings/' . $type) ?>/2"></a>
	</div>
</div>