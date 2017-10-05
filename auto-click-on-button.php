<?php

$next_page = $_GET['q'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Next</title>
</head>
<body>

<a id="nextButton" href="<?php echo "next.php?q=".++$next_page; ?>">Go to Goole</a>
<!--
<button type="submit" id="nextButton">Next</button>
-->

<script>

    setInterval(

        function(){
            document.getElementById('nextButton').click();
        }, 2000

    );

</script>

</body>
</html>
