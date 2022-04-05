//sidebar vars
const sidebarButton = document.getElementById("sidebarButton");
const sidebar = document.getElementById("sidebar");
const petsGrid = document.getElementById("petCardGrid");

//slideshow vars
const images = document.getElementsByClassName('imagelist');
const buttonLeft = document.getElementById("left");
const buttonRight = document.getElementById("right");
const columnImages = document.getElementsByClassName('column-images')
let imageDisplay = 0;
let previous;
if(images.length != 0){
    images[imageDisplay].style.display = 'block';
    changeColumnFocus(0)
}

//filters vars
const animalCheckBoxList = document.getElementsByClassName('animal-filter')
const petCards = document.getElementsByClassName('petCard');
const priceInput = document.getElementById('price');

//sidebar
if (sidebarButton != null) {
    sidebarButton.onclick = () => {
        //if sidebar is folded
        if (sidebar.style.marginLeft == "-19vw") {
            sidebar.style.marginLeft = "-2rem"
            petsGrid.style.width = "80%"
        }
        //if not folded
        else {
            sidebar.style.marginLeft = "-19vw"
            petsGrid.style.width = "100%"
        }
    }
}

//slideshow profile
if (buttonLeft!=null){
    buttonLeft.onclick = () => {
        nextPicture(-1, images, 'left');
        console.log(imageDisplay)
        changeColumnFocus(previous);
    }
}

if (buttonRight!=null){
    buttonRight.onclick = () => {
        nextPicture(+1, images, 'right');
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

function nextPicture(move, imageList, direction){
    imageList[imageDisplay].style.display = 'none';
    previous = imageDisplay;
    if(imageDisplay == imageList.length-1 && direction == 'right'){
        imageDisplay = 0;
    } else if(imageDisplay == 0 && direction == 'left'){
        imageDisplay = imageList.length-1
    } else{
        imageDisplay += move;
    }
    imageList[imageDisplay].style.display = 'block';
}

//filters
if(animalCheckBoxList.length != 0){
    for(let i = 0; i < animalCheckBoxList.length; i++){
        animalCheckBoxList[i].onchange = () =>{
            if(!animalCheckBoxList[i].checked){
                for(let j = 0; j< petCards.length; j++){
                    if(petCards[j].dataset.animal == animalCheckBoxList[i].id){
                        petCards[j].style.display = "none";
                    }
                }
            } else {
                for(let j =0; j< petCards.length; j++){
                    if(petCards[j].dataset.animal == animalCheckBoxList[i].id){
                        petCards[j].style.display = "block"
                    }
                }
            }
        }
    }
}

if(priceInput != null){
    priceInput.onchange = () => {
        console.log(priceInput.value)
        for(let i = 0; i < petCards.length; i++){
            if(priceInput.value > petCards[i].dataset.price){
                petCards[i].style.display = "none"
            } else {
                petCards[i].style.display ="block"
            }
        }
    }
}
