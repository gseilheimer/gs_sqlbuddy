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

    #$mypage = "gs_sqlbuddy";

    //////////////////////////////////////////////////////////////////////////////////
    // SUBPAGES
    //////////////////////////////////////////////////////////////////////////////////

    // GET PARAMS
    ////////////////////////////////////////////////////////////////////////////////
    $page 	    = rex_request('page', 'string');
    $subpage 	= rex_request('subpage', 'string');
    #$func    	= rex_request('func', 'string');
    #$oid     	= rex_request('oid', 'int');

    // REX BACKEND LAYOUT TOP
    //////////////////////////////////////////////////////////////////////////////
    if($subpage != "sqlbuddy")
    {
        require $REX['INCLUDE_PATH'] . '/layout/top.php';
    }

    echo '<div id="rex-addon-output">';

    // TITLE & SUBPAGE NAVIGATION
    //////////////////////////////////////////////////////////////////////////////
    if($subpage != "sqlbuddy")
    {
        rex_title($I18N->msg("addon_name"),$REX['ADDON'][$page]['SUBPAGES']);
    }

    // JS SCRIPT FÜR LINKS IN POPUP
    ////////////////////////////////////////////////////////////////////////////////

    echo '
        <script type="text/javascript">

            // Semicolon (;) to ensure closing of earlier scripting
            // Encapsulation
            // $ is assigned to jQuery
            ;(function($) {

                 // DOM Ready
                $(function()
                {
                    // Binding a click event
                    // From jQuery v.1.7.0 use .on() instead of .bind()
                    $("#run-sqlbuddy").bind("click", function(e)
                    {
                        // Prevents the default action to be triggered.
                        e.preventDefault();

                        // Triggering bPopup when click event is fired
                        $("#sqlbuddy-popup").bPopup
                        ({
                            content: "iframe",
                            contentContainer: ".sqlbuddy-content",
                            loadUrl: "index.php?page='.$page.'&subpage=sqlbuddy",
                            scrollBar: true,
                        });
                    });
                });
            })(jQuery);

        </script>';


    echo '
        <div id="sqlbuddy-popup">
            <a class="b-close">x<a/>
            <div class="sqlbuddy-content"></div>
        </div>';


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
                #$open_header_only = true; // Den Redaxoadminheader ausblenden
                #include $REX['INCLUDE_PATH']."/layout/top.php";
                #rex_title(SQL-BUDDY, "&nbsp;");
                #include $REX['INCLUDE_PATH']."/addons/$mypage/pages/sqlbuddy.inc.php";
                #include $REX['INCLUDE_PATH']."/layout/bottom.php";
                break;
            default:
            {
                $subpage = "index";
            }
        }
        require $REX["INCLUDE_PATH"]."/addons/$page/pages/$subpage.inc.php";
    }
    else
    {
        echo '<h2 class="rex-hl2">'.$I18N->msg("addon_subpage_index").'</h2>';

        echo '<div class="rex-addon-content">';
            echo '<p class="rex-code">';
                echo '<code><span style="color: #000000">';

                    echo $I18N->msg('addon_subpage_index_txt_01') . "<br />";
                    echo $I18N->msg('addon_subpage_index_txt_01_01') . "<br />";
                    echo $I18N->msg('addon_subpage_index_txt_01_02') . "<br />";

                echo '</span></code>';
            echo '</p>';
        echo '</div>';

        echo '<div class="rex-addon-output">';
        echo '<div class="rex-addon-content">';

        echo '<button id="run-sqlbuddy">sqlBuddy im PopUp starten...</button>';
        #echo '<a onclick="javascript:window.open(\'index.php?page='.$mypage.'&subpage=sqlbuddy\',\'SQL-BUDDY\',\'width=960,height=800,scrollbars=yes\');" style="cursor:pointer;">Los gehts</a>';

        echo '</div>';
        echo '</div>';
    }

    // REX BACKEND LAYOUT BOTTOM
    //////////////////////////////////////////////////////////////////////////////
    echo '</div>';

    if($subpage != "sqlbuddy")
    {
        require $REX['INCLUDE_PATH'] . "/layout/bottom.php";
    }

?>