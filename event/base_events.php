<?php
/**
 *
 * @package phpBB.de pastebin
 * @copyright (c) 2015 phpBB.de, gn#36
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace goztow\edit_has_topicreview\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class base_events implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.posting_modify_template_vars' 	=> 'edit_topicreview',
		);
	}

	/* @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\controller\helper	$helper		Controller helper object
	* @param \phpbb\template\template	$template	Template object
	*/
	public function __construct(\phpbb\template\template $template)
	{
		$this->template = $template;
	}

	public function edit_topicreview($event)
{
    if ($event['mode'] == 'edit' && topic_review($event['topic_id'], $event['forum_id']))
    {
        $this->template->assign_var('S_DISPLAY_REVIEW', true);
    }
} 
}
