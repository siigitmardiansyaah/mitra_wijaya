"use strict";
!(function () {
	const e = document.querySelector("#animation-dropdown"),
		t = document.querySelector("#animationModal");
	e &&
		(e.onchange = function () {
			(t.classList = ""),
				t.classList.add("modal", "animate__animated", this.value);
		});
	const a = document.querySelector("#youTubeModal"),
		o = a.querySelector("iframe");
	a.addEventListener("hidden.bs.modal", function () {
		o.setAttribute("src", "");
	});
	[].slice
		.call(document.querySelectorAll('[data-bs-toggle="modal"]'))
		.map(function (e) {
			e.onclick = function () {
				const e = this.getAttribute("data-bs-target"),
					t = `${this.getAttribute("data-theVideo")}?autoplay=1`,
					a = document.querySelector(`${e} iframe`);
				a && a.setAttribute("src", t);
			};
		}),
		document.querySelectorAll(".carousel").forEach((e) => {
			e.addEventListener("slide.bs.carousel", (t) => {
				var a = $(t.relatedTarget).height();
				$(e).find(".active.carousel-item").parent().animate({ height: a }, 500);
			});
		});
})();
