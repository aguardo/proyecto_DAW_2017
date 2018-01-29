<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Prioridades]].
 *
 * @see Prioridades
 */
class PrioridadesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Prioridades[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Prioridades|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
