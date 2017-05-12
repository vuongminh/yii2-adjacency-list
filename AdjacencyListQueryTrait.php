<?php
/**
 * @link https://github.com/paulzi/yii2-adjacency-list
 * @copyright Copyright (c) 2015 PaulZi <pavel.zimakoff@gmail.com>
 * @license MIT (https://github.com/paulzi/yii2-adjacency-list/blob/master/LICENSE)
 */

namespace paulzi\adjacencyList;

/**
 * @author PaulZi <pavel.zimakoff@gmail.com>
 */
trait AdjacencyListQueryTrait
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function roots()
    {
        /**
         * @var \yii\db\ActiveQuery $this
         * @var \yii\db\ActiveRecord $model
         */
        $class = $this->modelClass;
        $model = new $class;
        $alias = array_search($model->tableName(), $this->getTablesUsedInFrom());
        return $this->andWhere(["{$alias}.[[{$model->parentAttribute}]]" => null]);
    }
}
