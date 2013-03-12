<?php

 /** 
 * SQLBUDDY
 *
 * @author gilbert.seilheimer@contic.de
 *
 * @package redaxo4
 * @version svn:$Id$
 */

// AddOn-SQLBUDDY

   //////////////////////////////////////////////////////////////////////////////////
   // CONFIG
   //////////////////////////////////////////////////////////////////////////////////

   // VARs
   $addon_name = "gs_sqlbuddy";

   // Installationsbedingungen pruefen
   $addon_requiered_rex = '4.4.1';
   $addon_requiered_php = 5;
   $addon_requiered_addons = array('textile');
   $check_ok = true;
   
   //////////////////////////////////////////////////////////////////////////////////
   // CHECKS
   //////////////////////////////////////////////////////////////////////////////////

   // REX VERSION
   $this_rex = $REX['VERSION'].'.'.$REX['SUBVERSION'].'.'.$REX['MINORVERSION'] = "1";
   if(version_compare($this_rex, $addon_requiered_rex, '<'))
   {
      $REX['ADDON']['installmsg'][$addon_name] = 'Dieses Addon ben&ouml;tigt Redaxo Version '.$addon_requiered_rex.' oder h&ouml;her.';
      $REX['ADDON']['install'][$addon_name] = 0;
      $check_ok = false;
   }
   
   // PHP VERSION
   if (intval(PHP_VERSION) < $addon_requiered_php)
   {
      $REX['ADDON']['installmsg'][$addon_name] = 'Dieses Addon ben&ouml;tigt mind. PHP '.$addon_requiered_php.'!';
      $REX['ADDON']['install'][$addon_name] = 0;
      $check_ok = false;
   }

   // CHECK ADDONS
   foreach($addon_requiered_addons as $a)
   {
      if (!OOAddon::isInstalled($a))
      {
         $REX['ADDON']['installmsg'][$addon_name] = '<br />Addon "'.$a.'" ist nicht installiert.  >>> <a href="index.php?page=addon&addonname='.$a.'&install=1">jetzt installieren</a> <<<';
         $check_ok = false;
      }
      else
      {
         if (!OOAddon::isAvailable($a))
         {
            $REX['ADDON']['installmsg'][$addon_name] = '<br />Addon "'.$a.'" ist nicht aktiviert.  >>> <a href="index.php?page=addon&addonname='.$a.'&activate=1">jetzt aktivieren</a> <<<';
            $check_ok = false;
         }
      }
   }

   //////////////////////////////////////////////////////////////////////////////////
   // INSTALL
   //////////////////////////////////////////////////////////////////////////////////	
   if ($check_ok)
   {
      $REX['ADDON']['install'][$addon_name] = 1;
   }
