<?php
require_once './connectDB.php';

$conn = connectDB();

$sql = "select * from admin";
$result = mysqli_query($conn, $sql);


if(isset($_POST['Submit'])){
    $U=$_POST['FormAdmin'];
    $P=$_POST['FormPass'];
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($data = mysqli_fetch_assoc($result)) {
            if($U== $data['AdminName'] and $P==$data['Password']){
                continue;
            }
            else {
                header("Location:./index.php?id=1");
                echo "Error User Name and Password";
            }
        }
    }   
} 


mysqli_close($conn);
?>


<?php
    ob_start();
    include ('Adminheader.php');
?>

<?php
    include ('AdminMain.php');
?>

<?php
    include ('Adminfooter.php');

?>