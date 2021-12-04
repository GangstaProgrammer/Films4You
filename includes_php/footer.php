</div>
<footer>
    <div class="wrapper">
        <div class="content">
            <div class="copyright">© 2021 Films4You</div>
            <div class="language_icons">
                <?php
                $url = $_SERVER['REQUEST_URI'];
                $url = explode('?', $url);
                $url = $url[0];
                ?>
                <a href="<?= $url ?>?lang=en"><img src="img/icon-en-48.png" alt="" class="en_icon"></a>
                <a href="<?= $url ?>?lang=ua"><img src="img/icon-ua-48.png" alt="" class="ua_icon"></a>
                <a href="<?= $url ?>?lang=ru"><img src="img/icon-ru-48.png" alt="" class="ru_icon"></a>
            </div>
        </div>
    </div>
</footer>
</div>

