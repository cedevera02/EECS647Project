<!DOCTYPE html>
<link rel = "stylesheet" type = "text/css" href = "style.css"/>
<style>

    .active {
      background-color: #717171;
    }
    
    @keyframes fade {
      from {opacity: .1} 
      to {opacity: 1}
    }
    
    .center {
        text-align: center;
    }
    
    img {
        width: auto;
        height: 25%;
    }
    
    #slider div {
        display: flex;
        justify-content: center;
    }
    
</style>
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

<header>
    <h1>Welcome to EZ Recipes</h1>
</header>
    
<body>
    <h1 class="site-title">Welcome to EZ Recipes</h1>
    <div id="slider" class="wrapper">
        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/American-Breakfast.jpg"/>
        </div>

        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/Brownies.png"/>
        </div>
        
        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/Chicken-alfredo.jpg"/>
        </div>    
            
        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/chicken-stir-fry.jpg"/>
        </div>

        <div class="mySlides fade grid grid-center">           
            <img src="SlideShowImgs/Fish-and-Chips.png"/>
        </div>
            
        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/grilled-trout.jpg"/>
        </div>

        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/ratatouille.jpg"/>
        </div>

        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/Steak.jpg"/>
        </div>

        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/Trout.jpg"/>
        </div>

        <div class="mySlides fade grid grid-center">
            <img src="SlideShowImgs/Vegan-Okonomiyaki.jpg"/>
        </div>

    </div>

    <div id="Recipe of The Day" class="centered">
        <h2>Random Recipe:</h2>
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
                    $mysqli = new mysqli("mysql.eecs.ku.edu","y283c244","kai9ju3p","y283c244");

                    if($mysqli->connect_errno){
                        echo "<p>Connection Failed</p>";
                        exit();
                    }
                    $query = "SELECT recipe_id, name, type, prep_time, total_price FROM Recipe ORDER BY RAND() LIMIT 1";

                    if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['type']}</td>";
                            echo "<td>{$row['prep_time']}</td>";
                            echo "<td><div class='table__button-group'><a href='RecipePage.php?{$row['recipe_id']}'>Make it!</a></div></td>";
                            echo "</tr>";
                        }
                    }
                    $result->free();
                
                ?>
               
            </tbody>
        </table>
    </section>
</body>
<script src="script.js"></script>
<script>
var slideIndex = 0;
showSlides();
function showSlides(){
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0;i < slides.length;i++){
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length){slideIndex = 1;}
    slides[slideIndex-1].style.display = "flex";
    setTimeout(showSlides,2000)
    }
function getRecipe(ID){
    alert(ID);
}
function setRecipe(ID){
    document.getElementById("ReceivedRecipeId").value = ID;
    alert(ID);
}
</script>

