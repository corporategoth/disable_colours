<?php

/**
*
* Auto Ban extension - ACP Listener
*
* @copyright (c) 2014 PreZ <http://www.goth.net>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace prez\disable_colours\event;

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class acplistener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_board_config_edit_add'	=>	'add_options',
		);
	}

	/**
	* Constructor
	* NOTE: The parameters of this method must match in order and type with
	* the dependencies defined in the services.yml file for this service.
	*
	* @param \phpbb\controller\helper		$helper				Controller helper object
	* @param \phpbb\user		$user		User object
	*/
	public function __construct(\phpbb\controller\helper $helper, \phpbb\user $user)
	{
		$this->helper = $helper;
		$this->user = $user;
	}

	public function add_options($event)
	{
		//$this->var_display($event['display_vars']);
		if ($event['mode'] == 'post')
		{
			// Store display_vars event in a local variable
			$display_vars = $event['display_vars'];

			// Define my new config vars
			$my_config_vars = array(
				'allow_post_color' => array('lang' => 'DISABLE_COLOURS_ALLOW_POST_COLOR', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
			);

			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $my_config_vars, array('before' =>'allow_smilies'));
			// Update the display_vars  event with the new array
			$event['display_vars'] = array('title' => $display_vars['title'], 'vars' => $display_vars['vars']);
		}

	}
}
