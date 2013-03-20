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

   // GET PARAMS
   ////////////////////////////////////////////////////////////////////////////////
   $page    = rex_request('page', 'string');
   $subpage = rex_request('subpage', 'string');
   #$func   = rex_request('func', 'string');

   // START SQLBUDDY
   ////////////////////////////////////////////////////////////////////////////////
   if (isset($REX['ADDON'][$page]))
   {
      echo '
         <div class="rex-addon-output" style="display: none">

            <form id="start-sqlbuddy-form" action="' . $REX['HTDOCS_PATH'] . 'files/addons/' . $page . '/login.php" method="POST">
                <input type="hidden" name="USER"        value="' . $REX['DB']['1']['LOGIN'] . '" />
                <input type="hidden" name="HOST"        value="' . $REX['DB']['1']['HOST'] . '" />
                <input type="hidden" name="PASS"        value="' . $REX['DB']['1']['PSW'] . '" />
                <input type="hidden" name="DATABASE"    value="' . $REX['DB']['1']['NAME'] . '" />
                <input type="hidden" name="ADAPTER"     value="mysql" />
                <input class="rex-form-submit" type="submit"  value="Verbindung zum Server aufbauen..." />
            </form>

         </div>
         <script type="text/javascript">
            document.getElementById("start-sqlbuddy-form").submit();
         </script>';
   }

?>