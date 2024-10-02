<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/page' => [[['_route' => 'app_page', '_controller' => 'App\\Controller\\PageController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'inicio', '_controller' => 'App\\Controller\\PageController::inicio'], null, null, null, false, false, null]],
        '/newUser' => [[['_route' => 'New_User', '_controller' => 'App\\Controller\\PageController::newUser'], null, null, null, false, false, null]],
        '/NewPost' => [[['_route' => 'New_Post', '_controller' => 'App\\Controller\\PageController::newPost'], null, null, null, false, false, null]],
        '/AllUsers' => [[['_route' => 'All_users', '_controller' => 'App\\Controller\\PageController::allusers'], null, null, null, false, false, null]],
        '/AllPosts' => [[['_route' => 'All_Posts', '_controller' => 'App\\Controller\\PageController::AllPosts'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/Find(?'
                    .'|UserId(?:/([^/]++))?(*:197)'
                    .'|PostId(?:/([^/]++))?(*:225)'
                .')'
                .'|/Modify(?'
                    .'|User(?:/([^/]++))?(*:262)'
                    .'|Post(?:/([^/]++))?(*:288)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        197 => [[['_route' => 'Find_User_Id', 'id' => null, '_controller' => 'App\\Controller\\PageController::FindUserId'], ['id'], null, null, false, true, null]],
        225 => [[['_route' => 'Find_Post_Id', 'id' => null, '_controller' => 'App\\Controller\\PageController::FindPostId'], ['id'], null, null, false, true, null]],
        262 => [[['_route' => 'ModifyUser', 'id' => null, '_controller' => 'App\\Controller\\PageController::ModifyUser'], ['id'], null, null, false, true, null]],
        288 => [
            [['_route' => 'ModifyPost', 'id' => null, '_controller' => 'App\\Controller\\PageController::ModifyPost'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
