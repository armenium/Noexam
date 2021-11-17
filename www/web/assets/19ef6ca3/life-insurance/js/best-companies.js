let btnsReadMore = document.querySelectorAll(".btn-read-more")
let btnsHide = document.querySelectorAll(".btn-hide")
let listItems = document.querySelectorAll(".best-companies__item")

btnsReadMore.forEach((btn) => btn.addEventListener("click", () => {
	btn.previousElementSibling.classList.add("company__footer--active")
}))

btnsHide.forEach((btn) => btn.addEventListener("click", () => {
	btn.previousElementSibling.previousElementSibling.classList.remove("company__footer--active")
}))

btnsHide.forEach((item) => item.before = "01")
