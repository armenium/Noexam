let closeBtn = document.querySelector(".online-app-pop-up__close-icon")
let popup = document.querySelector(".online-app-pop-up")
let html = document.querySelector("html")
html.style.overflow = "hidden" // add to open popup function

closeBtn.addEventListener("click", () => {
    popup.classList.remove("online-app-pop-up--active")
    html.style.overflow = "visible"
})