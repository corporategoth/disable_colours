<?php
/**
*
* @package migration
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License v2
*
*/

namespace prez\disable_colours\migrations;

class release_0.1 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('allow_post_color', true)),
		);
	}
}
