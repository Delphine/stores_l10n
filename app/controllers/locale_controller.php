<?php
namespace Stores;

// format of an URL: http://localhost:8082/locale/de/google/beta/output/

$formats = ['html', 'show', 'status'];
$components = explode('/', $url['path']);

$request = [
    'locale'  => isset($components[1]) ? $components[1] : null,
    'store'   => isset($components[2]) ? $components[2] : null,
    'channel' => isset($components[3]) ? $components[3] : null,
    'output'  => isset($components[4]) ? $components[4] : null,
];

if (! in_array($request['store'], ['google', 'apple'])) {
    die('Unknown marketplace provider.');
}

if (! in_array($request['channel'], ['beta', 'release'])) {
    die('This Firefox channel is not supported.');
}

if ($request['store'] == 'google') {
    switch ($request['channel']) {
        case 'beta':
            $locales = $project->getGoogleMozillaCommonLocales('beta');
            $view  = 'play_locale_beta';

            if ($request['output'] == 'html') {
                $view  = 'play_locale_beta_escaped';
            }
            break;
        case 'release':
            $locales = $project->getGoogleMozillaCommonLocales('release');
            $view  = 'play_locale_release';

            if ($request['output'] == 'html') {
                $view  = 'play_locale_release_escaped';
            }
        default:
            $locales = $project->getGoogleMozillaCommonLocales('release');
            break;
    }
}

if ($request['store'] == 'apple') {
    switch ($request['channel']) {
        case 'release':
        default:
            $locales = $project->getAppleMozillaCommonLocales('release');
            break;
    }
}

if (! in_array($request['locale'], $locales)) {
    die('Not a locale code supported by Firefox');
}

$title = "Store Description for: {$request['locale']}";

if (! isset($request['output'])) {
    $request['output'] = 'show';
}

$template = 'html.php';

include MODELS . 'locale_model.php';
include VIEWS . $view . '_view.php';
