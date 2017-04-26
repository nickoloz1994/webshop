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
                    <li>
                        <a href="signin.php">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </a>
                    </li>
                    <li>
                        <a href="signup.php">
                            <span class="glyphicon glyphicon-user"></span> Sign Up
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>