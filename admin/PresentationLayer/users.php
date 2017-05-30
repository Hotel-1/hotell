<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users</title>
	<?php
		require("style.php");
	?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
                     <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin Tool</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                          <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
<?php 
				require("leftmenu.php");
			?>
        </nav>
<form method="POST" action="exportexcel.php" enctype="multipart/form-data">
        <!-- Page Content -->
        <div id="page-wrapper">
        <br>
        <br>
<br>

<a class="btn btn-block btn-primary">List of All Users</a>                          
               <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" data-show-refresh="true" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
											<th></th>
											<th>ID</th>
											<th>Name</th>
											<th>Surname</th>
											<th>Email</th>
											<th>Password</th>						
                                        </tr>
                                    </thead>
                                    <tbody>
 
   <?php 
		require("../LogicLayer/UserManager.php");
		$users = UserManager::getAllUsers();
		foreach($users as $row){
   ?>
		 <tr>
				<td><a href="javascript://"onclick="javascript:window.open('deleteuser.php?id=<?php echo $row->getUserID();?>','HB','toolbar=0, location=0, scrollbars=1,resizable=0, width=500,height=200');"><i class="fa fa-trash-o fa-fw"></i></a></td>
				<td><?php echo $row->getUserID();?></td>
				<td><?php echo $row->getUserName(); ?></td>
				<td><?php echo $row->getUserSurname();?></td>
				<td><?php echo $row->getEmail();?></td>					
				<td><?php echo $row->getPassword();?></td>					             
		  </tr>
    
           <?php } ?>
		   
								
                                    </tbody>
                                </table>
     </div>
                            

        <!-- /#page-wrapper -->

    </div>
</form>

</body>

</html> 