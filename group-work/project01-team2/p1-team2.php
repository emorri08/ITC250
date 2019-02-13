<?php
echo'Temperature Conversion';
function fahrenheit_to_celsius($input_value)
{
    $celsius = ($input_value - 32) * 5/9;
    return $celsius ;
}

function fahrenheit_to_kelvin($input_value)
{
    $kelvin = ($input_value-32) * 5/9 + 273.15;
    return $kelvin ;
}

function celsius_to_fahrenheit($input_value)
{
    $fahrenheit = ($input_value * 9/5) + 32;
    return $fahrenheit ;
}
function celsius_to_kelvin($input_value)
{
    $kelvin = $input_value + 273.15;
    return $kelvin ;
}
function kelvin_to_fahrenheit($input_value)
{
    $fahrenheit = ($input_value-273.15) * 9/5 + 32;
    return $fahrenheit ;
}
function kelvin_to_celsius($input_value)
{
    $celsius = $input_value - 273.15;
    return $celsius ;
}



if(isset($_POST['btn']))
{
    $first_temp_type_name=$_POST['first_temp_type_name'];
    $second_temp_type_name=$_POST['second_temp_type_name'];
    $input_value=$_POST['input_value'];

    if (!ctype_digit($input_value)) {
        echo 'Input value is not numeric';
    } else {
        $input_value = floatval($input_value);
        if ($first_temp_type_name == 'fahrenheit' and $second_temp_type_name == 'celsius') {
            $celsius = fahrenheit_to_celsius($input_value);
            echo "Fahrenheit $input_value = $celsius Celsius";
        }

        if ($first_temp_type_name == 'fahrenheit' and $second_temp_type_name == 'kelvin') {
            $kelvin = fahrenheit_to_kelvin($input_value);
            echo "fahrenheit $input_value = $kelvin kelvin";
        }

        if ($first_temp_type_name == 'celsius' and $second_temp_type_name == 'fahrenheit') {
            $fahrenheit = celsius_to_fahrenheit($input_value);
            echo "Celsius $input_value = $fahrenheit Fahrenheit";
        }

        if ($first_temp_type_name == 'celsius' and $second_temp_type_name == 'kelvin') {
            $kelvin = celsius_to_kelvin($input_value);
            echo "Celsius $input_value = $kelvin kelvin";
        }

        if ($first_temp_type_name == 'kelvin' and $second_temp_type_name == 'fahrenheit') {
            $fahrenheit = kelvin_to_fahrenheit($input_value);
            echo "Kelvin $input_value = $fahrenheit Fahrenheit";
        }

        if ($first_temp_type_name == 'kelvin' and $second_temp_type_name == 'celsius') {
            $celsius = kelvin_to_celsius($input_value);
            echo "Kelvin $input_value = $celsius Celsius";
        }
    }
}
else{
    echo'
        <form action="" method="post">
        <table>
           <tr>
                <td>
                    <select name="first_temp_type_name">
                        <option value="fahrenheit">Fahrenheit</option>
                        <option value="celsius">Celsius</option>
                        <option value="kelvin">Kelvin</option>
                    </select>
                </td>
            </tr>
                    
            <tr>
                <td>
                    <input type="text" name="input_value">
                </td>
            </tr>
                    
            <tr>
                <td>
                    <select name="second_temp_type_name">
                        <option value="fahrenheit">Fahrenheit</option>
                        <option value="celsius">Celsius</option>
                        <option value="kelvin">Kelvin</option>
                    </select>
                </td>
            </tr>
                    
            <tr>
                <td>
                    <input type="submit" name="btn" value="Convert">
                </td>
            </tr>
                    
        </table>
        </form>        
       
        ';
}
?>



