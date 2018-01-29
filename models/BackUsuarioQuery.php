<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BackUsuario]].
 *
 * @see BackUsuario
 */
class BackUsuarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BackUsuario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BackUsuario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
