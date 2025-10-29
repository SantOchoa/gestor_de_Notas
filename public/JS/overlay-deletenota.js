// Overlay delete student
const deleteButtons = document.querySelectorAll('.btn.delete');
const overlayDelete = document.querySelector('.overlay-deletenota');
let targetRow = null;

if (overlayDelete) {
	const btnCancel = overlayDelete.querySelector('.buttons-form button:first-child');
	const form = overlayDelete.querySelector('form');
	const messageP = overlayDelete.querySelector('.info-form p');

	const showOverlay = (row) => {
		messageP.textContent = `¿Está seguro de eliminar la nota?`;
		overlayDelete.style.display = 'flex';
		setTimeout(() => overlayDelete.style.opacity = '1', 10);
	};

	const hideOverlay = () => {
		overlayDelete.style.opacity = '0';
		setTimeout(() => {
			overlayDelete.style.display = 'none';
			targetRow = null;
		}, 250);
	};

	deleteButtons.forEach(btn => {
		btn.addEventListener('click', (e) => {
			e.preventDefault();
			const row = btn.closest('tr');
			if (row) showOverlay(row);
		});
	});

	btnCancel.addEventListener('click', (e) => {
		e.preventDefault();
		hideOverlay();
	});

	// Close when clicking outside the content
	overlayDelete.addEventListener('click', (e) => {
		if (e.target === overlayDelete) hideOverlay();
	});

	// Confirm delete
	form.addEventListener('submit', (e) => {
		e.preventDefault();
		if (targetRow) {
			// Remove row from DOM as placeholder for server-side deletion
			targetRow.remove();
		}
		hideOverlay();
	});
}

