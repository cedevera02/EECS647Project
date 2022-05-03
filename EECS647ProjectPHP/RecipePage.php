<!DOCTYPE html>
<link rel = "stylesheet" type = "text/css" href = "style.css"/>
<head>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
            <!-- Logo Placeholder for Inlustration -->
            <a href="IndexHome.php"><i class="fa fa-angellist"></i> EZ Recipe</a>
            </div>

            <!-- Navbar Links -->
            <ul id="menu">
            <li><a href="IndexHome.php">Home</a></li><!--
        --><li><a href="FindRecipes.php">Find Recipes</a></li>
            </ul>
        </div>
    </nav>


    <!-- Menu Icon -->
    <div class="menuIcon">
    <span class="icon icon-bars"></span>
    <span class="icon icon-bars overlay"></span>
    </div>


    <div class="overlay-menu">
    <ul id="menu">
        <li><a href="IndexHome.php">Home</a></li>
        <li><a href="FindRecipes.php">Find Recipes</a></li>
        </ul>
    </div>
</head>

<body>
    <br><br><br><br><br><br><br><br><br>
    <header></header>
    <input type="text" id="ReceivedRecipeId" value="Mickey"l></input>
    <div class="centered">
    <script>
        var qs = new Querystring();
        var v1 = qs.get("myVar");
        document.getElementById("ReceivedRecipeId").value = v1;
    </script>
        <?php 
            //$idOfRecipe = $_GET['ReceivedRecipeId'];
            // $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");
            

            // if($mysqli->connect_errno){
            //     echo "<p>Connection Failed</p>";
            //     exit();
            // }
            // $query = "SELECT id, name, type, prep_time, total_price FROM Recipe WHERE id = $idOfRecipe;
            echo '<h2>Chicken Alfredo</h2>';
        ?>
    </div>
</body>