document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.edit-toggle').forEach(item => {
        item.addEventListener('click', event => {
            let userId = event.target.getAttribute('data-user-id');
            document.querySelectorAll('.edit-form').forEach(div => {
                if (div.id !== 'editUser' + userId && div.classList.contains('show')) {
                    new bootstrap.Collapse(div).hide();
                }
            });
        });
    });
});
