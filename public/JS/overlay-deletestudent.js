
let deleteButtons = document.querySelectorAll('.btn.delete');
let overlayDelete = document.querySelector('.overlay-deletestudent');
let student = document.getElementById('studentCode');
let formDelete = document.forms['deleteForm'];
let targetRow = null;


if (overlayDelete) {
	let btnCancel = overlayDelete.querySelector('.buttons-form button:first-child');
	let form = overlayDelete.querySelector('form');
	let messageP = overlayDelete.querySelector('.info-form p');

	const showOverlay = (row) => {
		targetRow = row;
		const nombre = row.cells[1] ? row.cells[1].textContent.trim() : '';
		messageP.textContent = `¿Está seguro de eliminar al estudiante "${nombre}"?`;
		const codigo = row.cells[0] ? row.cells[0].textContent.trim() : '';
		student.value = codigo;
		
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

	overlayDelete.addEventListener('click', (e) => {
		if (e.target === overlayDelete) hideOverlay();
	});

	form.addEventListener('submit', (e) => {
		e.preventDefault();
		if (targetRow) {
			
			formDelete.method='POST';
			formDelete.action='operations/deleteStudent.php';
			targetRow.remove();
			formDelete.submit();
			
		}
		hideOverlay();
	});
}

