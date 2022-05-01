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
            <a href="IndexHome.html"><i class="fa fa-angellist"></i> EZ Recipe</a>
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
            <form name="form" action="" method="get">
                <label for="DietType">Choose a Diet Type:</label>
                <select name="DietType" id="DietType" data-filter="make" class="filter-make filter form-control">
                <option value="No preference">No preference</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Vegan">Vegan</option>
                </select>

                <label for="Prices">Prices:</label>
                <select name="Prices" id="Prices" data-filter="make" class="filter-make filter form-control">
                    <option value="N/A">N/A</option>
                    <option value="$">$</option>
                    <option value="$$">$$</option>
                    <option value="$$$">$$$</option>
                </select>

                <label for="MealType">Meal Type:</label>
                <select name="MealType" id="MealType" data-filter="make" class="filter-make filter form-control">
                    <option value="N/A">N/A</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                </select>

                <label for="PrepTime">Prep Time:</label>
                <select name="PrepTime" id="PrepTime" data-filter="make" class="filter-make filter form-control">
                    <option value="N/A">N/A</option>
                    <option value="<30min">&lt30 min</option>
                    <option value=">30min">&gt30 min</option>
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
                        <td>Total Price:</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <<?php 

                    $DietType = $_GET['DietType'];
                    $Prices = $_GET['Prices'];
                    $MealType = $_GET['MealType'];
                    $PrepTime = $_GET['PrepTime'];

                    $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");

                    if($mysqli->connect_errno){
                        echo "<p>Connection Failed</p>";
                        exit();
                    }
                    $query = "SELECT id, name, type, prep_time, total_price FROM Recipe WHERE type = $DietType AND
                    prep_time = $PrepTime";

                    if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>.$row['name'].</td>";
                            echo "<td>.$row['type'].</td>";
                            echo "<td>.$row['prep_time'].</td>";
                            echo "<td>$.row['total_price'].</td>";
                            echo "<td><div class="table__button-group"><a href="javascript:getRecipe(.$row['id'].);">Make it!</a></td>";
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