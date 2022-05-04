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

<body onload="setRecipe()">
    <br><br><br><br><br><br><br><br><br>
    <header></header>
    <div class="centered">
    <div class="form-hide">
        <form name="form" action="" method="POST">
            <select name = "ReceivedRecipeId" id="ReceivedRecipeId" data-filter="make" class="filter-make filter form-control">
                <?php
                    $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");
                    $query = "SELECT recipe_id, name FROM Recipe";
                    if ($result = $mysqli->query($query)){
                        while($row = $result->fetch_assoc()){
                            echo "<option value = '{$row['recipe_id']}'>{$row['name']}</option>";
                        }
                    }
                    $result->free();
                ?>
            </select>
            <button class="btn btn-block btn-primary" onclick="hide();">Get My Recipe</button>
        </form>
    </div>
        <?php
            $idOfRecipe = isset($_POST["ReceivedRecipeId"]) ? $_POST["ReceivedRecipeId"] : -1;
            $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");
            if($mysqli->connect_errno){
                echo "<p>Connection Failed</p>";
                exit();
            }
            $query = "SELECT name, instruction, prep_time, total_price FROM Recipe WHERE recipe_id = {$idOfRecipe}";
            $query2 = "SELECT name, quantity FROM Uses, Ingredients WHERE Uses.recipe_id = {$idOfRecipe} AND Uses.ingredients_id = Ingredients.ingredients_id";
            echo "<h2>Ingredients needed: </h2><br> ";
            if ($result2 = $mysqli->query($query2)){
                while($row = $result2->fetch_assoc()){
                    echo $row["name"]. "          " . $row["quantity"].  "<br>";
                }
            }
            $result2->free();
            echo "<br><br> ";
            if ($result = $mysqli->query($query)){
                while($row = $result->fetch_assoc()){
                    echo "<h2>Recipe of " . $row["name"]. " :</h2><br><br>". $row["instruction"]. "<br>Estimated preperation time: ~" . $row["prep_time"] . " mins<br><br><h3>Total Price = $" . $row["total_price"] . "</h3><br>";
                }
            }
            $result->free();            
        ?>
    </div>
</body>
<script>
    var reciId;
    function setRecipe(){
        var qs = location.search.substring(1);
        reciId = qs;
        document.getElementById("ReceivedRecipeId").value = qs;
        document.getElementById("form").submit();
    }
    window.onload = setRecipe;
</script>
