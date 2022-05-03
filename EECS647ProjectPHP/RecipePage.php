<!DOCTYPE html>
<link rel = "stylesheet" type = "text/css" href = "style.css"/>
<script src="script.js"></script>
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
    <form name="form" action="" method="post">
        <!-- <input type="search" id="ReceivedRecipeId"><br>
        <input type="submit" value="Search"> -->
        <select name = "ReceivedRecipeId" id="ReceivedRecipeId" data-filter="make" class="filter-make filter form-control">
            <option value="-1">-1</option>
            <option value="001">001</option>
        </select>
        <button class="btn btn-block btn-primary" onclick="">Search</button>
    </form>
    <div class="centered">
        <?php
            $idOfRecipe = isset($_POST["ReceivedRecipeId"]) ? $_POST["ReceivedRecipeId"] : -1;
            $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");
            if($mysqli->connect_errno){
                echo "<p>Connection Failed</p>";
                exit();
            }
            echo "<h1>{$idOfRecipe}</h1>";
            $query = "SELECT name, instruction, prep_time, total_price FROM Recipe WHERE recipe_id = {$idOfRecipe}";
            if ($result = $mysqli->query($query)){
                while($row = $result->fetch_assoc()){
                    echo "<h2>Recipe of " . $row["name"]. " :</h2><br><br>". $row["instruction"]. "<br>Estimated preperation time: ~" . $row["prep_time"] . " mins<br><br><h3>Total Price = $" . $row["total_price"] . "</h3><br>";
                }
            }
            /*if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h2>Recipe of " . $row["name"]. " :</h2><br><br>". $row["instruction"]. "<br>Estimated preperation time: ~" . $row["prep_time"] . " mins<br><br><h3>Total Price = $" . $row["total_price"] . "</h3><br>";
                }
            }else {
                echo "No recipe found!";
            }*/
            //$idOfRecipe = $_GET["ReceivedRecipeId"];
            /*$mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");
            

            if($mysqli->connect_errno){
                echo "<p>Connection Failed</p>";
                exit();
            }
            //$query = "SELECT name, instruction, total_price FROM Recipe WHERE recipe_id = {$idOfRecipe}";
            $query = "SELECT name, instruction, prep_time, total_price FROM Recipe WHERE recipe_id = '002'";
            $result = mysqli_query($mysqli, $query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h2>Recipe of " . $row["name"]. " :</h2><br><br>". $row["instruction"]. "<br>Estimated preperation time: ~" . $row["prep_time"] . " mins<br><br><h3>Total Price = $" . $row["total_price"] . "</h3><br>";
                }
            }else {
                echo "No recipe found!";
            }*/
        ?>
    </div>
</body>
