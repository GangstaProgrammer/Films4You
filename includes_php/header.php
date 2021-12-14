<?php
require_once 'includes_php/set_lang.php';
?>
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
                    <form action="search_by_name.php" class="search_by_name">
                        <input type="text" placeholder="<?= $lang->get('SEARCH_BY_NAME')?>..." class="tags" name="keywords">
                        <button type="submit"><img src="../img/search_icon" alt=""></button>
                    </form>
                    <div class="advanced_search">
                        <a href=""><?= $lang->get('ADVANCED_SEARCH')?></a>
                    </div>
                    <?php
                    $username = $_COOKIE['user'];
                    if ($username == ''):
                        ?>
                        <div class="forms">
                            <div class="sign_in"><a href="#"> <?= $lang->get('SIGN_IN')?> </a></div>
                            <div class="sign_up"><a href="../register.php"> <?= $lang->get('SIGN_UP')?> </a></div>
                            <div class="sign_in_block">
                                <form action="auth.php" method="post">
                                    <span><?= $lang->get('ENTER_LOGIN')?>:</span><br>
                                    <input type="text" name="login" placeholder="User777"><br>
                                    <span><?= $lang->get('ENTER_PASSWORD')?>:</span><br>
                                    <input type="password" name="password" placeholder="******"><br>
                                    <button type="submit"><?= $lang->get('SIGN_IN')?></button>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="user_panel">
                    <span class="hello_user"><?= $lang->get('WELCOME')?><?php
                        if ($_COOKIE['admin'] == 'yes') {
                            echo ', <a href="db/db_main.php">' . $username . '</a>';
                        } else if (mb_strlen($username) < 15) {
                            echo ', ' . $username;
                        }
                        ?>!</span><br>
                            <a href="exit.php"><?= $lang->get('LOG_OUT')?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="menu_icon"><span></span></div>

            </div>
        </div>
    </header>
    <div class="wrapper">