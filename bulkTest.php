<?php
/*
* На вход данному скрипту передаются неизвестные параметры
* Задача: максимально оптимизировать код, чтобы при любых условиях он на 100% сохранил свою функциональность
* Т.е. вывод скрипта до и после оптимизации должен быть одинаковым
* Оптимизация подразумевает собой хороший PHP5 стиль, безопасность, подготовленность к highload и т.д.
* В результате эти несколько строчек должны стать "идеальным" кодом с Вашей точки зрения
*/
/*
// подключение к БД опущено
	
    $field = 'name';

    $user1 = $HTTP_GET_VARS['user1'];
    $result = mysql_query('SELECT * FROM users WHERE user='.$user1);
    $user1_data = mysql_fetch_assoc($result);

    $user2 = $HTTP_GET_VARS['user2'];
    $result = mysql_query('SELECT * FROM users WHERE user='.$user2);
    $user2_data = mysql_fetch_assoc($result);

    $user3 = $HTTP_GET_VARS['user3'];
    $result = mysql_query('SELECT * FROM users WHERE user='.$user3);
    $user3_data = mysql_fetch_assoc($result);

    $users = array();
    $users[] = $user1_data;
    $users[] = $user2_data;
    $users[] = $user3_data;

    $i = 0;
    do{print($users[$i]["$field"]."<br>");$i++;}while
    ($i<3);
*/

    /*================================================================*/

    $field = 'name';
    $params = array('user1', 'user2', 'user3');
    $users_in = null;
    $comma = '';
    $users = array();
    foreach ($params AS $param) {
        if (isset($_GET[$param])) {
            $users_in .= $comma."'".mysql_real_escape_string($_GET[$param])."'";
            $comma  = ",";
        }
    }

    $result = mysql_unbuffered_query ("SELECT `name` FROM `users` WHERE `user` IN (".$users_in.")");
    while ($res = mysql_fetch_assoc($result)) {
        $users[] = $res;
    }
    mysql_free_result($result);

    foreach ($users AS $user) {
        print($user[$field]."<br>");
    }

?>