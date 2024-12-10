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
const menuButtonTri = document.getElementById('menuButtonTri');
const userMenuTri = document.getElementById('userMenuTri');

menuButtonTri.addEventListener('click', function (event) {
    userMenuTri.classList.toggle('hidden');
    event.stopPropagation();
});

document.addEventListener('click', function (event) {
    if (!menuButtonTri.contains(event.target) && !userMenuTri.contains(event.target)) {
        userMenuTri.classList.add('hidden');
    }
});
});
