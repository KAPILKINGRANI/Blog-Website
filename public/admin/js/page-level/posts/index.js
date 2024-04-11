document.addEventListener('DOMContentLoaded',function() {
    const deleteBtns = document.querySelectorAll('.delete-post');
    deleteBtns.forEach((btn) => btn.addEventListener('click', deletePost));

    const publishBtns = document.querySelectorAll('.publish-post');
    publishBtns.forEach((btn) => btn.addEventListener('click',publishPost));
})
function deletePost() {
        const route = this.dataset.deleteRoute;
        const deleteForm = document.querySelector('#deleteForm');
        deleteForm.setAttribute('action', route);
        const deleteModal = new bootstrap.Modal('#deleteModal');
        deleteModal.show();
}

function publishPost()
{
        const route = this.dataset.publishRoute;
        const publishForm = document.querySelector('#publishForm');
        publishForm.setAttribute('action', route);
        const publishModal = new bootstrap.Modal('#publishModal');
        publishModal.show();
}

