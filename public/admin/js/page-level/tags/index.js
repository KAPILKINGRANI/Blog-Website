document.addEventListener('DOMContentLoaded',function() {
    const deleteBtns = document.querySelectorAll('.delete-tag');
    deleteBtns.forEach((btn) => btn.addEventListener('click', deleteTag));
})
    function deleteTag() {
        const route = this.dataset.deleteRoute;
        console.log(route);
        const deleteForm = document.querySelector('#deleteForm');
        deleteForm.setAttribute('action', route);
        const deleteModal = new bootstrap.Modal('#deleteModal');
        deleteModal.show();
    }

