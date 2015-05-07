<?php

use Mithos\Core\Validation;
use Mithos\DB\Mssql;
use Mithos\Util\Hash;

function getGroupValidation($source) {
    $validation = new Validation($source, [
        'name' => [
            __('Campo obrigatório') => [
                'rule' => 'notEmpty'
            ]
        ]
    ]);
    return $validation;
}
    
$app->get('/groups', function () use ($app) {
    $groups = Mssql::getInstance()->fetchAll('SELECT * FROM mw_user_groups');
    $app->set('groups', $groups);
    $app->render('groups/index');
})->name('groups');


$app->map('/groups/add', function () use ($app) {
    if ($this->request()->isGet()) {
        $routes = [];
        foreach ($app->router()->getNamedRoutes() as $name => $route) {
            $routes[] = [
                'id' => $name,
    //            'title' => $route->getTitle(),
                'route' => $route
            ];
        }
        $app->set('routes', Hash::sort($routes, '{s}.id', 'asc'));
        $app->render('groups/add');
    } else {
        $validation = getGroupValidation($app->request()->post());
        if ($validation->isValid()) {
            try {
                Mssql::getInstance()->query('INSERT INTO mw_user_groups
                    (name, access) VALUES (:name[string], :access[string])
                ', [
                    'name' => $app->request()->post('name'),
                    'access' => join(',', $app->request()->post('access'))
                ]);
                success(__('Grupo adicionado com sucesso'));
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
})
->via('POST', 'GET')
->name('groups.add');


$app->get('/groups/edit/:id', function ($id) use ($app) {
    $group = \Mithos\Mssql::getInstance()->fetch('SELECT * FROM mw_user_groups WHERE id = :id[integer]', array('id' => $id));

    $routes = array();
    foreach ($app->router()->getNamedRoutes() as $name => $route) {
        $routes[] = array(
            'id' => $name,
//            'title' => $route->getTitle(),
            'route' => $route
        );
    }
    $access = explode(',', $group['access']);
    $app->set('routes', Mithos\Util\Hash::sort($routes, '{s}.id', 'asc'));
    $app->set('group', $group);
    $app->set('access', $access);
    $app->render('groups/edit');
})->name('groups.edit');

$app->post('/groups/edit/:id', function ($id) use ($app) {
    $validation = getGroupValidation($app->request->post());
    if ($validation->isValid()) {
        try {
            \Mithos\Mssql::getInstance()->query('UPDATE mw_user_groups SET
                name = :name[string],
                access = :access[string]
                WHERE id = :id[integer]
            ', array(
                'name' => $app->request->post('name'),
                'access' => join(',', $app->request->post('access')),
                'id' => $id
            ));
            echo json_encode(array('success' => true, 'message' => 'Grupo editado com sucesso'));
        } catch (\Exception $ex) {
            echo json_encode(array('success' => false, 'error' => $ex->getMessage()));
        }
    } else {
        echo json_encode(array('success' => false, 'errors' => $validation->getErrors()));
    }
});

$app->get('/groups/delete/:id', function ($id) use ($app) {
    try {
        \Mithos\Mssql::getInstance()->query('DELETE FROM mw_user_groups WHERE id = :id[integer]', array(
            'id' => $id
        ));
        echo json_encode(array('success' => true, 'message' => 'Grupo deletado com sucesso'));
    } catch (\Exception $ex) {
        echo json_encode(array('success' => false, 'error' => $ex->getMessage()));
    }
})->name('groups.delete');