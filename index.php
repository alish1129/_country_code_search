<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Country Code Directory</title>
        <link href="styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <img class="icon" src="assets/open-book.svg">
            <h1 class="text">Country Code Directory</h1>
        </div>
        <form action="index.php" method="post" class="search_form">
            <input name="search_input" type="text" placeholder="Search">
            <button class="btn" name="submit" type="submit" style="margin-top: 15px">Search</button>
        </form>

<!--         				PHP	Starts								-->
<?php

if (isset($_POST['submit'])) {

$connection = mysqli_connect('localhost', 'root', '', 'countries');
$input = $_POST['search_input'];
$query = "SELECT * FROM country WHERE id like '$input%'";
$result = mysqli_query($connection, $query);


if ((mysqli_num_rows($result)) === 0){
    echo "<table class='table'>
            <thead>
            <tr class='table_row'>
                <label class='no_results'><strong>No country found.</strong></label>
            </tr> 
           </thead>";
} else {
?>

<!--         				PHP	ends								-->

    <div class="table">
        <table>
            <thead>
                <tr class="table_row">
                    <th class='table_head'>Code</th>
                    <th class='table_head'>Country Name</th>
                </tr>
            </thead>
            <tbody>

        <!--         				PHP	Starts								-->

        <?php

        while ($row_result = mysqli_fetch_array($result)) {
            $id = $row_result['id'];
            $name = $row_result['name'];

            echo "
            <tr>
            <td class='table_data'>$id</td>
            <td class='table_data'>$name</td>
            </tr>
        
        ";
        }
        }; //While loop ends  here

        }; // if statement ends here


        ?>
        <!--         				PHP	Ends								-->

            </tbody>
        </table>
    </div>
</body>
</html>