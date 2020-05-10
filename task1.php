<!DOCTYPE html>
<html>
<body>

<?php
$numbers = [5, 5, 1, 6, 4, 3];
echo "Input : ".json_encode($numbers)."<br>";
rsort($numbers);

$arrlength = count($numbers);
echo "Output : ".$numbers[1];
?>

</body>
</html>