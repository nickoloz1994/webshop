<?php
$id = $_SESSION['userid'];
$url = $_SESSION['user_level'] == 1 ? "admin.php?id=$id" : "member.php?id=$id";
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">All Products</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" action="search.php" method="get">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search..." name="searchinput">
                  </div>
                  <button type="submit" class="btn btn-default" name="search">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Hello <?=$_SESSION['username']?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href=<?php echo $url; ?> >Profile</a>
                            </li>
                            <li>
                                <a href="orders.php">Orders</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <form class="navbar-form" action="signout.php">
                            <div class="form-group">
                                <button class="btn btn-default butt">
                                    <span class="glyphicon glyphicon-off"></span> Sign out
                                </button>
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="cart.php">Cart <span class="glyphicon glyphicon-shopping-cart"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>