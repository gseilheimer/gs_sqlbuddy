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

   // GET PARAMS
   ////////////////////////////////////////////////////////////////////////////////
   $page       = rex_request('page', 'string');
   $subpage    = rex_request('subpage', 'string');
   #$func    	= rex_request('func', 'string');
   #$oid     	= rex_request('oid', 'int');

   //////////////////////////////////////////////////////////////////////////////////
   // SUBPAGES
   //////////////////////////////////////////////////////////////////////////////////

   // REX BACKEND LAYOUT TOP
   //////////////////////////////////////////////////////////////////////////////
   if ($subpage != "sqlbuddy") {
      require $REX['INCLUDE_PATH'] . '/layout/top.php';
   }

   echo '<div id="rex-addon-output">';

   // TITLE & SUBPAGE NAVIGATION
   //////////////////////////////////////////////////////////////////////////////
   if ($subpage != "sqlbuddy") {
      rex_title("SQL Buddy", $REX['ADDON'][$page]['SUBPAGES']);
   }

   // JS SCRIPT FÜR LINKS IN POPUP
   ////////////////////////////////////////////////////////////////////////////////

   echo '
      <script type="text/javascript">

         // Semicolon (;) to ensure closing of earlier scripting
         // Encapsulation
         // $ is assigned to jQuery
         ;(function($)
         {
              // DOM Ready
             $(function()
             {
                 // Binding a click event
               $("a.fancyboxStyleInline-sqlBuddy").fancybox(
               {
                  "width":"95%",
                  "height":"95%",
                  "autoSize":false,
                  "transitionIn":"none",
                  "transitionOut":"none",
                  "overlayOpacity":0.8,
                  "overlayColor":"#000",
                  "type":"iframe"
               });
               //$("start-sqlbuddy-form").submit();
             });
         })(jQuery);

      </script >';

   // INCLUDE REQUESTED SUBPAGE
   //////////////////////////////////////////////////////////////////////////////

   if($subpage != "")
   {
       switch($subpage)
       {
           case 'readme':
           {
               break;
           }
           case 'sqlbuddy':
           {
               break;
           }
           default:
           {
              $subpage = "index";
           }
       }
       require $REX["INCLUDE_PATH"]."/addons/$page/pages/$subpage.inc.php";
   }
   else
   {
      echo '<h2 class="rex-hl2">'.$I18N->msg($page.'_subpage_index').'</h2 >';

      echo '<div class="rex-addon-content" >';
         echo '<p class="rex-code">';
            echo '<code ><span style = "color: #000000" > ';

             echo $I18N->msg($page.'_subpage_index_txt_01') . "<br />";
             echo $I18N->msg($page.'_subpage_index_txt_01_01') . "<br />";
             echo $I18N->msg($page.'_subpage_index_txt_01_02') . "<br />";

            echo '</span ></code >';
         echo '</p >';
      echo '</div >';

      echo '<div class="rex-addon-output" > ';
         echo '<div class="rex-addon-content" > ';

         echo '<a class="fancyboxStyleInline-sqlBuddy" href="index.php?page='.$page.'&subpage=sqlbuddy"> SQL BUDDY &ouml;ffnen </a >';

         echo '</div >';
      echo '</div >';
   }

   // REX BACKEND LAYOUT BOTTOM
   //////////////////////////////////////////////////////////////////////////////
   echo '</div >';

   if($subpage != "sqlbuddy")
   {
      require $REX['INCLUDE_PATH'] . "/layout/bottom.php";
   }

?>