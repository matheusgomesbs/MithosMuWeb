<h1 class="title">Loja de crédito</h1>

<p>Para comprar em nossa loja de créditos, seu saldo de créditos deve estar positivo. Caso você não tenha créditos, clique aqui para ver detalhes e para saber como adquirir.</p>
<p><strong>Importante:</strong> se você optar por comprar um pacote de plano VIP diferente do seu plano atual, o plano atual é anulado imediatamente no ato da compra.</p>
<p>Para comprar, escolha o pacote desejado e clique em "Comprar". Preste bastante atenção nos avisos, pois a compra não poderá ser desfeita!</p>

<p class="saldo">Seu saldo atual é de: R$ <?= util('Number')->format(user()->getCredit(), 2, ',') ?></p>

<ul class="credit-shop">
    <? foreach ($packages as $package): ?>
        <li>
            <p class="title"><?= $package['package'] ?></p>
            <p class="desc"><?= $package['description'] ?></p>

            R$ <?= util('Number')->format($package['price'], 2, ',') ?>

            <div class="buy">
                <a href="<?= url_to('/credit-shop/buy/' . $package['id']) ?>" class="btn" data-ajax-action>Comprar</a>
            </div>
        </li>
    <? endforeach ?>
</ul>