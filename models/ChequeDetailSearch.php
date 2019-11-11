<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChequeDetail;

/**
 * ChequeDetailSearch represents the model behind the search form of `app\models\ChequeDetail`.
 */
class ChequeDetailSearch extends ChequeDetail
{
    /**
     * {@inheritdoc}
     */
    public $bankname;
    public function rules()
    {
        return [
            [['cheque_id'], 'integer'],
            [['cheque_date', 'cheque_buy_name', 'bankname', 'cheque_note'], 'safe'],
            [['cheque_amont'], 'number'],
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
        $query = ChequeDetail::find();
        $query->joinWith(['bank']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['bankname'] = [
            'asc' => ['bank_name_th' => SORT_ASC],
            'desc' => ['bank_name_th' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cheque_id' => $this->cheque_id,
            'cheque_date' => $this->cheque_date,
           // 'bank_name_th' => $this->bank_id,
            'cheque_amont' => $this->cheque_amont,
        ]);

        $query->andFilterWhere(['like', 'cheque_buy_name', $this->cheque_buy_name])
            ->andFilterWhere(['like', 'bank_name_th', $this->bankname])
            ->andFilterWhere(['like', 'cheque_note', $this->cheque_note]);

        return $dataProvider;
    }
}
