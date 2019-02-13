<?php

/**
 * index.php and survey_view.php create a list/view/pager application
 * 
 * @package SurveySez
 * @author Elly Boyd <eaboyd03@gmail.com>
 * @version 1.3 2019/01/29
 * @link http://www.ellycodes.com/wn19/
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see survey_view.php
 * @see Pager.php 
 * @todo none
 */

# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
 
# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
	myRedirect(VIRTUAL_PATH . "surveys/index.php");
}
// added in class on 2/5/2019 ------- NEW CODE --------------------------
$mySurvey = new Survey($myID);

dumpDie($mySurvey);

//---end config area --------------------------------------------------

get_header(); #defaults to theme header or header_inc.php
if($mySurvey->IsValid)
{#records exist - show them
   
    echo '<h3>' . $mySurvey->Title . '</h3>
        <p>' . $mySurvey->Title . '</p>    
    
    ';
    
    
} else {//no such survey
    echo '<div align="center">No such survey</div>';
    echo '<div align="center"><a href="' . VIRTUAL_PATH . 'surveys/index.php">BACK</a></div>';
}

get_footer(); #defaults to theme footer or footer_inc.php
// -------------------------- NEW CODE --------------------------
class Survey
{
    public $SurveyID = 0;
    public $Title = '';
    public $Description = '';
    public $IsValid = false;
    public $Questions = array();
    
    public function __construct($SurveyID)
    {
        //filters out bad data with a cast
        $this->SurveyID = (int)$SurveyID;
        
        //sql statement to select individual item
        //$sql = "select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = " . $myID;
        
        $sql = "SELECT Title, Description from wn19_surveys WHERE SurveyID={$this->SurveyID}";
             
        # connection comes first in mysqli (improved) function
        $result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()),    E_USER_ERROR));

        if(mysqli_num_rows($result) > 0)
        {#records exist - process
	       $this->IsValid = true;	
	       while ($row = mysqli_fetch_assoc($result))
	       {
               $this->Title = dbOut($row['Title']);
               $this->Description = dbOut($row['Description']);
               
	       }
        }// end of if block   

        @mysqli_free_result($result); # We're done with the data!
        
        // ------------ START QUESTIONS HERE ---------------
        
        $sql = "select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = " . $this->SurveyID;
             
        # connection comes first in mysqli (improved) function
        $result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()),    E_USER_ERROR));

        if(mysqli_num_rows($result) > 0)
        {#records exist - process
	       while ($row = mysqli_fetch_assoc($result))
	       {
               $this->Questions[] = new Question((int)$row['QuestionID'],dbOut($row['Question']));
               //$this->Title = dbOut($row['Title']);
               //$this->Description = dbOut($row['Description']);
               
	       }
        }// end of if block   

        @mysqli_free_result($result); # We're done with the data!
        
        // -------------- END QUESTIONS HERE --------------
        
        
        
    }// end  survey constructor
   
    
}// end  survey class

class Question
{
    public $QuestionID = 0;
    public $QuestionText = '';
    
    public function __construct($QuestionID,$QuestionText)
    {
        $this->QuestionID = (int)$QuestionID;
        $this->QuestionText = $QuestionText;
    }
    
}// end question class
// -------------------------- END NEW CODE --------------------------











































