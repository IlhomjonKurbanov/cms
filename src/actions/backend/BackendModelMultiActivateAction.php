<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
namespace skeeks\cms\actions\backend;

use skeeks\cms\backend\actions\BackendModelMultiAction;
use skeeks\cms\components\Cms;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class BackendModelMultiActivateAction extends BackendModelMultiAction {

    public function init()
    {
        if (!$this->icon)
        {
            $this->icon = "fas fa-eye";
        }

        if (!$this->name)
        {
            $this->name = \Yii::t('skeeks/cms', "Activate");
        }

        parent::init();
    }

    /**
     * @param $model
     * @return bool
     */
    public function eachExecute($model)
    {
        try {
            $model->active = Cms::BOOL_Y;
            return $model->save(false);
        } catch (\Exception $e) {
            return false;
        }
    }
}
