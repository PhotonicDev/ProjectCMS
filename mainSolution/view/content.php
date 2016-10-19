


    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">

                    Admin Navigation

            </li>
            <li>

                <a href="admin.php?page=products">Products <span class="glyphicon glyphicon-th" aria-hidden="true"></span> </a>
            </li>
            <li>
               <a href="#">Newsfeed  </a>
            </li>
            <li>
                <a href="#">Description</a>
            </li>

            <li>
                <a href="#">Contacts</a>
            </li>
        </ul>
        <div class="logout">
            <?php
            echo  " <a href='logout.php'> <button class = 'btn btn-danger btn-sm' type='button'>Logout</button></a> " ;

            ?>
        </div>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Place your content here -->


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



