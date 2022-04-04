//sidebar vars
const sidebarButton = document.getElementById("sidebarButton");
const sidebar = document.getElementById("sidebar");
const petsGrid = document.getElementById("petCardGrid");

//slideshow vars
const images = document.getElementsByClassName('profile__figure');
const buttonLeft = document.getElementById("left");
const buttonRight = document.getElementById("right");
let imageDisplay = 0;
const columnImages = document.getElementsByClassName('profile__column-image')
if(images.length != 0){
    images[imageDisplay].style.display = 'block';
    changeColumnFocus(0)
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

//slideshow gallery
if (buttonLeft!=null){
    buttonLeft.onclick = () => {
        console.log(imageDisplay)
        images[imageDisplay].style.display = 'none';
        let previous = imageDisplay;
        if(imageDisplay == 0){
            imageDisplay = images.length-1;
        } else{
            imageDisplay--;
        }
        images[imageDisplay].style.display = 'block';
        console.log(imageDisplay)
        changeColumnFocus(previous)
    }
}

if (buttonRight!=null){
    buttonRight.onclick = () => {
        console.log(imageDisplay)
        images[imageDisplay].style.display = 'none';
        let previous = imageDisplay;
        if(imageDisplay == images.length-1){
            imageDisplay = 0;
        } else{
            imageDisplay++;
        }
        images[imageDisplay].style.display = 'block';
        console.log(buttonRight)
        changeColumnFocus(previous)
    }
}

if (columnImages.length!=0){
    for(let i=0; columnImages.length > i; i++){
        const columnImage = columnImages[i];
        columnImage.onclick = () => {
            images[imageDisplay].style.display = 'none';
            let previous = imageDisplay;
            imageDisplay = i
            images[imageDisplay].style.display = 'block';
            changeColumnFocus(previous)
        }   
    } 
}

function changeColumnFocus(previous){
    columnImages[previous].style.border = ""
    columnImages[imageDisplay].style.border = "black 3px solid"
}