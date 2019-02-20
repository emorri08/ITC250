<?php
/**
// ********************************************************* //
// *                                                       * //
// * admin_only.php                                        * //
// *                                                       * //
// * Dana's Flaming House of Flatulence                    * //
// *                                                       * //
// * @package Taco Truck                                   * //
// * @author Group 3 <emorri08@seattlecentral.edu>         * //
// * @version 1.3 2019/02/12                               * //
// * @link http://ellycodes.com/                           * //
// * @license https://www.apache.org/licenses/LICENSE-2.0  * //
// *                                                       * //
// ********************************************************* //
 * admin_only_inc.php session protection include for restricting access to administrative areas
 *
 * Checks for AdminID session variable, and forcibly redirects users not logged in
 */

startSession(); # wrapper for session_start()
if(!isset($_SESSION['AdminID']))
{ //no session var
	$myProtocol = strtolower($_SERVER["SERVER_PROTOCOL"]); # Cascade the http or https of current address
	if(strrpos($myProtocol,"https")>-1){$myProtocol = "https://";}else{$myProtocol = "http://";}
	$myURL = $_SERVER['REQUEST_URI'];  #Path derives properly on Windows & UNIX. alternatives: SCRIPT_URL, PHP_SELF
	$_SESSION['red'] = $myProtocol . $_SERVER['HTTP_HOST'] . $myURL;
    feedback("Your session has timed out.  Please login."); 
	myRedirect($config->adminLogin);
}else{
	if(!isset($access)|| $access == ""){$access = "admin";}//empty becomes admin 
	$access = strtolower($access); //in case of typo
	switch($access)
	{
		case "admin": 
			break;
		case "superadmin":
			# not developer/superadmin, back to admin page
			if($_SESSION['Privilege']!="developer" && $_SESSION['Privilege']!="superadmin")
			{
				feedback("Your admin privileges do not allow access to the previous page."); 
				myRedirect($config->adminDashboard);
			}
			break;
		case "developer": //highest level. all access!
			# not developer to admin page
			if($_SESSION['Privilege']!="developer")
			{
				feedback("Your admin privileges do not allow access to the previous page."); 
				myRedirect($config->adminDashboard);	
			}
			break;		
		break;
	}
}	
?>
