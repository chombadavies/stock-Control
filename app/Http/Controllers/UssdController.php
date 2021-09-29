<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UssdOption;
use App\Models\Paramilitary;
class UssdController extends Controller
{
    //
     public static function session(Request $request)
    {
           $text=$request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
      
        $ussd_string_exploded = explode("*", $text);
        // Get ussd menu level number from the gateway
        $level = count($ussd_string_exploded);
          
        if ($text == "") {
            // first response when a user dials our ussd code
            $response  = "CON Welcome to NYS USSD Services \n";
            $response .= "1. Check My Details \n";
            $response .= "2. Exit";
        }
        elseif ($text == "1") {
            // when user respond with option one to register
            $response = "CON Enter Your Service Number \n";
          
        }
       
        elseif ($ussd_string_exploded[0] == 1 &&$level == 2) {
               $data=explode("*", $text);
               $number=$data[1];
               $model=Paramilitary::where(['servicenumber'=>$number])->first();
                 if($model)
                 {

                   $response = "END  Valid Service No:\n Name:  ".$model->name."\n Service No:".$model->servicenumber."\n ID No :".$model->idnumber."\n Current Stage:".strtoupper($model->stage);

                 }else{
                   $response = "END  Invalid ServiceNo \n";
                 }
                
          

           
        }
        
       
       
        elseif ($text == "2") {
            // Our response a user respond with input 2 from our first level
            $response = "END Thank You for Reaching NYS.";
        }
        // send your response back to the API
        header('Content-type: text/plain');
        echo $response;
    }

    public static function processQuestions($data,$phoneNumber)
    {
        $questions=array("Please indicate your Entity",
                         "Please Enter Your SAP NO",
                         "Please Enter Your National ID NO",
                         "Please indicate your Tenure in Company:",
                         "Please indicate your Age In Years",
                         "Please indicate your Level",
                         "Please indicate your functional Department",
                         "Please indicate your functional Department Unit",
                         "Please indicate your location",
                         "Which of the following factors do you believe will make CCBA Kenya to be an attractive employer?",
                         "What do you feel are the most significant barriers to increased levels of female experienced hires",
                         "What are the biggest barriers to your career advancement?",
                         "Which development programmes would you consider effective to support women into the leadership pipeline?",
                         "In your opinion, how does the organisation address an unequal balance of men and women in Senior level positions?",
                         "In your opinion, What more can the organisation do to address an unequal balance of men and women in Senior level positions?",
                         "Which of the following factors would be most valuable for the organization to focus on when creating an environment favorable to the development and retention of female employees?",
                          );
        $userData=array_combine($questions,$data);
        $pin=substr(number_format(time() * rand(),0,'',''),0,8);
          
            foreach($userData as $key=>$value)
            {
                  $question=Question::where('question_description','like','%'.$key)->first();
                     if($question)
                     {
                      $model=UssdOption::where(['question_id'=>$question->id,'ussd_value'=>$value])->first();
                   
                     if(in_array($question->question_type, array("DropDown","Radio")))
                     {
                        if($model)
                              {

                                $myanswer=$model->answer_Paramter;
                              }else{
                                $myanswer=$value;
                              }

                     }else{
                        $myanswer=$value;
                     }


                     

                        $feedback=new Feedback();
                            $feedback->company_id=$question->company_id;
                            $feedback->project_id=$question->project_id;
                            $feedback->survey_id=$question->survey_id;
                            $feedback->question_id=$question->id;
                            $feedback->value=$myanswer;
                            $feedback->value_description=$phoneNumber;
                            $feedback->pin_number=$pin;
                           
                            $feedback->save();
                  
                 

                     }
                  
               
            }
    }
}
