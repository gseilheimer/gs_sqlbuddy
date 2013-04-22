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
 * fancybox Lib
 * @link http://fancybox.net/
 * @version 1.3.4
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
   $REX['ADDON']['page'][$page]          = $page;
   $REX['ADDON']['version'][$page]       = '0.9.7';
   $REX['ADDON']['author'][$page]        = 'Gilbert Seilheimer';
   $REX['ADDON']['supportpage'][$page]   = 'forum.redaxo.org';
   $REX['ADDON']['perm'][$page]          = $page.'[]';
   $REX['PERM'][]                        = $page.'[]';


   if( $REX['REDAXO'] && $REX['USER'] )
   {
      //////////////////////////////////////////////////////////////////////////////////
      // SUBPAGES
      //////////////////////////////////////////////////////////////////////////////////

      // Sprachdateien anhaengen
      $I18N->appendFile($REX['INCLUDE_PATH'].'/addons/'.$page.'/lang/');

      // NAV SUBPAGES
      $REX['ADDON'][$page]['SUBPAGES'] =
         //        subpage,      label,                                  perm,   params, attributes
         array(
             array('',           $I18N->msg($page.'_subpage_index'),      '',     '',     ''),
             array('readme',     $I18N->msg($page.'_subpage_readme'),     '',     '',     ''),
         );

      //////////////////////////////////////////////////////////////////////////////////
      // INCLUDES
      //////////////////////////////////////////////////////////////////////////////////
      #require_once $addon_root.'....inc.php';

      //////////////////////////////////////////////////////////////////////////////////
      // FUNCTIONS
      //////////////////////////////////////////////////////////////////////////////////

      function gs_sqlbuddy_header( $params )
      {
         global $REX;

         if( TRUE == $REX["REDAXO"] && "gs_fancybox" == $REX['ADDON']['page'][$page] )
         {
            $params['subject'] .= "\n  ".'<!-- GS:SQLBUDDY-START -->';
            $params['subject'] .= "\n  ".'<link rel="stylesheet" type="text/css" href="../files/addons/gs_fancybox/jquery.fancybox-1.3.4.css" media="screen, projection, print" />';
            $params['subject'] .= "\n  ".'<script type="text/javascript" src="../files/addons/gs_fancybox/jquery.fancybox-1.3.4.js" ></script>';
            $params['subject'] .= "\n  ".'<script type="text/javascript" src="../files/addons/gs_fancybox/jquery.fancybox-1.3.4.pack.js"></script>';
            $params['subject'] .= "\n  ".'<!-- GS:SQLBUDDY-ENDE -->';
         }
         if( TRUE == $REX["REDAXO"] && "gs_fancybox2" == $REX['ADDON']['page'][$page] )
         {
            $params['subject'] .= "\n  ".'<!-- GS:SQLBUDDY-START -->';
            $params['subject'] .= "\n  ".'<link rel="stylesheet" type="text/css" href="../files/addons/gs_fancybox2/jquery.fancybox.css" media="screen, projection, print" />';
            $params['subject'] .= "\n  ".'<script type="text/javascript" src="../files/addons/gs_fancybox2/jquery.fancybox.js" ></script>';
            $params['subject'] .= "\n  ".'<script type="text/javascript" src="../files/addons/gs_fancybox2/jquery.fancybox.pack.js"></script>';
            $params['subject'] .= "\n  ".'<!-- GS:SQLBUDDY-ENDE -->';
         }
         return $params['subject'];
      }

      rex_register_extension('PAGE_HEADER', 'gs_sqlbuddy_header');
   }

?>