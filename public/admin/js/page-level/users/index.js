document.addEventListener('DOMContentLoaded',function() {
    const deleteBtns = document.querySelectorAll('.delete-user');
    deleteBtns.forEach((btn) =>btn.addEventListener('click',deleteUser));

    const makeAdminBtns = document.querySelectorAll('.makeAdmin');
    makeAdminBtns.forEach((btn) => btn.addEventListener('click',makeAdmin));

    const revokeAdminBtns = document.querySelectorAll('.revokeAdmin');
    revokeAdminBtns.forEach((btn) =>btn.addEventListener('click',revokeAdmin));
})
function deleteUser()
{
    const route = this.dataset.deleteRoute;
    const deleteForm = document.querySelector('#deleteForm');
    deleteForm.setAttribute('action',route);
    const deleteModal = new bootstrap.Modal("#deleteModal");
    deleteModal.show();
}
function makeAdmin()
{
    const route = this.dataset.makeadminRoute;
    const makeAdminForm = document.querySelector('#makeAdminForm');
    makeAdminForm.setAttribute('action',route);
    const makeAdminModal = new bootstrap.Modal("#makeAdminModal");
    makeAdminModal.show();
}
function revokeAdmin()
{
    const route = this.dataset.revokeadminRoute;
    const revokeAdminForm = document.querySelector('#revokeAdminForm');
    revokeAdminForm.setAttribute('action',route);
    const revokeAdminModal = new bootstrap.Modal("#revokeAdminModal");
    revokeAdminModal.show();
}
