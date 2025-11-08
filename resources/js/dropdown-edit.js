document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('editToggle');
    const submenu = document.getElementById('editSubmenu');
    const forms = document.querySelectorAll('.edit-form');

    // Toggle horizontal submenu
    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    });

    // Show selected form
    submenu.querySelectorAll('a').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const target = this.getAttribute('data-target');
            forms.forEach(form => form.style.display = 'none');
            document.getElementById(target).style.display = 'block';
            submenu.style.display = 'none';
        });
    });

    // Hide submenu if clicked outside
    document.addEventListener('click', function (e) {
        if (!toggle.contains(e.target) && !submenu.contains(e.target)) {
            submenu.style.display = 'none';
        }
    });
});
