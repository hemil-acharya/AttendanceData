



<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['Faculty_id']) && $_GET['Faculty_id']>0){
  $type=get_safe_value($_GET['type']);
  $id=get_safe_value($_GET['Faculty_id']);
  if($type=='delete'){
    mysqli_query($con,"delete from student_info where Faculty_id='$id'");
    redirect('faculty.php'); 
  }
  if($type=='active' || $type=='deactive'){
    $status=1;
    if($type=='deactive'){
      $status=0;
    }
    mysqli_query($con,"update faculty_info set status='$status' where Faculty_id='$id'");
    redirect('faculty.php');
  }

}

$sql="select * from faculty_info order by Faculty_id";
$res=mysqli_query($con,$sql);

?>




 <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Faculty Table</h4>
                    <p class="card-description">all record from Faculty table
                    </p>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Faculty_id</th>
                          <th>Name</th>
                          <th>status</th>
                          <th>added_on</th>
                          <th>Action</th>
                        </tr>
                      </thead>


             <?php if(mysqli_num_rows($res)>0){
            $i=1;
            while($row=mysqli_fetch_assoc($res)){
            ?>
            <tr>
                            <td><?php echo $i?></td>
                             
               <td><?php echo $row['Faculty_id']?></td>
              <td><?php echo $row['Name']?></td>
              <td><?php echo $row['mail_id']?></td>

                <td><?php echo $row['status']?></td>
              <td><?php echo $row['added_on']?></td>
              
              <td>
                <a href="student_master_manage.php?id=<?php echo $row['Enroll_id']?>"><button class="badge badge-success hand_cursor">Edit</button></a>&nbsp;
                <?php
                if($row['status']==1){
                ?>
  
                <a href="?id=<?php echo $row['Enroll_id']?>&type=deactive"><button class="badge badge-primary hand_cursor">Active</button></a>
                <?php
                }else{
                ?>
                <a href="?id=<?php echo $row['Enroll_id']?>&type=active"><button class="badge badge-warning hand_cursor">Deactive</button></a>
                <?php
                }
                
                ?>
                &nbsp;
                <a href="?id=<?php echo $row['Enroll_id']?>&type=delete"><button class="badge badge-danger delete_red hand_cursor">Delete</button></a>
              </td>
                           
                        </tr>
                        <?php 
            $i++;
            } } else { ?>
            <tr>
              <td colspan="5">No data found</td>
            </tr>
            <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
         
 </div>
</div>














<?php 
include('footer.php');

?>

