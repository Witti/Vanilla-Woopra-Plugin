<?php if(!defined('APPLICATION')) die();

$PluginInfo['Woopra'] = array(
    'Name' => 'Woopra',
    'Description' => 'Simple Woopra Plugin',
    'Version' => '0.2',
    'Author' => "Daniel Wittberger",
    'AuthorUrl' => 'http://www.wittistribune.com',
    'RequiredApplications' => array('Vanilla' => '>=2.0'),
);

class Woopra implements Gdn_IPlugin
{
    public function Base_AfterBody_Handler(&$Controller)
    {
		$username = Gdn::Session()->User->Name;
		$usermail = Gdn::Session()->User->Email;
        echo <<<EOWT
			<!-- Woopra Code Start -->
			<script type="text/javascript" src="//static.woopra.com/js/woopra.v2.js"></script>
			<script type="text/javascript">
			woopraTracker.addVisitorProperty("name", "$username");
			woopraTracker.addVisitorProperty("email", "$usermail");
			woopraTracker.track();
			</script>
			<!-- Woopra Code End -->
EOWT;
    }
    
    public function Setup()
    {
		//comming soon!
    }
}