<?php
    
use Mithos\Menu\Menu;
use Mithos\Admin\Auth;
use Mithos\Core\Validation;
use Mithos\Core\Config;

Menu::getInstance('admin')->add([
    'id' => 'news',
    'title' => __('Notícias')
])
->add([
    'id' => 'news.add',
    'title' => __('Adicionar'),
    'url' => '/admin/news/add',
    'window' => [
        'title' => 'Adicionar notícia',
        'height' => 530
    ]
])
->add([
    'id' => 'news.manager',
    'title' => __('Gerenciar'),
    'url' => '/admin/news',
    'window' => [
        'title' => 'Gerenciar notícia',
        'width' => 850
    ]
])
->add([
    'id' => 'news.sep1',
    'title' => '-',
])
->add([
    'id' => 'news.config',
    'title' => __('Configuração'),
    'url' => '/admin/news/config',
    'window' => [
        'title' => 'Configuração de notícias',
        'width' => 400
    ]
]);

View::add('javascript', ['/plugin/MithosNews/js/functions.js']);

function getNewsValidation($source) {
    $validation = new Validation($source, [
        'title' => [
            __('Campo obrigatório') => [
                'rule' => 'notEmpty'
            ]
        ],
        'body' => [
            __('Campo obrigatório') => [
                'rule' => 'notEmpty'
            ]
        ],
        'type' => [
            __('Campo obrigatório') => [
                'rule' => 'notEmpty'
            ]
        ]
    ]);
    return $validation;
}

Route::get('/news', function () {
    $news = Connection::fetchAll('SELECT n.*, u.name AS username FROM mw_news n JOIN mw_users u ON u.id = n.user_id ORDER BY n.id DESC');
    View::display('MithosNews.index', compact('news'));
})
->name('news');


Route::map('/news/add', function () {

    if (Request::isGet()) {
        View::display('MithosNews.add');
    } else {
        $validation = getNewsValidation(Input::post());
        if ($validation->isValid()) {
            try {
                Connection::insert('mw_news', [
                    'title' => htmlentities(Input::post('title')),
                    'slug' => Mithos\Util\Inflector::slug(Input::post('title'), '-'),
                    'body' => Input::post('body'),
                    'link' => Input::post('link'),
                    'type' => Input::post('type'),
                    'create_date' => new \DateTime(),
                    'user_id' => Auth::getInstance()->getUser('id')
                ], [
                    'string', 'string', 'string', 'string',
                    'integer', 'datetime', 'integer'
                ]);
                success(__('Notícia adicionada com sucesso'));
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }

})
->via('GET', 'POST')
->name('news.add');


Route::map('/news/edit/:id', function ($id) {

    if (Request::isGet()) {
        $news = Connection::fetchAssoc('SELECT * FROM mw_news WHERE id = :id', ['id' => $id]);
        View::display('MithosNews.edit', compact('news'));
    } else {
        $validation = getNewsValidation(Input::post());
        if ($validation->isValid()) {
            try {
                Connection::update('mw_news', [
                    'title' => htmlentities(Input::post('title')),
                    'slug' => Mithos\Util\Inflector::slug(Input::post('title'), '-'),
                    'body' => Input::post('body'),
                    'link' => Input::post('link'),
                    'type' => Input::post('type'),
                ], [
                    'id' => $id
                ], [
                    'string', 'string', 'string', 'string',
                    'integer'
                ]);
                success(__('Notícia editada com sucesso'));
            } catch (\Exception $ex) {
                error('Error: ' . $ex->getMessage());
            }
        } else {
            error($validation->getErrors());
        }
    }
})
->via('GET', 'POST')
->name('news.edit');

Route::get('/news/delete/:id', function ($id) {
    try {
        Connection::delete('mw_news', [
            'id' => $id
        ]);
        success(__('Notícia deletada com sucesso'));
    } catch (\Exception $ex) {
        error('Error: ' . $ex->getMessage());
    }
})
->name('');


$app->map('/news/config', function () use ($app) {

    if ($app->request()->isGet()) {
        $app->set('types', config('news.types', []));
        $app->render('MithosNews.config');
    } else {
        $types = [];

        $i = 1;
        foreach ($app->request()->post('news_types') as $type) {
            if (!empty($type['name']) && !empty($type['color'])) {
                $types[$i++] = [
                    'name' => $type['name'],
                    'color' => $type['color']
                ];
            }
        }

        try {
            Config::save([
                'news.limit' => $app->request()->post('news_limit'),
                'news.types' => $types
            ]);
            success(__('Configurações salvas com sucesso.'));
        } catch (\Exception $ex) {
            error('Error: ' . $ex->getMessage());
        }
    }

})
->via('GET', 'POST')
->name('news.config');