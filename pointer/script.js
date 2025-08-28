const canvas = document.getElementById("container");
const dot = document.getElementById("dot");
const xValue = document.getElementById("xValue");
const yValue = document.getElementById("yValue");
const timeEl = document.getElementById("time");

let lastClickTime = Date.now();

container.addEventListener("click", (event) => {
	const rect = container.getBoundingClientRect();
	const x = event.clientX - rect.left;
	const y = event.clientY - rect.top;

	dot.style.left = `${x}px`;
	dot.style.top = `${y}px`;
	dot.style.display = "block";

	xValue.textContent = `X: ${x}px`;
	yValue.textContent = `Y: ${y}px`;

	const now = Date.now();
	const elapsed = ((now - lastClickTime) / 1000).toFixed(2);
	timeEl.textContent = `Time: ${elapsed}s`;

	lastClickTime = now;
});
