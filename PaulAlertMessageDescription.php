<?php

namespace PaulAlertMessageDescription;

use Shopware\Components\Plugin\Context\InstallContext;

class PaulAlertMessageDescription extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_alert_message_description.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
?>
