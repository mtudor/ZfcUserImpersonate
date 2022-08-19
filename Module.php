<?php
/**
 * ZfcUserImpersonate Module Class
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate;

use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\ViewModel;
use ZfcUserImpersonate\Module\AbstractModule;

class Module extends AbstractModule
{
    public function onBootstrap(MvcEvent $e)
    {
        // TODO: I'm not convinced that this is really the best way to achieve this.
        // TODO: ZfcUserImpersonate (future) view scripts will have to be in a zfcuser folder, not zfc-user-impersonate.
        // As a consequence of overriding the ZfcUser User controller, ZF2 will look for all view scripts within
        // ZfcUserImpersonate's folder. Use the Mvc Dispatch event to point the view script at ZfcUser again so that
        // we don't have to copy all view scripts from ZfcUser to ZfcUserImpersonate.
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, function($e) {
            $model = $e->getResult();
            if (!$model instanceof ViewModel) {
                return;
            }
            $model->setTemplate(str_replace('zfc-user-impersonate', 'zfc-user', $model->getTemplate()));
        }, -85);
    }
}
