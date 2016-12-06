
    <link rel="stylesheet" type="text/css" href="/ProjectCMS/assets/sass/css/admin_panel.css">
    <div class="col-md-3">
        <div id="sidebar-wrapper">

    <form method="get">
            <a class="navbar-brand" href="/ProjectCMS/admin/index"><img class="duckLogo" src="/ProjectCMS/assets/user_images/duck_blue.png">Admin Panel</a>
            <ul class="sidebar-nav pull-left text-left">
                <li class="sidebar-brand">
                </li>
                <li>
                    <a class="btn btn-sm btn-primary" href="/ProjectCMS/admin/index">Products<span class="glyphicon glyphicon-th" aria-hidden="true"></span> </a>
                </li>
                <li>
                    <a class="btn btn-sm btn-primary" href="/ProjectCMS/admin/newsfeed">Newsfeed</a>
                </li>
                <li>
                    <a class="btn btn-sm btn-primary" href="/ProjectCMS/admin/description">Description</a>
                </li>

                <li>
                    <a class="btn btn-sm btn-primary" href="/ProjectCMS/admin/contacts">Contacts</a>
                </li>
                <li>
                    <a href="/ProjectCMS/admin/add_new" class='btn-sm btn btn-success'>Add Product<span class='glyphicon glyphicon-plus' aria-hidden='true'></a>
                </li>
            </ul>
    </form>

    <form method="post">
        <div class="logout">
            <button class='btn btn-danger btn-sm' name="logout" type='submit'>Logout</button>

        </div>

    </form>
        </div>

        <!-- /#sidebar-wrapper -->

    <!-- Page Content -->

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



