<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Route Definitions from old codebase
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('events', ['as' => 'events', function () {
    return view('events.index');
}]);

Route::get('contact', ['as' => 'contact', function () {
    return view('contact');
}]);

Route::get('blog', ['as' => 'blog', function () {
    return view('blog');
}]);


// Membership

Route::group(['as' => 'membership::'], function () {
  Route::get('membership/join', ['as' => 'join', function () {
    if (env('SIGNUPS_ENABLED', true))
    {
        return view('membership.join');
    }
    else
    {
        return view('membership.join-inactive');
    }
  }]);

  Route::get('join', function () {
    return redirect('membership/join');
  });

  Route::get('membership/purchase', ['as' => 'purchase', function () {
    return view('membership.purchase');
  }]);
});

// API

Route::group(['prefix' => 'api', 'namespace' => 'API', 'as' => 'API::'], function() {
  Route::post('membership/purchase', ['as' => 'submitpurchase', 'uses' => 'MembershipController@submitPurchase']);
});


// External Redirects

Route::group(['as' => 'social::'], function () {
  Route::get('twitter', ['as' => 'twitter', function () {
    return redirect('https://twitter.com/thesgda');
  }]);

  Route::get('shirt', ['as' => 'shirt', function () {
    return redirect('https://www.cornerstoneimpressions.com/products/utd-sgdb-design-develop-discuss-spring-18-shirts');
  }]);


  Route::get('steam', ['as' => 'steam', function () {
    return redirect('https://steamcommunity.com/groups/UTDSGDA');
  }]);

  Route::get('facebook', ['as' => 'facebook', function () {
    return redirect('https://www.facebook.com/groups/UTDSGDA/');
  }]);

  Route::get('discord', ['as' => 'discord', function () {
    return redirect('https://discord.gg/msvbxJP');
  }]);
});

Route::group(['as' => 'special::'], function () {
  Route::get('newsletter', ['as' => 'newsletter', function () {
    return redirect('http://wordpress.us9.list-manage.com/subscribe?u=f921145fe669f08c3392649e5&id=c6d0adccd5');
  }]);
});
