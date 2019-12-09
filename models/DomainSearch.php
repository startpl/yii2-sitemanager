<?php

namespace koperdog\yii2sitemanager\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use koperdog\yii2sitemanager\models\Domain;

/**
 * DomainSearch represents the model behind the search form of `koperdog\yii2sitemanager\models\Domain`.
 */
class DomainSearch extends Domain
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_default'], 'integer'],
            [['domain'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Domain::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'is_default' => $this->is_default,
        ]);

        $query->andFilterWhere(['like', 'domain', $this->domain]);

        return $dataProvider;
    }
}