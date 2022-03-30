const sidebarButton = document.getElementById("sidebarButton");
const sidebar = document.getElementById("sidebar");
const petsGrid = document.getElementById("petCardGrid");

sidebarButton.onclick = () => {
    if(sidebar.style.left == "-18vw"){
        sidebar.style.left = "0vw"
        petsGrid.style.marginLeft = "22vw"
        petsGrid.style.width = "80%"
    } else {
        sidebar.style.left = "-18vw"
        petsGrid.style.marginLeft = "2vw"
        petsGrid.style.width = "100%"
    }
}