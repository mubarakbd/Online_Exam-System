<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/header.php');
include_once ($filepath.'/../classes/User.php');

$usr = new User();
?>
<?php
 //button validation


     if(isset($_GET['dis'])){
         $dblid   = (int)$_GET['dis'];
         $dblUser = $usr->disableUser($dblid);
     }

     if(isset($_GET['ena'])){
         $eblid   = (int)$_GET['ena'];
         $eblUser = $usr->enableUser($eblid);
     }

     if(isset($_GET['del'])){
         $delid   = (int)$_GET['del'];
         $delUser = $usr->RemoveUser($delid);
     }
  ?>



    <div class="main">
      <h1 style="text-align: center; font-size: 24px">Manage User</h1>
        <?php
        if(isset($dblUser)){
            echo $dblUser;
        }

        if(isset($eblUser)){
            echo $eblUser;
        }

        if(isset($delUser)){
            echo $delUser;
        }
        ?>
        <div class="manageuser">
           <table class="tblone text-center">
               <tr>
                 <th>No</th>
                 <th>Name</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Action</th>
               </tr>
            
              <?php
                 $userData = $usr->getAllUser();
                 if($userData){
                     $i = 0;
                   while($result = $userData->fetch_assoc()){
                     $i++;
              ?>
              <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $result['name']?></td>
                  <td><?php echo $result['username']?></td>
                  <td><?php echo $result['email']?></td>
                  <td>
                    <?php
                      if($result['status'] == '0'){?>

                        <a style="  text-decoration: none" onclick="return confirm('Are You Sure to Disbale?')" href="?dis=<?php echo $result['userid']; ?>" class="btn btn-danger ">Disbale</a>
                      <?php } else{?>
                   <a style="text-decoration: none" onclick="return confirm('Are You Sure to E?')" href="?ena=<?php echo $result['userid']; ?>" class="btn btn-info ">Enbale</a>

                    <?php  }?>
                       
                      <a style=" text-decoration: none" onclick="return confirm('Are You Sure to Remove?')" href="?del=<?php echo $result['userid']; ?>" class="btn btn-warning ">Remove</a>
                       
                       
                  </td>
              </tr>
          <?php }} ?>

           </table>
       </div>
  </div>
