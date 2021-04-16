<?php

namespace app\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Task
 * @package app\models
 *
 * @property int $id,
 * @property string[] $tasks
 *
 * @property Object[] $objects
 */
class Task extends ActiveRecord
{
    /** {@inheritDoc} */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['tasks', 'each', 'rule' => ['string', 'min' => 1]],
        ];
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getObjects()
    {
        return self::hasMany(ObjectModel::class, ['id' => 'object_id'])
            ->viaTable('{{%object_task}}', ['task_id' => 'id']);
    }
}