<?php

namespace app\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Object
 * @package app\models
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $image
 *
 * @property null|ObjectModel $parent
 * @property Task[] $tasks
 */
class ObjectModel extends ActiveRecord
{

    /** {@inheritDoc} */
    public static function tableName()
    {
        return '{{%object}}';
    }

    /** {@inheritDoc} */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['parent_id', 'exist', 'targetClass' => self::class, 'targetAttribute' => 'id'],
            ['image', 'string'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getParent()
    {
        return self::hasOne(self::class, ['id' => 'parent_id']);
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getTasks()
    {
        return self::hasMany(Task::class, ['id' => 'task_id'])
            ->viaTable('{{%object_task}}', ['object_id' => 'id']);
    }
}