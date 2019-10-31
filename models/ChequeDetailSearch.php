<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChequeDetail;

/**
 * ChequeDetailSearch represents the model behind the search form about `app\models\ChequeDetail`.
 */
class ChequeDetailSearch extends ChequeDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cheque_id'], 'integer'],
            [['cheque_date', 'cheque_buy_name', 'bankName', 'cheque_note'], 'safe'],
            [['cheque_amont'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['bankName'] = [
            'asc' => ['bank.bank_name_th' => SORT_ASC],
            'desc' => ['bank.bank_name_th' => SORT_DESC],
        ];

        $query->joinWith(['bank']);
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
            'bankname' => $this->bankname,
            'cheque_amont' => $this->cheque_amont,
        ]);

        $query->andFilterWhere(['like', 'cheque_buy_name', $this->cheque_buy_name])
            ->andFilterWhere(['like', 'bank.bank_name_th', $this->bankName])
            ->andFilterWhere(['like', 'cheque_note', $this->cheque_note]);

        return $dataProvider;
    }
}
