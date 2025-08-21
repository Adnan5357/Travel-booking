<?php include 'connection.php'; ?>

<table border="1px" cellpadding="10px" cellspacing="0">
    <tr>
        <th>Username</th>
        <th>user_password</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    $query="SELECT * FROM userinfo";
    $data=mysqli_query($con,$query);
    $result=mysqli_num_rows($data);
    if ($result){
        while ($row=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['user_pass'];?></td>
                <td><a href="updateform.php?username=<?php echo $row['Username']; ?>">Edit</a></td>
                <td><a href="delete.php?username=<?php echo $row['Username']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
            </tr>
            <?php
        }
    }
    ?>
</table>