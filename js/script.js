$(function () {
    const iconMenu = document.querySelector(".menu_icon");
    const menuBody = document.querySelector(".menu_body");
    iconMenu.addEventListener("click", function (e) {
        document.querySelector('body').classList.toggle('lock');
        iconMenu.classList.toggle('active');
        menuBody.classList.toggle('active');
    });

    $(document).tooltip();

    let availableTags = [];
    $.ajax({
        url: 'db/get_film_names.php',
        type: 'GET',
        success: data => {
            availableTags = Array.from(JSON.parse(data)).map(value => value[0]);
            $(".tags").autocomplete({
                source: availableTags
            });
        }
    });



    document.querySelector('header .sign_in').addEventListener('click', evt => {
        document.querySelector('header .sign_in_block').classList.toggle('active');
        document.querySelector('header .sign_in').classList.toggle('active');
    })

    let advanced_search = document.querySelector('header .advanced_search a');
    let nameOfIcon = '';
    if (advanced_search.textContent.toLowerCase().replaceAll(' ', '') === 'розширенийпошук') {
        nameOfIcon = 'ua_icon';
    } else if (advanced_search.textContent.toLowerCase().replaceAll(' ', '') === 'расширенныйпоиск') {
        nameOfIcon = 'ru_icon';
    } else if (advanced_search.textContent.toLowerCase().replaceAll(' ', '') === 'advancedsearch') {
        nameOfIcon = 'en_icon';
    }

    let langIcon = document.querySelector(`footer .language_icons .${nameOfIcon}`);
    langIcon.classList.add('chosen_lang');

});

