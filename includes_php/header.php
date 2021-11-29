<div class="cover">
    <header>
        <div class="wrapper">
            <div class="content">
                <div class="logo">
                    <a href="../index.php">
                        <span class="films">Films</span><span class="four">4</span><span class="you">You</span>
                    </a>
                </div>
                <div class="menu_body">
                    <form action="" class="search_by_name">
                        <input type="text" placeholder="Пошук за назвою..." class="tags">
                        <button type="submit"><img src="../img/search_icon" alt=""></button>
                    </form>
                    <div class="advanced_search">
                        <a href="">Розширений пошук</a>
                    </div>
                    <?php
                    $username = $_COOKIE['user'];
                    if ($username == ''):
                        ?>
                        <div class="forms">
                            <div class="sign_in"><a href="#"> Вхід </a></div>
                            <div class="sign_up"><a href="../register.php"> Реєстрація </a></div>
                            <div class="sign_in_block">
                                <form action="auth.php" method="post">
                                    <span>Уведіть логін:</span><br>
                                    <input type="text" name="login" placeholder="User777"><br>
                                    <span>Уведіть пароль:</span><br>
                                    <input type="password" name="password" placeholder="******"><br>
                                    <button type="submit">Увійти</button>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="user_panel">
                    <span class="hello_user">Вітаємо<?php
                        if (mb_strlen($username) < 15) {
                            echo ', ' . $username;
                        }
                        ?>!</span><br>
                            <a href="exit.php">Вийти</a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="menu_icon"><span></span></div>

            </div>
        </div>
    </header>
    <div class="wrapper">