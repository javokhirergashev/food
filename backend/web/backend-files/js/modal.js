$(document).ready(function () {
    $('.work-type').css('display', 'none');
    $('.deputy').change(function (e) {
        if ($(this).val() === "1") {
            console.log($('.work-type'))
            $('.work-type').css('display', 'block');
        } else {
            $('.work-type').css('display', 'none');
            $('.work-type').val(null);
        }
    })

    $('#w2-button').click(function () {

        let menu = $('#w3');
        if (!menu.hasClass('show')) {
            menu.addClass('show')
            menu.attr('style','position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 45px, 0px);')
        } else {
            menu.removeClass('show')
        }

        $(document).on('click', function (event) {
            // Check if the clicked element is not the button with id "ignoreButton"
            if (!$(event.target).is('#w2-button')) {
                // Change the body class
                menu.removeClass('show')
            }
        });

    })

})

document.addEventListener("DOMContentLoaded", function () {
    // Retrieve active tab from Local Storage
    const activeTab = localStorage.getItem("activeTab");
    if (activeTab) {
        const active = document.querySelector('.parent-active');
        let links = active.querySelectorAll('.active');
        links.forEach((item) => {
            item.classList.remove("active");
        })


        let element = document.querySelectorAll(`a[data-href="${activeTab}"]`);
        let tabElement = element[0]
        if (tabElement) {
            tabElement.classList.add("active");
            const tabContentId = tabElement.getAttribute("href");
            document.querySelector(tabContentId).classList.add("show", "active");
        }
    } else {
        let element = document.querySelector(`a[data-href="#about-cont"]`);
        console.log(element)
        if (element) {
            element.classList.add("active");
            const tabContentId = element.getAttribute("href");
            document.querySelector(tabContentId).classList.add("show", "active");
        }
    }

    // Listen for tab clicks
    const tabLinks = document.querySelectorAll(".nav-link");
    tabLinks.forEach((link) => {
        link.addEventListener("click", function () {
            let href = link.attributes.href.nodeValue;
            if (href.length > 2) {
                localStorage.setItem("activeTab", href);
            }
        });
    });
});


$('#form-modal-submit').on('click', function (e) {

    $('#modal-form').submit();

})

$('#form-modal-cancel').on('click', function (e) {
    $('#cancel-form').submit();
})

$(document).ready(function () {

    $('.open-modal-class').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#history-queue_id').val(id)
    })


    $('.cancel-button').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#hidden-cancel-id').val(id)
    })

})





