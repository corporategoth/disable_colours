<?php

/**
*
* Auto Ban extension - Main listener 
*
* @copyright (c) 2015 PreZ <http://www.goth.net>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace prez\disable_colours\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class mainlistener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.modify_bbcode_init'	=> 'handle_modify_bbcode_init',
		);
	}

	/**
	* Constructor
	* NOTE: The parameters of this method must match in order and type with
	* the dependencies defined in the services.yml file for this service.
	*
	* @param \phpbb\auth		$auth		Auth object
	* @param \phpbb\cache\service	$cache		Cache object
	* @param \phpbb\config	$config		Config object
	* @param \phpbb\db\driver	$db		Database object
	* @param \phpbb\request	$request	Request object
	* @param \phpbb\template	$template	Template object
	* @param \phpbb\user		$user		User object
	* @param \phpbb\controller\helper		$helper				Controller helper object
	* @param \phpbb\controller\log		$log				log
	* @param string			$root_path	phpBB root path
	* @param string			$php_ext	phpEx
	*/
	public function __construct(\phpbb\config\config $config, $root_path, $php_ext, $table_prefix)
	{
		$this->config = $config;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->table_prefix = $table_prefix;
	}

	public function handle_modify_bbcode_init($event)
	{
		if (!$this->config['allow_post_color']) {
			$bbcodes = $event['bbcodes'];

			/* We could just act like they don't have permission.
			$bbcodes['color']['disabled'] = true;
			*/

			unset($bbcodes['color']);
			$event['bbcodes'] = array_filter($bbcodes);
		}
	}
}
