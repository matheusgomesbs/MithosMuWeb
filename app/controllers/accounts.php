<?php

use Mithos\Account\Account;
use Mithos\Account\Auth;
use Mithos\Core\Validation;
use Mithos\Network\Mail;

Route::post('/login', function () {

    if (Auth::login(Input::post('username'), Input::post('password'))) {
        echo json_encode([
            'success' => true, 
            'redirect' => '/',
            'partial' => 'login'
        ]);
    } else {
        echo json_encode([
            'success' => false, 
            'message' => __('Usuário e/ou senha estão incorretos')
        ]);
    }

});

Route::get('/logout', function () {

    Auth::logout();
    App::redirect('/');

});

Route::map('/register', function () {

    if (Request::isGet()) {
        View::display('accounts/register');
    } else {
        $validation = new Validation(Input::post(), [
            'name' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'username' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Usuário já existente') => [
                    'rule' => ['isUnique', 'MEMB_INFO', 'memb___id']
                ]
            ],
            'password' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'repassword' => [
                __('Campos de senha não são iguais') => [
                    'rule' => ['equals', 'password']
                ]
            ],
            'email' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Email em formato inválido') => [
                    'rule' => 'email'
                ],
                __('Email já existente') => [
                    'rule' => ['isUnique', 'MEMB_INFO', 'mail_addr']
                ]
            ],
            'reemail' => [
                __('Campo obrigatório') => [
                    'rule' => ['equals', 'email']
                ]
            ],
            'pid' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                'Digite apenas números' => [
                    'rule' => 'numeric'
                ]
            ],
            'secret_question' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'secret_answer' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'captcha' => [
                __('Valor incorreto') => [
                    'rule' => 'captcha'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            $account = new Account();
            $account->setName(Input::post('name'))
                    ->setUsername(Input::post('username'))
                    ->setPassword(Input::post('password'))
                    ->setEmail(Input::post('email'))
                    ->setSecretQuestion(Input::post('secret_question'))
                    ->setSecretAnswer(Input::post('secret_answer'))
                    ->setBlocked(false)
                    ->setConfirmedEmail(!config('register.confirm_email'))
                    ->setPersonalId(Input::post('pid'));

            if (config('register.bonus.vip.type')) {
                $account->setVipType(config('register.bonus.vip.type'))
                        ->setVipExpire(new \DateTime('+ ' . config('register.bonus.vip.days', 0) . ' days'));
            }
        
            try {
                $account->insert();
            
                if (config('register.confirm_email')) {
                
                    $mail = new Mail();
                    $mail->addAddress(Input::post('email'), Input::post('name'))
                            ->setSubject('dajdjoiaj')
                            ->setMessageFromTemplate('confirm-email', ['account' => $account]);

                    if ($mail->send()) {
                        success(__('Cadastro realizado com sucesso'), ['redirect' => '/register']);
                    } else {
                        error($mail->getError());
                    }
                } else {
                    success(__('Cadastro realizado com sucesso'), ['redirect' => '/register']);
                }
            } catch (\Exception $ex) {
                error($ex->getMessage());
            }
        
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST');


Route::map('/forgot', function () {

    if (Request::isGet()) {
        View::display('accounts/forgot');
    } else {
        $validation = new Validation(Input::post(), [
            'username' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'email' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ],
                __('Email em formato inválido') => [
                    'rule' => 'email'
                ]
            ],
            'captcha' => [
                __('Valor incorreto') => [
                    'rule' => 'captcha'
                ]
            ]
        ]);
    
        if ($validation->isValid()) {
            $account = new Account(Input::post('username'));
            if ($account->exists()) {
                if ($account->getEmail() === Input::post('email')) {
                    try {
                        $mail = new Mail();
                        $mail->addAddress($account->getEmail(), $account->getName())
                                ->setSubject(config('server.name') . ' - Recuperar senha')
                                ->setMessageFromTemplate('forgot', ['account' => $account]);
                            
                        if ($mail->send()) {
                            success(__('Sua senha foi enviada por e-mail'), ['redirect' => '/forgot']);
                        } else {
                            error($mail->getError());
                        }

                    } catch (\Exception $ex) {
                        error($ex->getMessage());
                    }
                } else {
                    error(__('Dados informados não conferem'));
                }
            } else {
                error(__('Dados informados não conferem'));
            }
        } else {
            error($validation->getErrors());
        }
    }
    
})
->via('GET', 'POST');

Route::get('/account/last-connections', require_auth(), function () {

    $account = user();

    View::service('accounts/last-connections', 'account', [
        'connections' => $account->getLastConnections()
    ]);

});


Route::map('/account/change-password', require_auth(), function () {

    $account = Auth::getAccount();
    if (Request::isGet()) {

        View::service('accounts/change-password', 'account');

    } else {
        $validation = new Validation(Input::post(), [
            'current_password' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'password' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ],
            'repassword' => [
                __('Campo obrigatório') => [
                    'rule' => 'notEmpty'
                ]
            ]
        ]);

        if ($validation->isValid()) {
            if ($account->getPassword() !== Input::post('current_password')) {
                error(__('Senha atual incorreta'));
            } else {
                try {
                    $account->setPassword(Input::post('password'));
                    $account->update();

                    success(__('Senha alterada com sucesso'), [
                        'redirect' => '/account/change-password'
                    ]);
                } catch (Exception $ex) {
                    error($ex->getMessage());
                }
            }
        } else {
            error($validation->getErrors());
        }
    }

})
->via('GET', 'POST');