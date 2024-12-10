document.addEventListener('DOMContentLoaded', function () {
    // Manejar notificaciones
    const notifButton = document.getElementById('notifButton');
    const notifMenu = document.getElementById('notifMenu');

    notifButton.addEventListener('click', function (event) {
        notifMenu.classList.toggle('hidden');
        event.stopPropagation();
    });

    document.addEventListener('click', function (event) {
        if (!notifButton.contains(event.target) && !notifMenu.contains(event.target)) {
            notifMenu.classList.add('hidden');
        }
    });

    // Manejar el menú del usuario
    const menuButton = document.getElementById('menuButton');
    const userMenu = document.getElementById('userMenu');

    menuButton.addEventListener('click', function (event) {
        userMenu.classList.toggle('hidden');
        event.stopPropagation();
    });

    document.addEventListener('click', function (event) {
        if (!menuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });
});