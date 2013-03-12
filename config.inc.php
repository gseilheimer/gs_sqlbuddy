<?php

/**
 * SQLBUDDY
 *
 * @author gilbert.seilheimer[at]contic[dot]de Gilbert Seilheimer
 * @author <a href="http://www.contic.de">www.contic.de</a>
 *
 * @package redaxo4
 * @version svn:$Id$
 */
/**
 * SQLBuddy Lib
 * @link https://github.com/calvinlough/sqlbuddy
 * @version 1.3.3
 */
/**
 * jquery popup
 * @link http://dinbror.dk/bpopup/
 */

// AddOn-SQLBUDDY

    //////////////////////////////////////////////////////////////////////////////////
    // CONFIG
    //////////////////////////////////////////////////////////////////////////////////

    // VARs
    $page = "gs_sqlbuddy";
    $page_root = $REX['INCLUDE_PATH'].'/addons/'.$page.'/';

    // VARs - ADDON
    $REX['ADDON']['name'][$page]          = 'SQL Buddy';
    $REX['ADDON']['rxid'][$page]          = '1056';
    $REX['ADDON']['page'][$page]          = "sqlbuddy";
    $REX['ADDON']['perm'][$page]          = 'sqlbuddy[]';
    $REX['ADDON']['version'][$page]       = '1.3.3';
    $REX['ADDON']['author'][$page]        = 'Gilbert Seilheimer';
    $REX['ADDON']['supportpage'][$page]   = 'forum.redaxo.org';
    $REX['PERM'][] = 'sqlbuddy[]';


    if($REX['REDAXO'] && $REX['USER'])
    {
        //////////////////////////////////////////////////////////////////////////////////
        // SUBPAGES
        //////////////////////////////////////////////////////////////////////////////////

        // Sprachdateien anhaengen
        $I18N->appendFile($REX['INCLUDE_PATH'].'/addons/'.$page.'/lang/');

        $REX['ADDON'][$page]['SUBPAGES'] = array();
        $REX['ADDON'][$page]['SUBPAGES'][] = array( '' , $I18N->msg("addon_name"));
        if ($REX['USER']->isAdmin())
        {
            $REX['ADDON'][$page]['SUBPAGES'][] = array ('sqlbuddy' , $I18N->msg("addon_subpage_sqlbuddy"));
        }

        $REX['ADDON'][$page]['SUBPAGES'] =
            //        subpage,    label,                                  perm,   params, attributes
            array(
                array('',           $I18N->msg('addon_subpage_index'),      '',     '',     ''),
                array('readme',     $I18N->msg('addon_subpage_readme'),     '',     '',     '')
            );

        //////////////////////////////////////////////////////////////////////////////////
        // INCLUDES
        //////////////////////////////////////////////////////////////////////////////////
        #require_once $addon_root.'functions/function.a1056_commons.inc.php';


        //////////////////////////////////////////////////////////////////////////////////
        // FUNCTIONS
        //////////////////////////////////////////////////////////////////////////////////

        function gs_sqlbuddy_header($params)
        {
            global $REX;

            if( TRUE == $REX["REDAXO"] )
            {
                $params['subject'] .= "\n  ".'<link rel="stylesheet" type="text/css" href="../files/addons/gs_sqlbuddy/jquery.bpopup.min.css" media="screen, projection, print" />';
                $params['subject'] .= "\n  ".'<script src="../files/addons/gs_sqlbuddy/jquery.bpopup.min.js" type="text/javascript"></script>';
            }
            return $params['subject'];
        }

        rex_register_extension('PAGE_HEADER', 'gs_sqlbuddy_header');
    }

?>