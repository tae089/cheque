<?php
namespace app\components;

use yii\base\Component;

class NumberToStringComponent extends Component{
   
    public function num2wordsThai($num){   
        $num=str_replace(",","",$num);
        $num_decimal=explode(".",$num);
        $num=$num_decimal[0];
        $returnNumWord;   
        $lenNumber=strlen($num);   
        $lenNumber2=$lenNumber-1;   
        $kaGroup=array("","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");   
        $kaDigit=array("","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");   
        $kaDigitDecimal=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");   
        $ii=0;   
        for($i=$lenNumber2;$i>=0;$i--){   
            $kaNumWord[$i]=substr($num,$ii,1);   
            $ii++;   
        }   
        $ii=0;   
        for($i=$lenNumber2;$i>=0;$i--){   
            if(($kaNumWord[$i]==2 && $i==1) || ($kaNumWord[$i]==2 && $i==7)){   
                $kaDigit[$kaNumWord[$i]]="ยี่";   
            }else{   
                if($kaNumWord[$i]==2){   
                    $kaDigit[$kaNumWord[$i]]="สอง";        
                }   
                if(($kaNumWord[$i]==1 && $i<=2 && $i==0) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==6)){   
                    if($kaNumWord[$i+1]==0){   
                        $kaDigit[$kaNumWord[$i]]="หนึ่ง";      
                    }else{   
                        $kaDigit[$kaNumWord[$i]]="เอ็ด";       
                    }   
                }elseif(($kaNumWord[$i]==1 && $i<=2 && $i==1) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==7)){   
                    $kaDigit[$kaNumWord[$i]]="";   
                }else{   
                    if($kaNumWord[$i]==1){   
                        $kaDigit[$kaNumWord[$i]]="หนึ่ง";   
                    }   
                }   
            }   
            if($kaNumWord[$i]==0){   
                if($i!=6){
                    $kaGroup[$i]="";   
                }
            }   
            $kaNumWord[$i]=substr($num,$ii,1);   
            $ii++;   
            $returnNumWord.=$kaDigit[$kaNumWord[$i]].$kaGroup[$i];   
        }      
        if(isset($num_decimal[1])){
            $returnNumWord.="จุด";
            for($i=0;$i<strlen($num_decimal[1]);$i++){
                    $returnNumWord.=$kaDigitDecimal[substr($num_decimal[1],$i,1)];  
            }
        }       
        return $returnNumWord.'บาทถ้วน';   
    }

    public function showDateThai($state){
        $date1=explode("-",$state);
        $nowyear=$date1[0]+543;
        $nowmonth=$date1[1];
        $nowday=$date1[2];
        switch ($nowmonth){
            case '1' :
                $month1="ม.ค.";break;
            case '2' :
                $month1="ก.พ.";break;
            case '3' :
                $month1="มี.ค.";break;
            case '4' :
                $month1="เม.ย.";break;
            case '5' :
                $month1="พ.ค.";break;
            case '6' :
                $month1="มิ.ย.";break;
            case '7' :
                $month1="ก.ค.";break;
            case '8' :
                $month1="ส.ค.";break;
            case '9' :
                $month1="ก.ย.";break;
            case '10' :
                $month1="ต.ค.";break;
            case '11' :
                $month1="พ.ย.";break;
            case '12' :
                $month1="ธ.ค.";break;
        }
        return $nowday." ".$month1." ".$nowyear;
    }

    public function showDateNumber($state){
        $date1 = explode("-",$state);
        $nowyear=$date1[0]+543;
        $nowmonth=$date1[1];
        $nowday=$date1[2];
        $lists=$nowday.$nowmonth.$nowyear;
        
        return str_split($lists);
    }
    
    
}
