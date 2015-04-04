<?php

/**
*
* Disable Colours [English]
*
* @package language
* @version $Id$
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
		exit;
}
if (empty($lang) || !is_array($lang))
{
		$lang = array();
}

$lang = array_merge($lang, array(
	'DISABLE_COLOURS_ALLOW_POST_COLOR'	=> 'Allow use of [COLOR] BBCode tag in posts',
	'DISABLE_COLOURS_ALLOW_POST_COLOR_EXPLAIN'	=> 'If disallowed the [COLOR] BBCode tag is disabled in posts.'
));
