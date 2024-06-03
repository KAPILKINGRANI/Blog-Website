document.addEventListener('DOMContentLoaded',function() {
    const deleteBtns = document.querySelectorAll('.deleteComment');
    deleteBtns.forEach((btn) =>btn.addEventListener('click',deleteComment));

    const approveCommentBtns = document.querySelectorAll('.approveComment');
    approveCommentBtns.forEach((btn) => btn.addEventListener('click',approveComment));
})
function deleteComment()
{
    const route = this.dataset.deletecommentRoute;
    const deleteForm = document.querySelector('#deleteForm');
    deleteForm.setAttribute('action',route);
    const deleteModal = new bootstrap.Modal("#deleteModal");
    deleteModal.show();
}
function approveComment()
{
    const route = this.dataset.approvecommentRoute;
    const approveCommentForm = document.querySelector('#approveCommentForm');
    approveCommentForm.setAttribute('action',route);
    const approveCommentModal = new bootstrap.Modal("#approveCommentModal");
    approveCommentModal.show();
}
