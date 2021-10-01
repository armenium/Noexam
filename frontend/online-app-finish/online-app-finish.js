let closeBtn = document.querySelector(".online-app-pop-up__close-icon")
let popup = document.querySelector(".online-app-pop-up")

closeBtn.addEventListener("click", () => {
    popup.classList.remove("online-app-pop-up--active")
})