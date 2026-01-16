
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownLinks = document.querySelectorAll('.menu-item-has-children > a');

        dropdownLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // prevents default page navigation
                const subMenu = this.nextElementSibling;
                subMenu.classList.toggle('show');
            });
        });
    });

