<?php

Route::get('/credit-shop', require_auth(), function () {

    $packages = Connection::fetchAll('SELECT * FROM mw_packages WHERE active = 1');

    View::display('MithosPackages.index', [
        'packages' => $packages
    ]);

});

Route::get('/credit-shop/buy/:id', require_auth(), function ($id) {

    $package = Connection::fetchAssoc('SELECT * FROM mw_packages WHERE id = :id', ['id' => $id]);

    if (!empty($package)) {

        if ($package['price'] > user()->getCredit()) {
            error(__('Você não possui créditos suficientes para efetivar esta compra'));
        } else {
            try {
                Connection::transactional(function () use ($package) {

                    user()->setCredit(user()->getCredit() - $package['price']);

                    if (!empty($package['viptype'])) {
                        user()->setVipType($package['viptype']);

                        if (user()->getVipExpire() == null || user()->getVipType() != $package['viptype']) {
                            user()->setVipExpire(new \DateTime());
                        }

                        user()->getVipExpire()->add(new \DateInterval('P' . $package['vipdays'] . 'D'));
                    }

                    $options = json_decode($package['coins']);

                    foreach ($options as $coin => $amount) {
                        user()->addCoin($coin, $amount);
                    }

                    user()->update();

                    success(__('Pacote comprado com sucess'), [
                        'partial' => 'login',
                        'redirect' => '/credit-shop'
                    ]);

                });
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        }

    }

});