<?php
//
// +----------------------------------------------------------------------+
// | PHP version 4.0                                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2001 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Martin Jansen <mj@php.net>                                  |
// +----------------------------------------------------------------------+
//
// $Id$
//

require_once "Auth/Auth.php";

/**
 * PEAR::Auth_HTTP
 *
 * The PEAR::Auth_HTTP class provides methods for creating an
 * HTTP authentication system using PHP.
 *
 * @author  Martin Jansen <mj@php.net>
 * @package Auth_HTTP
 * @extends Auth
 * @version $Revision$
 * @todo    Clean up PHPDoc comments
 */
class Auth_HTTP extends Auth
{
    
    /**
     * Name of the realm
     *
     * @var string
     * @see draw_login()
     */
    var $realm = "protected area";

    /**
     * Text to send if user hits cancel button
     *
     * @var string
     * @see draw_login()
     */
    var $CancelText = "invalid login data";

    function assign_data()
    {
        global $PHP_AUTH_USER,$PHP_AUTH_PW;
        
        if ($PHP_AUTH_USER != "") {
            $this->username = $PHP_AUTH_USER;
        }

        if ($PHP_AUTH_PW != "") {
            $this->password = $PHP_AUTH_PW;
        }
    }

    /**
     * Launch the login box
     *
     * @param string $username  Username
     * @param string $password  Password
     */
    function draw_login($username = "", $password = "") 
    {        
        Header("WWW-Authenticate: Basic realm=\"".$this->realm."\"");
        Header("HTTP/1.0 401 Unauthorized");
        echo $this->CancelText;
        exit;
    }

    /**
     * Set name of the current realm
     *
     * @access public
     * @param  string $name  Name of the realm
     */
    function setRealm($name) {
        $this->realm = $name;
    }

    /**
     * Set the text to send if user hits the cancel button
     *
     * @access public
     * @param  string $text  Text to send
     */
    function setCancelText($text) {
        $this->CancelText = $text;
    }
}
?>
