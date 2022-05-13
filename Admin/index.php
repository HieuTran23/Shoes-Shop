

<?php
    ob_start();
    include ('Adminheader.php');
?>
        <div class="loginadmin">
            <form action="Adminindex.php" method="post">
                <table>
                    <span style="color: red;font-size: 25px;">
                    <?php
                    if(isset($_GET['id'])){
                        echo "Admin or Password error";
                    }
                    ?>
                    </span>
                    <tr>
                        <td>
                            Admin:
                        </td>
                        <td>
                            <input type="text" class="inputvalue" name="FormAdmin"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input type="password" class="inputvalue" name="FormPass"><br><br>
                        </td>
                    </tr>
                </table>

                <button class="Submitbtn" name="Submit" >Submit</a>
                
                </button>
            </form>
            
        </div>
<?php
    include ('Adminfooter.php');
?>