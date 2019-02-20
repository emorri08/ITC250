<?php
/**
// ********************************************************* //
// *                                                       * //
// * meta_inc.php                                          * //
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
 * meta_inc.php provides meta tag, title tag and JS in an easy to copy in include file 
 *
 * Properties of the $config object provide default (fallback) values for 
 */

?>
	<!-- start of meta include file -->
	<title><?php echo $config->titleTag;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="description" content="<?php echo $config->metaDescription; ?>" />
	<meta name="keywords" content="<?php echo $config->metaKeywords; ?>" />
	<meta name="robots" content="<?php echo $config->metaRobots; ?>" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="-1" />
	<script language="JavaScript" type="text/javascript">
		<!-- This JS disallows hijacking into someone else's frame...
		 if (top.location != self.location){top.location=self.location}
		//-->
	</script>
	<?php echo $config->loadhead; ?>
	<!-- end of meta include file -->