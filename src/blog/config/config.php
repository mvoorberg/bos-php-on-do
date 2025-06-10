<?php

$gServer = 'http://' . $_SERVER['HTTP_HOST'] . '/';
if (strpos($_SERVER['HTTP_HOST'], 'binaryops.') !== FALSE) {
	$gServer = 'https://binaryops.ca/';
}

return array(
    'site.baseurl'      => $gServer,   // Site URL (Global)  https://binaryops.ca/blog/
    'site.name'         => 'BinaryOps.ca',   // Site name (Global)
    'site.title'        => 'Expert Software Developers at BinaryOps.ca',  // Site default title (Global)
    'site.description'  => 'BinaryOps.ca - Software development experts.',  // Site default description (Global)
    'author.name'       => 'Admin', // Global author name
    'article.path'      => './articles',      // Path to articles
    'date.format'       => 'd M, Y',   // Date format to be used in article page (not for routes)
    'themes.path'       => './themes',  // Path to templates
    'active.theme'      => 'binaryops',  // Current active template
    'layout.file'       => 'layout',    // Site layout file
    'file.extension'    => '.md',   // file extension of articles
    'disqus.username'   => '',   // Your disqus username or false (Global)
    'markdown'          => true, //Enable of disable markdown parsing.
    'assets.prefix'     => '', // prefix to be added with assets files
    'prefix'            => '',   // prefix to be added with all URLs (not to assets). eg : '/blog'
    'google.analytics'  => false, // Google analytics code. set false to disable
    'cache' => array(
        'enabled'   => false, // Enable/Disable cache
        'expiry'    => 24, // Cache expiry, in hours. -1 for no expiry
        'path'      => './cache'
    ),
    // Define routes
    'routes' => array(
        // Site root
        '__root__'  => array(
            'route'     => '/',
            'template'  =>'index'
            // ,'layout'    => 'layout_home'  // Used for custom layout on blog home page.
        ),
        'category' => array(
            'route'     => '/category/:category',
            'template'  => 'index'
        ),
        'tag'   => array(
            'route'     => '/tag/:tag',
            'template'  => 'index'
        ),
        'tags'   => array(
            'route'     => '/tag',
            'template'  => 'tags'
        ),
        'categories'   => array(
            'route'     => '/category',
            'template'  => 'categories'
        ),
/*
        'about' => array(
            'route'     => '/about',
            'template'  => 'about'
        ),
*/
        'rss'   => array(
            'route'     => '/feed/rss(.xml)',
            'template'  => 'rss',
            'layout'    => false,
        ),
        'json'   => array(
            'route'     => '/feed/json(.json)',
            'template'  => 'json',
            'layout'    => false,
        ),
        'latest'   => array(
            'route'     => '/feed/latest',
            'template'  => 'latest',
            'layout'    => false,
        ),
        'atom'  => array(
            'route'     => '/feed(/atom(.xml))',
            'template'  => 'atom',
            'layout'    => false,
        ),
        'sitemap' => array(
            'route'     => '/sitemap(.xml)',
            'template'  => 'sitemap',
            'layout'    => false,
        ),
        'archives' => array(
            'route'     => '/archives(/:year(/:month(/:date)))',
            'template'  => 'archives',
            'conditions'=> array(
                'year'      => '(19|20)\d\d',
                'month'     =>'([1-9]|[01][0-2])'
            )
        ),
        'article' => array(
			// We don't want dates in our routes!
            // 'route'     => '/:year/:month/:date/:article',
            'route'     => '/:article',
            'template'  =>'article',
            'conditions'    => array(
                 'year'     => '(19|20)\d\d'
                ,'month'    =>'([1-9]|[01][0-9])'
                ,'date'     =>'([1-9]|[0-3][0-9])'
            )
        )
    )
);
