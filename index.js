const tabs = document.querySelector(".blog-tabs");
const btns = document.querySelectorAll(".blog-button");
const articles = document.querySelectorAll(".content");
const images = document.querySelectorAll(".blog-img-item");

tabs.addEventListener("click", (event) => {
    const id = event.target.dataset.id;
    if (id) {
        btns.forEach((btn) =>{
            btn.classList.remove("live");
        });
        event.target.classList.add("live");

        articles.forEach((article) => {
            article.classList.remove("live");
        });
        const element = document.getElementById(id);
        element.classList.add("live");   
        
        images.forEach((image) => {
            if (image.dataset.id === id) {
                image.classList.add("live");
            } else {
                image.classList.remove("live");
            }
        });

    }
});


var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");

function opentab(tabname)
{
    for(tablink of tablinks)
    {
        tablink.classList.remove("active-link");
    }
    for(tabcontent of tabcontents)
    {
        tabcontent.classList.remove("active-tab");
    }
    event.currentTarget.classList.add("active-link");
    document.getElementById(tabname).classList.add("active-tab");
}