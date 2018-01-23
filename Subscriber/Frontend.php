<?php
namespace PaulAlertMessageDescription\Subscriber;
use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
class Frontend implements SubscriberInterface
{
    /** @var  ContainerInterface */
    private $container;
    /**
     * Frontend contructor.
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontendPostDispatch',
        ];
    }
    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFrontendPostDispatch(\Enlight_Event_EventArgs $args)
    {	    
	$controller = $args->getSubject();
    	$view = $controller->View();
        
        //get config
        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulAlertMessageDescription', $shop);
    	if (empty($config->show)) {
        	return;
    	}

        // get plugin settings
        $active = $config['active'];
        $paulMessageDescription = $config['paulMessageDescription'];
	$paulAlertType = $config['paulAlertType'];
	    
        // aggign to frontend
        $view->assign('paulActiveDescriptionMessage', $active);
        $view->assign('paulMessageDescription', $paulMessageDescription);
	$view->assign('paulAlertType', $paulAlertType);
    }
}
