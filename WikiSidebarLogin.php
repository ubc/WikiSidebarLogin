<?php
$wgExtensionCredits['validextensionclass'][] = array(
    'path' => __FILE__,
    'name' => 'Wiki Sidebar Login',
    'author' => 'UBC CTLT',
    'url' => 'https://wiki.ubc.ca',
    'description' => 'Adds a login link to the sidebar for users who are not loggedin',
    'version'  => 1,
);


$wgHooks['SkinBuildSidebar'][] = 'lfHideSidebar';
function lfHideSidebar( $skin, &$bar ) {
    global $wgUser, $wgServerName, $wgTitle;
    // Hide sidebar for anonymous users
    if ( !$wgUser->isLoggedIn() ) {

        $currentTitle  =  $wgTitle->getPrefixedText();

        if( !preg_match('/UserLogin/',$currentTitle)  ){
                $sb_referral .= $currentTitle;
        }else{
                $sb_referral .= "Main_Page";
        }



        $bar = array(
            'navigation' => array(
                array(
                    'text'   => wfMsg( 'login' ),
                    'href' => "https://$wgServerName/index.php?title=Special:UserLogin&returnto=$sb_referral",
                    'id'     => 'n-login',
                    'active' => ''
                )
            )
        );
    }
    return true;
}
