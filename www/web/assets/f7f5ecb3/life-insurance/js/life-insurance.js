let btnsToTop = document.querySelectorAll(".article__btn")

btnsToTop.forEach((btn) => btn.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth"
	})
}));
