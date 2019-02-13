<?php include 'includes/header.php'?>
<?php        
    
    if(isset($_POST["inputValue"]))
    {//data is submitted show it
       // echo $_POST['FirstName'];
        /*
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        die;
        */
        $inputTemp=$_POST["inputValue"];
        if (!is_numeric($inputTemp)) 
        {//issue error response
            echo '<p style="text-align:center;">Input value should be a valid number.<BR />';  
            echo '<a href="">Do another calculation</a></p>';
        } else {
            switch($_POST["inputType"]) 
            {
                case 'celsius':
                    $fahrenheit=$inputTemp*9/5+32;
                    $kelvin=$inputTemp+273.15;
                    echo '<p style="text-align:center;">Here are your results:</p>'; 
                    echo '<p style="text-align:center;">' . number_format($fahrenheit,2). '&#176 Fahrenheit<BR />'; 
                    echo number_format($kelvin,2) . '&#176 Kelvin<BR /><BR />'; 
                    echo '<a href="">Do another calculation</a></p>';
                    break;
                case 'fahrenheit':
                    $celsius=5/9*($inputTemp-32);
                    $kelvin=$inputTemp + 273.15;
                    echo '<p style="text-align:center;">Here are your results:</p>'; 
                    echo '<p style="text-align:center;">' . number_format($celsius,2) . '&#176 Celsius<BR />'; 
                    echo number_format($kelvin,2) . '&#176 Kelvin<BR /><BR />'; 
                    echo '<a href="">Do another calculation</a></p>';
                    break;
                case 'kelvin':
                    $fahrenheit=9/5*($inputTemp-273.15)+32;
                    $celsius=$inputTemp-273.15;
                    echo '<p style="text-align:center;">Here are your results:</p>'; 
                    echo '<p style="text-align:center;">' . number_format($fahrenheit,2) . '&#176 Fahrenheit<BR />'; 
                    echo number_format($celsius,2) . '&#176 Celsius<BR /><BR />'; 
                    echo '<a href="">Do another calculation</a></p>';
                    break;    
                default:
                    echo '<p style="text-align:center;">Something goes wrong....</p>';
                    echo '<a href="">Try again!</a></p>';
                    die();
            }
        }
    } else {//show a form
        echo '
                <form action="index.php" method="post" name="TempCalc" id="tempCalcForm">                	
                    <div style="text-align:center;">
                        <p>Input a temperature, select the type and click Convert</p>
                        <div style="display:inline;"><input type="text" name="inputValue" placeholder="e.g. 32" size="12" style="height:22px;display:inline;"></div>
                        <div style="display:inline;">
                            <select name="inputType" style="height:22px;">
                                <option value="fahrenheit">Fahrenheit</option>
                                <option value="celsius">Celsius</option>
                                <option value="kelvin">Kelvin</option>		
                            </select>
                        </div> 
                        <div style="display:inline;"> <input type="submit" value="Convert"></div>
                    </div>		 	                        
                </form>';
    }
?>
<?php include 'includes/footer.php'?>
