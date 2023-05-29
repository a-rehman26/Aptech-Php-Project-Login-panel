<?php

include 'connection.php';

$id_fetch_row = $_GET['DELETEid'];

$delete_query = " DELETE FROM `employeerecord` WHERE ID = '$id_fetch_row' ";

$query_delete = mysqli_query($con, $delete_query);

if ($delete_query) {
?>
    <script>
        alert('Row Deleted')

        location.replace('employeeData.php')
    </script>

<?php

}
