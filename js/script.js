$(function () {
    const iconMenu = document.querySelector(".menu_icon");
    const menuBody = document.querySelector(".menu_body");
    iconMenu.addEventListener("click", function (e) {
        document.querySelector('body').classList.toggle('lock');
        iconMenu.classList.toggle('active');
        menuBody.classList.toggle('active');
    });

    $(document).tooltip();
    let availableTags = [
        "Апгрейд",
        "Астро (2018)",
        "Астрал (2010)",
        "Астрал: Глава 2 (2013)",
        "Астрал: Глава 3 (2015)",
        "Астрал: Новий вимір (2018)",
        "Астронавт Фармер (2006)",
        "Астральне місто: Духовна подорож (2010)"
    ];
    $(".tags").autocomplete({
        source: availableTags
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

