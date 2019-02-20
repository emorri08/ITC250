<?php
// ********************************************************* //
// *                                                       * //
// * index.php                                             * //
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

require 'inc_0700/config_inc.php'; //provides configuration, pathing, and error handling.

$config->titleTag = 'Welcome to Dana\'s House of Flaming Flatulence!'; //Page Title

get_header(); //gets the header
?>

<div id="pageContent" class="container">
    <h2 id="welcomeTxt" class="headline">Come see us for all your flaming flatulence needs!</h2>
    <p class="bodyTxt">Check out our menu for Taco Tuesday and other specials!</p>
    <a href="item-demo.php" id="menuLink">Order Here!</a>
</div>

<?php
get_footer();
?>