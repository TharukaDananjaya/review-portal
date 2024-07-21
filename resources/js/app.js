import './bootstrap';
// TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com 
import {
    Chart,
    initTE,
    Select
} from "tw-elements";

function isMobileDevice() {
    return window.innerWidth < 768; // Adjust the width threshold as needed
}

// Example usage
if (isMobileDevice()) {
    const sidebar = document.getElementById('default-sidebar');
    sidebar.classList.toggle('-translate-x-full');
} else {
    // Code for non-mobile devices
}
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn?.addEventListener('click', function () {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }

});
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('default-sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebarToggle2 = document.getElementById('sidebar-toggle-2');
    const mainContent = document.getElementById('main-content');
    const navBar = document.getElementById('navbar');

    sidebarToggle.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('sm:translate-x-0');
        mainContent.classList.toggle('sm:ml-64');
        navBar.classList.toggle('sm:ml-64');
    });
    sidebarToggle2.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('sm:translate-x-0');
        mainContent.classList.toggle('sm:ml-64');
        navBar.classList.toggle('sm:ml-64');
    });
});

$(document).ready(function () {
    $('#user-menu-button').click(function () {
        $('#user-menu').toggleClass('hidden');
        // Close the menu when clicking outside
        $(document).click(function (event) {
            if (!$(event.target).closest('#user-menu-button').length && !$(event.target).closest('#user-menu').length) {
                $('#user-menu').addClass('hidden');
            }
        });
    });

    $('#dropdown-toggle').click(function () {
        $('#dropdown-content').toggleClass('hidden');
        $('#dropdown-toggle svg').toggleClass('rotate-180');
    });

    $(document).click(function (event) {
        if (!$(event.target).closest('#dropdown-toggle').length && !$(event.target).closest('#dropdown-content').length) {
            $('#dropdown-content').addClass('hidden');
            $('#dropdown-toggle svg').removeClass('rotate-180');
        }
    });
});

// JavaScript to open the modal
document.getElementById('open-logout-modal')?.addEventListener('click', function () {
    document.getElementById('logout-modal').classList.remove('hidden');
});

// JavaScript to close the modal
document.getElementById('cancel-btn')?.addEventListener('click', function () {
    document.getElementById('logout-modal').classList.add('hidden');
});

// delete action
$(document).on("click", ".open-delete-modal", function () {
    document.getElementById('delete-modal').classList.remove('hidden');
    var url = this.id;
    $("#deleteForm").removeAttr("action")
    $("#deleteForm").attr("action", url)
    // $("#deleteForm").submit();
});
// JavaScript to open the modal
document.querySelector('.open-delete-modal')?.addEventListener('click', function () {

});
// JavaScript to close the modal
document.getElementById('cancel-delete-btn')?.addEventListener('click', function () {
    document.getElementById('delete-modal').classList.add('hidden');
});
// delete action
$(document).on("click", ".deleteBtn", function () {
    $("#deleteForm").submit();
});

// document.getElementById('sidebar-toggle').addEventListener('click', function () {
//     var drawerTarget = this.getAttribute('data-drawer-target');
//     var drawerElement = document.getElementById(drawerTarget);
//     var navBar = document.getElementById('navbar');
//     var mainContent = document.getElementById('main-content');

//     var isSmallDevice = window.innerWidth <= 640;
//     if (isSmallDevice) {
//         drawerElement.classList.toggle('-translate-x-full'); // Remove the 'sm:' prefix
//         navBar.classList.toggle('ml-64'); // Remove the 'sm:' prefix
//         mainContent.classList.toggle('ml-64'); // Remove the 'sm:' prefix
//         drawerElement.classList.toggle('relative'); // Remove the 'sm:' prefix
//     } else {
//         drawerElement.classList.toggle('sm:-translate-x-full'); // Remove the 'sm:' prefix
//         navBar.classList.toggle('sm:ml-64'); // Remove the 'sm:' prefix
//         mainContent.classList.toggle('sm:ml-64'); // Remove the 'sm:' prefix
//     }
// });
document.querySelectorAll('.sidebar-menu').forEach(function (menu) {
    menu.addEventListener('click', function () {
        var menuTarget = this.getAttribute('data-collapse-toggle');
        var collapsElement = document.getElementById(menuTarget);

        // Hide all collapsible elements
        document.querySelectorAll('.collapsible').forEach(function (item) {
            if (item.id !== menuTarget) {
                item.classList.add('hidden');
            }
        });

        // Toggle the visibility of the clicked collapsible element
        collapsElement.classList.toggle('hidden');
    });
});

if (dataArray != null && dataArray.length > 0) {
    // Chart
    // Extracting labels and data from the array
    const labels = dataArray.map(item => item.browser);
    const data = dataArray.map(item => item.screenPageViews);

    // Constructing the dataBarHorizontal object
    const dataBarHorizontal = {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Top Browsers",
                data: data,
            },],
        },
    };

    const optionsBarHorizontal = {
        options: {
            indexAxis: "y",
            scales: {
                x: {
                    stacked: true,
                    grid: {
                        display: true,
                        borderDash: [2],
                        zeroLineColor: "rgba(0,0,0,0)",
                        zeroLineBorderDash: [2],
                        zeroLineBorderDashOffset: [2],
                    },
                    ticks: {
                        color: "rgba(0,0,0, 0.5)",
                    },
                },
                y: {
                    stacked: true,
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: "rgba(0,0,0, 0.5)",
                    },
                },
            },
        },
    };


    // Example usage
    // Call showModal() to show the modal
    // Call hideModal() to hide the modal

    new Chart(
        document.getElementById("bar-chart-horizontal"),
        dataBarHorizontal,
        optionsBarHorizontal
    );
    initTE({ Chart, Select });
}
