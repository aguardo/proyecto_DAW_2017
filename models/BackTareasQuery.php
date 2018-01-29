<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BackTareas]].
 *
 * @see BackTareas
 */
class BackTareasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BackTareas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BackTareas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
