//sidebar vars
const sidebarButton = document.getElementById("sidebarButton");
const sidebar = document.getElementById("sidebar");
const petsGrid = document.getElementById("petCardGrid");

//slideshow vars
const images = document.getElementsByClassName('profile__figure');
const buttonLeft = document.getElementById("left");
const buttonRight = document.getElementById("right");
let imageDisplay = 0;
console.log(images)
if(images.length != 0){
    images[imageDisplay].style.display = 'block';
}

//sidebar
if (sidebarButton != null) {
    sidebarButton.onclick = () => {
        //if sidebar is folded
        if (sidebar.style.left == "-18vw") {
            sidebar.style.left = "0vw"
            petsGrid.style.marginLeft = "22vw"
            petsGrid.style.width = "80%"
        }
        //if not folded
        else {
            sidebar.style.left = "-18vw"
            petsGrid.style.marginLeft = "2vw"
            petsGrid.style.width = "100%"
        }
    }
}

if (buttonLeft!=null){
    buttonLeft.onclick = () => {
        console.log(imageDisplay)
        images[imageDisplay].style.display = 'none';
        if(imageDisplay == 0){
            imageDisplay = images.length-1;
        } else{
            imageDisplay--;
        }
        images[imageDisplay].style.display = 'block';
        console.log(imageDisplay)
    }
}

if (buttonRight!=null){
    buttonRight.onclick = () => {
        console.log(imageDisplay)
        images[imageDisplay].style.display = 'none';
        if(imageDisplay == images.length-1){
            imageDisplay = 0;
        } else{
            imageDisplay++;
        }
        images[imageDisplay].style.display = 'block';
        console.log(buttonRight)
    }
}