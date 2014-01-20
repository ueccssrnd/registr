<?php
    include("assets/system/header.html");
?>

<div id="admin-div">
    <h1>Administrator's Page:</h1>
    <p id="indented">You can now print the list of participants of today's event.</p>
    <a class="button" href="certificates.php" target="_blank">Print Me Now!</a>
    <p id="indented">You can also print the report about today's event.</p>
    <a class="button" href="report.php" target="_blank">Print Me Now!</a>
    <h1>Emergency Tools:</h1>
    <p id="indented">Accidentally submitted an incorrect information? You can update it here.</p>
    <button id="ub" class="button">The New Me!</button>
    <p id="indented">Accidentally submitted a false information? Don't worry, you can delete it here.</p>
    <button id="rb" class="button">Let Me Leave!</button>
</div>
<div id="admin-table">
    <h1>Information Shelf:</h1>
    <table>
        <tr>
            <td>Number of Participants:</td>
            <td>
                <?php
                        $db = "registr_database";
                        $tb = "registered_people";

                        $connection = mysqli_connect("localhost", "root", "", "$db");

                        $request = "SELECT * FROM $tb";
                        $model = mysqli_query($connection, $request);
                        $scan = mysqli_num_rows($model);

                        if($scan) {
                            echo $scan;
                        } else {
                            echo "0";
                        }
                ?>
            </td>
        </tr>
    </table>
    <h1>Updated Information List:</h1>
    <div>
        <?php
            $db2 = "registr_database";
            $tb2 = "renewal";

            $connection2 = mysqli_connect("localhost", "root", "", "$db");

            $request2 = "SELECT * FROM $tb2";
            $model2 = mysqli_query($connection2, $request2);
            $scan2 = mysqli_num_rows($model2);

            if($scan2) {
                while($row = mysqli_fetch_array($model2)) {
                    echo "<a id='new-name' href='print.php/?id=" . $row['id'] . "' target='_blank'>" . $row['full_name'] . "</a>";
                }
            } else {
                echo "Empty";
            }
        ?>
    </div>
</div>
<div id="overlay"></div>
<div id="overlay-items-new">
    <form id="update-form">
        <input id="old-full-name" type="text" placeholder="Old Full Name" maxlength="150" autofocus>
        <input id="update-full-name" type="text" placeholder="New Full Name" maxlength="150">
        <input id="update-university" type="text" onkeyup="reretrieveDataOne();" placeholder="Update University" maxlength="50">
        <input id="update-college" type="text" onkeyup="reretrieveDataTwo();" placeholder="Update College" maxlength="50">
        <input id="update-button" type="button" value="Count Me In!">
    </form>
    <div id="remove-form">
        <strong id="question">Who do you wish to remove from the list?</strong>
        <span id="list">
            <?php
                $request = "SELECT * FROM $tb";
                $model = mysqli_query($connection, $request);
                $scan = mysqli_num_rows($model);

                if($scan) {
                    while($row = mysqli_fetch_array($model)) {
                        echo "<a id='new-name' href='remove.php/?id=" . $row['id'] . "' target='_blank'>" . $row['full_name'] . "</a>";
                    }
                } else {
                    echo "Empty";
                }
            ?>
        </span>
    </div>
</div>

<?php
    include("assets/system/footer.html");
?>