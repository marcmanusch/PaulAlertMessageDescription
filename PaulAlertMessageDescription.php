<?php

namespace PaulAlertMessageDescription;

use Shopware\Components\Plugin\Context\InstallContext;

class PaulAlertMessageDescription extends \Shopware\Components\Plugin
{
    public static function getSubscribedEvents() {
        return[
			'Theme_Compiler_Collect_Plugin_Less' => 'addLessFiles',
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onPostDispatch'
        ];
    }
	
	public function addLessFiles(\Enlight_Event_EventArgs $args)
    {

        $less = new \Shopware\Components\Theme\LessDefinition([], [__DIR__ . '/Resources/views/frontend/_public/src/less/all.less']);
        return new \Doctrine\Common\Collections\ArrayCollection([$less]);

    }


    public function onPostDispatch(\Enlight_Event_EventArgs $args)
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views/'
        );

        $controller = $args->get('subject');
        $view = $controller->View();

        //check if Plugin active
        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName($this->getName());

        $active = $config['active'];
        $paulMessageDescription = $config['paulMessageDescription'];
	$paulAlertType = $config['paulAlertType'];
	    

        $view->assign('paulActiveDescriptionMessage', $active);
        $view->assign('paulMessageDescription', $paulMessageDescription);
	$view->assign('paulAlertType', $paulAlertType);

    }

}
?>
