const navOpenBtn = document.querySelector(".navOpenBtn");
const navCloseBtn = document.querySelector(".closeBtn");
const NavPhone = document.querySelector(".navPhone");

navOpenBtn.addEventListener("click", () => {
	NavPhone.classList.toggle("showNavMobile");
});

navCloseBtn.addEventListener("click", () => {
	NavPhone.classList.toggle("showNavMobile");
});

const navLinks = document.querySelectorAll(".nav-links");

navLinks.forEach((link) => {
	link.addEventListener("click", () => {
		NavPhone.classList.remove("showNavMobile");
	});
});
