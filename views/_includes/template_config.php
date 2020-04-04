<?php
/**
 * config.php
 *
 * Author: igorbrandao
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

/* Template variables */
$template = array(
    'initials'          => 'KPV',
    'name'              => 'KEGG Pathway Viewer',
    'version'           => 'v0.6.5',
    'author'            => 'Igor Brandão',
    'email'             => 'igorabrandao@gmail.com',
    'website'           => 'https://igorabrandao.com.br/',
    'robots'            => 'noindex, nofollow',
    'title'             => 'KPV - KEGG Pathway Viewer',
    'headline'          => 'The online tool to visualize and interact with KEGG metabolic pathways.',
    'description'       => 'KPV is the online tool to visualize and interact with KEGG metabolic pathways.',
    'full_description'  => 'KPV is the online tool to visualize and interact with KEGG metabolic pathways. The network elaborated in our study contemplates protein classifications according to the AP detection algorithm,
    facilitating the visual identification of the most important proteins of a network (points of articulation). 
    Additionally, our proposal provides a dynamic HTML visualizations of KEGG pathways enabling the simulation of basic operations 
    such as nodes removal and edge addition.',

    // true                     enable page preloader
    // false                    disable page preloader
    'page_preloader'    => true,
    // true                     enable main menu auto scrolling when opening a submenu
    // false                    disable main menu auto scrolling when opening a submenu
    'menu_scroll'       => true,
    // 'navbar-default'         for a light header
    // 'navbar-inverse'         for a dark header
    'header_navbar'     => 'navbar-default',
    // ''                       empty for a static layout
    // 'navbar-fixed-top'       for a top fixed header / fixed sidebars
    // 'navbar-fixed-bottom'    for a bottom fixed header / fixed sidebars
    'header'            => '',
    // ''                                               for a full main and alternative sidebar hidden by default (> 991px)
    // 'sidebar-visible-lg'                             for a full main sidebar visible by default (> 991px)
    // 'sidebar-partial'                                for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-partial sidebar-visible-lg'             for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-mini sidebar-visible-lg-mini'           for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
    // 'sidebar-mini sidebar-visible-lg'                for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)
    // 'sidebar-alt-visible-lg'                         for a full alternative sidebar visible by default (> 991px)
    // 'sidebar-alt-partial'                            for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-alt-partial sidebar-alt-visible-lg'     for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-partial sidebar-alt-partial'            for both sidebars partial which open on mouse hover, hidden by default (> 991px)
    // 'sidebar-no-animations'                          add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!
    'sidebar'           => 'sidebar-partial sidebar-visible-lg sidebar-no-animations',
    // ''                       empty for a static footer
    // 'footer-fixed'           for a fixed footer
    'footer'            => '',
    // ''                       empty for default style
    // 'style-alt'              for an alternative main style (affects main page background as well as blocks style)
    'main_style'        => '',
    // ''                           Disable cookies (best for setting an active color theme from the next variable)
    // 'enable-cookies'             Enables cookies for remembering active color theme when changed from the sidebar links (the next color theme variable will be ignored)
    'cookies'           => '',
    // 'night', 'amethyst', 'modern', 'autumn', 'flatie', 'spring', 'fancy', 'fire', 'coral', 'lake',
    // 'forest', 'waterlily', 'emerald', 'blackberry' or '' leave empty for the Default Blue theme
    'theme'             => 'flatie',
    // ''                       for default content in header
    // 'horizontal-menu'        for a horizontal menu in header
    // This option is just used for feature demostration and you can remove it if you like. You can keep or alter header's content in page_head.php
    'header_content'    => '',
    'active_page'       => basename($_SERVER['PHP_SELF']),
    'user_name'            => 'Guest',
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
    array(
        'name'  => 'General pages',
        'opt'   => '',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Home page',
        'url'   => HOME_URI,
        'icon'  => 'gi gi-home'
    ),
    array(
        'name'  => 'Tutorial',
        'url'   => HOME_URI . '/general_pages/tutorial',
        'icon'  => 'gi gi-kiosk_light'
    ),
    array(
        'name'  => 'About ' . $template['initials'],
        'url'   => HOME_URI . '/general_pages/about',
        'icon'  => 'gi gi-circle_info'
    ),
    array(
        'name'  => 'Network visualization',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Use the menu below to navigate between pages related to KEGG pathways visualization"><i class="gi gi-lightbulb"></i></a>',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Pathways list',
        'url'   => HOME_URI . '/pathway_module/list',
        'icon'  => 'gi gi-list'
    ),
    array(
        'name'  => '',
        'url'   => '',
        'icon'  => ''
    ),
    array(
        'name'  => '',
        'url'   => '',
        'icon'  => ''
    ),
    array(
        'name'  => '',
        'url'   => '',
        'icon'  => ''
    )
);