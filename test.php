<!DOCTYPE HTML>
<html>

<?php
function php_func($test){
echo "Stay Safe";
echo $test;
}
?>

<button onclick="clickMe()"> Click </button>

<script>
function clickMe(){

var result ="<?php php_func(); ?>"
document.write(result);
}
</script>

</html>
