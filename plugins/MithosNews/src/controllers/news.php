<?php
    
App::hook('home.before', function () {

    $news = Connection::fetchAll('SELECT TOP ' . config('news.limit', 5) . ' n.*, u.name AS username FROM mw_news n JOIN mw_users u ON u.id = n.user_id ORDER BY n.id DESC');
    View::display('MithosNews.list', ['layout' => false, 'news' => $news]);

});

Route::get('/news/:slug', function ($slug) {
    
    $news = Connection::fetchAssoc('SELECT n.*, u.name AS username FROM mw_news n JOIN mw_users u ON u.id = n.user_id WHERE n.slug = :slug', ['slug' => $slug]);
    
    if (empty($news)) {
        App::notFound();
    } else {
        Connection::update('mw_news', [
            'views' => $news['views'] + 1
        ], [
            'id' => $news['id']
        ], [
            'integer'
        ]);

        if (!empty($news['link'])) {
            App::redirect($news['link']);
        } else {
            View::display('MithosNews.view', compact('news'));
        }
    }

});