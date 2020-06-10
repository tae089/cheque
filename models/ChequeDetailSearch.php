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
    public $contactname;
    public $cheque_date;
    public function rules()
    {
        return [
            [['cheque_id'], 'integer'],
            [['cheque_date', 'contactname', 'bankname', 'cheque_note'], 'safe'],
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
        $query->joinWith(['contact']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['bankname'] = [
            'asc' => ['bank_name_th' => SORT_ASC],
            'desc' => ['bank_name_th' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['contactname'] = [
            'asc' => ['contact_name' => SORT_ASC],
            'desc' => ['contact_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if($this->cheque_date){
            $new_date = explode(' - ',$this->cheque_date);    
        }
        
         
        // grid filtering conditions  
        $query->andFilterWhere(['between', 'cheque_date', $new_date[0], $new_date[1]])
            ->andFilterWhere(['cheque_amont' => $this->cheque_amont]);

        $query->andFilterWhere(['like', 'contact_name', $this->contactname])
            ->andFilterWhere(['like', 'bank_name_th', $this->bankname])
            ->andFilterWhere(['like', 'cheque_note', $this->cheque_note]);

        return $dataProvider;
    }
}
