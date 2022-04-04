//sidebar vars
const sidebarButton = document.getElementById("sidebarButton");
const sidebar = document.getElementById("sidebar");
const petsGrid = document.getElementById("petCardGrid");

//profile slideshow vars
const images = document.getElementsByClassName('profile__figure');
const buttonLeft = document.getElementById("left");
const buttonRight = document.getElementById("right");
const columnImages = document.getElementsByClassName('profile__column-image')

//homepage slideshow vars
const mainImages =  document.getElementsByClassName("homepage__pet-figure")

//slideshow vars
let imageDisplay = 0;
let previous;
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

//slideshow profile
if (buttonLeft!=null){
    buttonLeft.onclick = () => {
        nextPicture(-1, images);
        changeColumnFocus(previous);
    }
}

if (buttonRight!=null){
    buttonRight.onclick = () => {
        nextPicture(+1, images);
        changeColumnFocus(previous);
    }
}

if (columnImages.length!=0){
    for(let i=0; columnImages.length > i; i++){
        const columnImage = columnImages[i];
        columnImage.onclick = () => {
            images[imageDisplay].style.display = 'none';
            previous = imageDisplay;
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

//slideshow homepage
if (mainImages.length != 0){
    mainImages[imageDisplay].style.display = 'block';
    setInterval(function() {nextPicture(1, mainImages)}, 10000)
}

function nextPicture(move, imageList){
    imageList[imageDisplay].style.display = 'none';
    previous = imageDisplay;
    if(imageDisplay == imageList.length-1){
        imageDisplay = 0;
    } else if(imageDisplay == 0){
        imageDisplay = imageList.length-1
    } else{
        imageDisplay += move;
    }
    imageList[imageDisplay].style.display = 'block';
}