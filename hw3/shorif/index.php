<p>01</p>
<?php
class MamurjorITInstitute
{
    public function displayString()
    {
        echo 'Mamurjor IT Institute !';
    }
}

// Instantiate the class and call the displayString method
$institute = new MamurjorITInstitute();
$institute->displayString();
?>
<hr>
<p>02</p>
<?php
class IntroMessage
{
    public function displayMessage($name)
    {
        echo "Hello All, I am $name";
    }
}

// Instantiate the class and call the displayMessage method with a name argument
$message = new IntroMessage();
$message->displayMessage("Hadi");
?>
<hr>
<p>03</p>
<?php
class FactorialCalculator
{
    public function calculateFactorial($number)
    {
        if ($number < 0) {
            return "Factorial is not defined for negative numbers.";
        } elseif ($number == 0) {
            return 1;
        } else {
            $factorial = 1;
            for ($i = 1; $i <= $number; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    }
}

// Example usage:
$factorialCalculator = new FactorialCalculator();
$number = 5; // The number for which factorial needs to be calculated
echo "Factorial of $number is: " . $factorialCalculator->calculateFactorial($number);
?>
<hr>
<p>04</p>
<?php
class ArraySorter
{
    public function sortArray($array)
    {
        // Sort the array in ascending order
        sort($array);
        return $array;
    }
}

// Sample array
$array = array(11, -2, 4, 35, 0, 8, -9);

// Instantiate the class and call the sortArray method
$sorter = new ArraySorter();
$sortedArray = $sorter->sortArray($array);

// Display the sorted array
print_r($sortedArray);
?>
<hr>
<p>05</p>
<?php
class DateDifferenceCalculator
{
    public function calculateDateDifference($date1, $date2)
    {
        $dateTime1 = new DateTime($date1);
        $dateTime2 = new DateTime($date2);
        $interval = $dateTime1->diff($dateTime2);

        $difference = array(
            'years' => $interval->y,
            'months' => $interval->m,
            'days' => $interval->d
        );

        return $difference;
    }
}

// Sample dates
$date1 = '1981-11-03';
$date2 = '2013-09-04';

// Instantiate the class and call the calculateDateDifference method
$calculator = new DateDifferenceCalculator();
$difference = $calculator->calculateDateDifference($date1, $date2);

// Display the difference
echo "Difference: {$difference['years']} years, {$difference['months']} months, {$difference['days']} days";
?>
<hr>
<p>06</p>
<?php
class MyCalculator
{
    private $num1;
    private $num2;

    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add()
    {
        return $this->num1 + $this->num2;
    }

    public function subtract()
    {
        return $this->num1 - $this->num2;
    }

    public function multiply()
    {
        return $this->num1 * $this->num2;
    }

    public function divide()
    {
        if ($this->num2 == 0) {
            return "Cannot divide by zero.";
        } else {
            return $this->num1 / $this->num2;
        }
    }
}

// Example usage:
$mycalc = new MyCalculator(12, 6);
echo $mycalc->add(); // Displays 18
echo "<br>";
echo $mycalc->multiply(); // Displays 72
?>
<hr>
<p>07</p>
<?php
$dateString = '12-08-2004';

// Convert string to Date format (d-m-Y)
$date = DateTime::createFromFormat('d-m-Y', $dateString);
$dateFormatted = $date->format('Y-m-d');
echo "Date: $dateFormatted";

echo "<br>";

// Convert string to DateTime format (d-m-Y)
$dateTime = DateTime::createFromFormat('d-m-Y', $dateString);
$dateTimeFormatted = $dateTime->format('Y-m-d H:i:s');
echo "DateTime: $dateTimeFormatted";
?>