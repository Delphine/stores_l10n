<?php
namespace Stores;

// Include closure needed in template
include INC . 'utilities.php';

$description = function ($translate) use ($_) {
    $replacements = [
        '{{android_bugs}}'     => 'http://mzl.la/android_bugs',
        '{{permission_link}}'  => 'http://mzl.la/Permissions',
        '{{mozilla_org_link}}' => 'https://www.mozilla.org',
        '{{sys_req}}'          => 'https://www.mozilla.org/en-US/firefox/mobile/platforms/',
    ];

    return <<<OUT
{$_('Want a fast, smart & safe mobile browser? Get the official free Firefox Beta browser!')}
<br>
{$_("Help refine and polish the newest features almost ready for prime time.")}
{$_("With Firefox Beta, you get to test the latest performance, customization and security enhancements before they make it to our next version.")}
{$_("Have an impact by helping to put the finishing touches on features and functionality.")}

<br><b>{$_("We need your help testing Intel x86 Atom based devices! If you have an Intel x86 Atom based device, download Firefox Beta and tell us what you think.")}</b>

<br>{$_("Find a bug? Report it at {{android_bugs}}.", $replacements)}
<br>{$_("Want to know more about the permissions Firefox requests? {{permission_link}}", $replacements)}
<br>{$_("See our list of supported devices and latest minimum system requirements at https://www.mozilla.org/en-US/firefox/mobile/platforms/.")}

<b>{$_('ABOUT MOZILLA')}</b>
{$_("Mozilla is a proudly non-profit organization dedicated to keeping the power of the Web in people's hands.")}
{$_("We're a global community of users, contributors and developers working to innovate on your behalf.")}
{$_('When you use Firefox, you become a part of that community, helping us build a brighter future for the Web.')}
{$_('Learn more at {{mozilla_org_link}}.', $replacements)}
OUT;
};

$short_desc = function ($translate) use ($_) {
    return $_('Want a fast, smart & safe mobile browser? Get the official free Firefox Beta browser!');
};

$app_title = function ($translate) use ($_) {
    return $_('Firefox for Android Beta');
};
