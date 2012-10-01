<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Provider\FormServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Faceboo\Provider\FacebookServiceProvider;
use Symfony\Component\HttpFoundation\Request;
$app = new Silex\Application();

$app['debug'] = true;

$app
		->register(new Silex\Provider\TwigServiceProvider(),
				array('twig.path' => __DIR__ . '/../src/resources/views',));
$app->register(new FormServiceProvider());

$app
		->register(new Silex\Provider\MonologServiceProvider(),
				array('monolog.logfile' => __DIR__ . '/../logs/development.log',));
// $app
// 		->register(new Silex\Provider\TranslationServiceProvider(),
// 				array('locale_fallback' => 'en',));

$app['facebook.class_path'] = __DIR__ .'/../vendor/facebook/php-sdk/src/';

$app->register(new Faceboo\Provider\FacebookServiceProvider(), array(
		'facebook.app_id' => 'FB_APP_ID',
		'facebook.secret' => 'FB_APP_SECRET',
		'facebook.namespace' => 'FB_APPNAME'
));

$pages = array('/' => 'homepage', 'error'=>'error');

$app->before(function(Request $request) use ($app) {
	if ($response = $app['facebook']->protect()) return $response;
});

foreach ($pages as $route => $view) {
	$app
			->get($route,
					function () use ($app, $view) {
						if ($response = $app['facebook']->auth())
						{
							return $app['twig']->render($view . '.html.twig');
						}
						else
						{
							return $app['twig']->render('error.html.twig');
						}
					})->bind($view);
}

$app->run();
