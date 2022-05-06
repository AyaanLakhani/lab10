<?php
// mysql connection


$con = mysqli_connect("129.237.87.5","a332l217", "Wongait4", "a332l217") or die("Error: " . mysqli_error($con));

// fetch records
$result = @mysqli_query($con, "SELECT * FROM Posts") or die("Error: " . mysqli_error($con));

// delete records
if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($con,"DELETE FROM Posts WHERE id = " . $id);
    }
    $msg = "Deleted Successfully!";
    header("Location: DeletePosts.php?msg=$msg");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Posts</title>
</head>
<body>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="DeletePosts.php" method="post">
            <?php if (isset($_GET['msg'])) { ?>
            <p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
            <?php } ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>PostID</th>
                    <th>Content</th>
                    <th>AuthorID</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/></td>
                    <td><?php echo $row['PostID']; ?></td>
                    <td><?php echo $row['Content']; ?></td>
                    <td><?php echo $row['AuthorID']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <input id="submit" name="submit" type="submit" class="btn btn-danger" value="Delete Selected Row(s)" />
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>

