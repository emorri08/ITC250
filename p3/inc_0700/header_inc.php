<?php
/**
// ********************************************************* //
// *                                                       * //
// * header_inc.php                                        * //
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
 *
 * An include file named meta_inc.php includes all meta data, title tag and a place to 
 * install JS via a variable named $loadHead
 */
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">\n"; //xml uses ?, so we escape it
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include INCLUDE_PATH . 'meta_inc.php'; ?>
	<style type="text/css">
	 .somethingcouldgohere {}
	</style>
	<link rel="stylesheet" href="inc_0700/style.css" />
</head>
<body>
	
<table width="100%" cellpadding="5" cellspacing="0" margin="0">
      <!-- change header color here -->
	<tr>
		<td colspan="3">
	  		 <h1 align="center"><?php echo $config->banner;?></h1>
		</td>
  	</tr>
	<tr>
	      <!-- change left panel color here -->
      	
            <!-- change guts/identity area color here -->
		<td valign="top">
		<?=showFeedback();?>
		<!-- end of header include file -->
	 