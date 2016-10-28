


    <!-- Sidebar -->
    <form method="get">
    <div style="background-color:#212121;"id="sidebar-wrapper">

        <a class="navbar-brand" href="index.php"><img class="duckLogo" src="user_images/duck_blue.png">Admin Panel</a>
        <ul class="sidebar-nav">
            <li class="sidebar-brand">



            </li>
            <li>

                <a href="admin.php?page=products">Products<span class="glyphicon glyphicon-th" aria-hidden="true"></span> </a>
            </li>
            <li>
               <a href="admin.php?news=products">Newsfeed</a>
            </li>
            <li>
                <a href="#">Description</a>
            </li>

            <li>
                <a href="#">Contacts</a>
            </li>
        </ul>
    </form>

    <form method="post">
        <div class="logout">
            <?php
            echo  " <a href='logout.php'> <button class = 'btn btn-danger btn-sm' type='button'>Logout</button></a> " ;

            ?>
        </div>

    </div>
    </form>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid">
            <div style="background-color: #212121;" class="row">
                <!-- Place your content here -->
                <?php
                echo " 
 
 <form method='post'>
 
<button style='margin: 8px;' name='btn-insert' type=\"submit\" class=\"pull-right btn-sm btn btn-default\">Add Product <span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></button>
  
   </form>";

                ?>

            </div>
        </div>


    </div>
    <!-- /#page-content-wrapper -->


<!-- /#wrapper -->


<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>



