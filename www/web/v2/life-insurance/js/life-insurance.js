let btnsToTop = document.querySelectorAll(".top__btn")

btnsToTop.forEach((btn) => btn.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth"
	})
}));
