<?php

namespace common\behaviors;

use common\models\Ingredients;
use common\modules\country\models\Quarter;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class ModelBehavior
 * @author @bortiqov
 */
class SelectBehavior extends AttributeBehavior
{
    /**
     * @var string
     */
    public $attribute = "ingredientIds";
    public $relation_name = "ingredients";
    public $modelClass = Ingredients::class;

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'save',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'save',
            ActiveRecord::EVENT_AFTER_FIND => 'getData'
        ];
    }

    /**
     *
     */
    public function save()
    {
        if (!$this->owner->isNewRecord) {
            $this->unlink();
        }

        $this->link();
    }

    /**
     * @return bool
     */
    private function unlink()
    {
        $models = $this->owner->{$this->relation_name};

        if (count($models) == 0) {
            return false;
        }

        foreach ($models as $model) {
            $this->owner->unlink($this->relation_name, $model, true);
        }
    }

    /**
     * @return bool
     */
    private function link()
    {
        $ids = $this->owner->{$this->attribute};

        if (empty($ids)) {
            return false;
        }

        $models = $this->modelClass::find()->where(['id' => $ids])->all();

        if (!$models) {
            return false;
        }

        foreach ($models as $model) {
            $this->owner->link($this->relation_name, $model);
        }
    }

    public function getData()
    {
        $this->owner->{$this->attribute} = ArrayHelper::getColumn($this->owner->{$this->relation_name}, 'id');
    }
}
