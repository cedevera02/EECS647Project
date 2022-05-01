var slideIndex = 0;
var recipeId = -1;
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
function setRecipe(ID){
    recipeID = ID;
}

function getRecipe(){
    document.getElementById("ReceivedRecipeId").value = recipeID;
}
