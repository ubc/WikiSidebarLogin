<?php
$wgExtensionCredits['validextensionclass'][] = array(
    'path' => __FILE__,
    'name' => 'Wiki Sidebar Login',
    'author' => 'UBC CTLT', 
    'url' => 'https://www.wiki.ubc.ca', 
    'description' => 'Adds a login link to the sidebar for users who are not loggedin',
    'version'  => 1,
);


$wgHooks['SkinBuildSidebar'][] = 'lfHideSidebar';
function lfHideSidebar( $skin, &$bar ) {
    global $wgUser;
    // Hide sidebar for anonymous users
    if ( !$wgUser->isLoggedIn() ) {
        $bar = array(
            'navigation' => array(
                array(
                    'text'   => wfMsg( 'login' ),
                    'href'   => SpecialPage::getTitleFor( 'Login' )->getLocalURL(),
                    'id'     => 'n-login',
                    'active' => ''
                )
            )
        );
    }
    return true;
}