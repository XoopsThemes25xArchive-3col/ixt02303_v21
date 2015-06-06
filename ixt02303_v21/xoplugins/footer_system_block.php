<?php
/*
* Qualitative Themes for XOOPS
*
* @license       http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @project       IXThemes Project, http://ixthemes.org
* @theme_name    ixt02303
* @theme_demo    http://ixthemes.sourceforge.net/demo/x/index.php?xoops_theme_select=ixt02303
* @theme_author  Alexander Galochkin (algalochkin at users.sourceforge.net)
* @version       $Id: footer_system_block.php 1808 2009-12-15 18:08:32Z algalochkin $
*
* Thanks you, that you have left this header untouched!!!
*/
/*
* system blocks id & templates:
*  1 - system_block_user.html
*  2 - system_block_login.html
*  3 - system_block_search.html
*  4 - system_block_waiting.html
*  5 - system_block_mainmenu.html
*  6 - system_block_siteinfo.html
*  7 - system_block_online.html
*  8 - system_block_topusers.html
*  9 - system_block_newusers.html
* 10 - system_block_comments.html
* 11 - system_block_notification.html
* 12 - system_block_themes.html
*/

	// since ImpressCMS 1.2
	if (!class_exists('IcmsBlock')){
		$xobject = new XoopsBlock($block_id);
	} else {
		if (function_exists('xoops_gethandler')){
			$block_handler = xoops_gethandler('block');
			// getByModule($moduleid, $asobject=true)
			// system module id = 1
			$block_arr = $block_handler->getByModule(1, true);
			$xobject = $block_arr[$block_id - 1];
		}
	}
 $template = new XoopsTpl();
	$block = array(
		'id'        => $xobject->getVar( 'bid' ),
		'module'    => $xobject->getVar( 'dirname' ),
		'title'     => $xobject->getVar( 'title' ),
		'weight'    => $xobject->getVar( 'weight' ),
		'lastmod'   => $xobject->getVar( 'last_modified' ),
	);
	$tplName = ( $tplName = $xobject->getVar('template') ) ? "db:$tplName" : "db:system_block_dummy.html";
	if ( $bresult = $xobject->buildBlock() ) {
		$template->assign( 'block', $bresult );
		$block['content'] = $template->fetch($tplName);
	} else {
		$block = false;
	}
	$this->assign('fblock', $block);
?>