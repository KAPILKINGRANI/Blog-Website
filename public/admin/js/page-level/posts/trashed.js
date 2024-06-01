document.addEventListener('DOMContentLoaded',function() {
    const deleteBtns = document.querySelectorAll('.delete-post');
    deleteBtns.forEach((btn) => btn.addEventListener('click', deletePost));

    const restoreBtns = document.querySelectorAll('.restore-post');
    restoreBtns.forEach((btn) => btn.addEventListener('click',restorePost));
})
function deletePost() {
        const route = this.dataset.deleteRoute;
        const deleteForm = document.querySelector('#deleteForm');
        deleteForm.setAttribute('action', route);
        const deleteModal = new bootstrap.Modal('#deleteModal');
        deleteModal.show();
}

function restorePost()
{
        const route = this.dataset.publishRoute;
        const restoreForm = document.querySelector('#restoreForm');
        restoreForm.setAttribute('action', route);
        const restoreModal = new bootstrap.Modal('#restoreModal');
        restoreModal.show();
}

