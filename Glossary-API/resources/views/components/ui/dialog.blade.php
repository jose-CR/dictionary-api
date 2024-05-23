<dialog {{ $attributes->merge(['class' => 'fixed transform -translate-x-1/2 -translate-y-1/2 b-2 rounded-lg p-8 bg-white shadow-[0 4px 8px rgb(0, 0, 0, 0.1)]' ]) }}>
    {{ $slotdialog }}                      
</dialog>

<script>
function openButtonEdit(id) {
    const dialogForm = document.getElementById('form-dialog-' + id);
    dialogForm.showModal();
}

function closeButtonEdit(id) {
    const dialogForm = document.getElementById('form-dialog-' + id);
    dialogForm.close();
}

function submiteditForm(rowId, event) {
    event.preventDefault();

    let form = document.getElementById('editForm-' + rowId);
    let formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => {
        console.log('Raw response:', response);

        const contentType = response.headers.get('content-type');
        if (contentType && contentType.includes('application/json')) {
            return response.json();
        } else {
            return response.text().then(text => {
                console.error('Received non-JSON response:', text);
                throw new Error(text);
            });
        }
    })
    .then(data => {
        console.log('Parsed data:', data);
        if (data.errors) {
            // Maneja errores de validación
            if (data.errors.category) {
                alert(data.errors.category[0]);
            }
            if (data.errors.subCategory) {
                alert(data.errors.subCategory[0]);
            }
        } else if (data.message) {
            console.log(data.message);
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ha ocurrido un error: ' + error.message);
    });
}
</script>

<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->