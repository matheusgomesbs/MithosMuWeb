<?php

use Mithos\Ranking\Ranking;
use Mithos\Util\Inflector;

Route::get('/ranking', function () {

    View::display('ranking');

});


Route::get('/rankings(/:type(/:page))', function ($type = 'level', $page = 1) {
    $max = 50;
    $init = (int)($page - 1) * $max;

    $class = Inflector::classify($type);

    try {
        $ranking = Ranking::factory($class);
        $qb = $ranking->getQuery();

        $qb->setFirstResult($init)
                ->setMaxResults($max);

        View::display($ranking->getView(), [
            'type' => $type,
            'results' => $qb->execute()
        ]);
    } catch (\Exception $ex) {
        App::notFound();
    }
});