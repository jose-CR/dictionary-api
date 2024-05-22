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
    body: formData
})
.then(response => response.json())
.then(data => {
    if(data && data.message) {
        console.log(data.message);
    }
    console.log(data);
})
.catch(error => {
    console.log('Error', error)
});
}

</script>

<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->