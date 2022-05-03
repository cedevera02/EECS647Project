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
    <br><br><br><br><br>
    <div class="centered">
        <h2>Select Filters to Match What You Want To Eat</h2><br>
        <div id="Filters" class="form-group">
            <form name="form" action="FindRecipes.php" method="post">

                <label for="MealType">Meal Type:</label>
                <select name="MealType" id="MealType" data-filter="make" class="filter-make filter form-control">
                    <option value="None">N/A</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                </select>

                <label for="PrepTime">Prep Time:</label>
                <select name="PrepTime" id="PrepTime" data-filter="make" class="filter-make filter form-control">
                    <option value="0">N/A</option>
                    <option value="30">&lt30 min</option>
                    <option value="35">&gt30 min</option>
                </select>

                <button class="btn btn-block btn-primary" onclick="">Search</button>
            </form>
        </div>

        <section>
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <td>Name of Recipe:</td>
                        <td>Type:</td>
                        <td>Prep Time:</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $Meal = isset($_POST['MealType']) ? $_POST['MealType'] : "None";
                    $Prep = isset($_POST['PrepTime']) ? $_POST['PrepTime'] : 0;
                    $Empty = TRUE;

                    $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");

                    if($mysqli->connect_errno){
                        echo "<p>Connection Failed</p>";
                        exit();
                    }
                    
                    $query = "SELECT recipe_id, name, type, prep_time, total_price FROM Recipe";
                    if($Empty == FALSE){
                        if($Meal != "None"){
                            $query .= " AND type = '{$Meal}'";
                        }
                    }else{
                        if($Meal != "None"){
                            $query .= " WHERE type = '{$Meal}'";
                            $Empty = FALSE;
                        }
                    }
                    if($Empty == FALSE){
                        if($Prep != 0 && $Prep == 30){
                            $query .= " AND prep_time <= 30";
                        }elseif($Prep != 0 && $Prep == 35){
                            $query .= " AND prep_time > 30";
                        }
                    }else{
                        if($Prep != 0 && $Prep == 30){
                            $query .= " WHERE prep_time <= 30";
                        }elseif($Prep != 0 && $Prep == 35){
                            $query .= " WHERE prep_time > 30";
                        }
                    }

                    if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['type']}</td>";
                            echo "<td>{$row['prep_time']}</td>";
                            echo "<td><div class='table__button-group'><a href='RecipePage.php?{$row['recipe_id']}'>Make it!</a></td>";
                            echo "</tr>";
                        }
                    }
                    $result->free();
                
                ?>
                </tbody>
            </table>
        </section>

    </div>
</body>

<script>
    
</script>
