<form data-ajax class="form" method="post" action="<?= url_to('/admin/accounts/warehouse/' . $account->getUsername()) ?>">
    <div class="fields" style="top:25px;padding:0">
        <div class="warehouse">
            <? for ($y = 0; $y < $warehouse->getHeight(); $y++): ?>
                <? for ($x = 0; $x < $warehouse->getWidth(); $x++): ?>
                    <? $item = $warehouse->getItem($x, $y) ?>
                    <? if ($item !== null): ?>
                        <div class="item-desc">
                            <? if (count($item->getExcellents()) > 0): ?>
                                <p class="bold green">Excelente <?= $item->getName() ?> <?= $item->getLevel() > 0 ? '+' . $item->getLevel() : '' ?></p>
                            <? else: ?>
                                <p class="bold"><?= $item->getName() ?> <?= $item->getLevel() > 0 ? '+' . $item->getLevel() : '' ?></p>
                            <? endif ?>

                            <p>&nbsp;</p>
                            <p>Durabilidade: <?= $item->getDurability() ?></p>
                            <p>Serial: <?= $item->getSerial() ?></p>
                            <p>&nbsp;</p>

                            <? if ($item->getLuck()): ?>
                                <p class="blue">Sorte (taxa de sucesso +25% para Jewel of Soul)</p>
                                <p class="blue">Sorte (dano crítico + 5%)</p>
                            <? endif ?>
                            <p class="blue">Dano adicional +<?= $item->getOption() * 4 ?></p>

                            <? foreach ($item->getExcellents() as $index => $excellent): ?>
                                <? if ($excellent): ?>
                                    <p class="blue"><?= $item->getExcellentName($index) ?></p>
                                <? endif ?>
                            <? endforeach ?>


                            <? if ($item->getRefine() > 0): ?>
                                <p class="purple">Refine: <?= $item->getRefineName() ?></p>
                            <? endif ?>

                            <? if ($item->getHarmonyType() > 0): ?>
                                <p class="yellow">Harmony: <?= $this->getHarmonyName() ?></p>
                            <? endif ?>

                            <? if (count($item->getSockets()) > 0): ?>
                                <? foreach ($item->getSockets() as $index => $socket): ?>
                                    <p class="blue"><?= $item->getSocketName($index) ?></p>
                                <? endforeach ?>
                            <? endif ?>
                        </div>
                        <div class="item" style="height:<?= $item->getSize('y') * 32 ?>px;width:<?= $item->getSize('x') * 32 ?>px;top:<?= $y * 32 ?>px;left:<?= $x * 32 ?>px">
                            <img src="/images/items/<?= str_pad($item->getSection(), 2, '0', STR_PAD_LEFT) ?><?= str_pad($item->getIndex(), 2, '0', STR_PAD_LEFT) ?>.gif" />
                        </div>
                    <? elseif (!$warehouse->hasItem($x, $y)): ?>

                    <? endif ?>
                <? endfor ?>
            <? endfor ?>
        </div>

        <div class="body">
            <label for="warehouse-money-<?= $account->getUsername() ?>">ZEN</label>
            <input type="text" name="money" id="warehouse-money-<?= $account->getUsername() ?>" value="<?= $warehouse->getMoney() ?>" />
        </div>
    </div>
    <div class="actions">
        <a data-ajax-action class="button" title="Baú <?= $account->getUsername() ?>" href="<?= url_to('/admin/accounts/warehouse/organize/' . $account->getUsername()) ?>">Organizar</a>
        <input type="submit" value="Salvar" />
    </div>
</form>