//sidebar vars
const sidebarButton = document.getElementById("sidebarButton");
const sidebar = document.getElementById("sidebar");
const petsGrid = document.getElementById("petCardGrid");
let folded = false;
const filtersButton = document.getElementById("filters")
const closeSidebar = document.getElementById("closeSidebar")

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
const paymentInput = document.getElementById('payment');

//close vars
const dismiss = document.getElementById('dismiss');
const saved = document.getElementById('saved');

if (dismiss !=null){
    dismiss.onclick = () => {
        saved.style.display = 'none'
    }
}

//respond vars
const respond = document.getElementById('respond');
const confirme = document.getElementById('confirm')
const overlay = document.getElementById('overlay');
const yes = document.getElementById('yes')
const no = document.getElementById('no')

//respond
if(respond !=null){
    confirme.style.display = 'none'
    respond.onclick = () =>{
        confirme.style.display = 'flex'
        overlay.style.display = 'block'
    }
    
    yes.onclick = () =>{

    }

    // no.onclick = () =>{
    //     confirme.style.display = 'none'
    //     overlay.style.display = 'none'
    // }
}

//sidebar
if (sidebarButton != null) {
    filtersButton.onclick = () =>{
        filtersButton.style.display = "none"
        sidebar.style.display = 'block'
    }

    closeSidebar.onclick = () =>{
        sidebar.style.display = "none"
        filtersButton.style.display = "block"
    }

    const sidebarStyle = sidebar.style 
    sidebarButton.onclick = () => {
        //if sidebar is folded
        if (folded) {
            sidebar.style = sidebarStyle
            folded = false;
        }
        //if not folded
        else {
            folded = true;
            sidebar.style.marginLeft = "-18.5rem"
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

if(paymentInput != null){
    paymentInput.onchange = () => {
        const minPayment = paymentInput.value
        for(let i = 0; i < petCards.length; i++){
            const payment = petCards[i].dataset.payment
            if(minPayment > payment){
                console.log("input", paymentInput.value)
                console.log('payment', petCards[i].dataset.payment)
                petCards[i].style.display = "none"
            } else {
                petCards[i].style.display ="block"
            }
        }
    }
}

