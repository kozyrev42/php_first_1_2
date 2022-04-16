<html>
    <head>
    <meta charset="UTF-8">
    <title> Похищение </title>
    </head>

<body>

<h3>Сообщение о похищении</h3>

<?php                       // сценарий записывает данные из 3 форм html в БД                                                
   
    $host = '127.0.0.1';    // адрес сервера БД
    $user = 'root';         // пользователь БД
    $password = '';         // пароль
    $db_name = 'my_php';    // имя БД
    
    /*  в этот файл.php был направлен массив методом POST  */
    $you_name = $_POST['youname'];                          /*  достаём из массива $_POST данные, и определяем Их Переменной */                            
    $when_it_happened = $_POST['whеnithарреnd'];            /*  значение сохраняется в переменную */
    $email = $_POST['email'];     // изолируем данные из формы, для дальнейшей работы с ними
    
    echo 'Вы были похищены '. $when_it_happened .'<br/>';   /*  вызов 'строки' и переменной с данными */
    echo 'Ваше имя '. $you_name .'<br/><br/>';                       


    //$msg = 'Вы были похищены '. $when_it_happened . '. Ваше имя '. $you_name ;
    $msg = "Вы были похищены  $when_it_happened. <br/> \n  Ваше имя  $you_name <br/><br/>" ;  /* в двойных кавычках, PHP - при указании переменной, подставляет значение этой переменной */
    echo $msg;                                                               /*  \n - @mail`e текст будет перенесён на новую строку  */
                    /*  'строка в одинарных кавычках $var' никак не обрабатывается PHP */
                    /*  'одинарные' кавычки представляют текст заключенный в них */
                    /*  "строка в двойных кавычках $var" обрабатыватся PHP (переменная заменяется на значение) */


    // $subject = 'Тема сообщения';     /*  переменная содержит тему сообщения            */
    // $to = 'libe.nvk@gmail.com';      /*  переменная определяет адрес назначение письма */

    // mail ($to, $subject, $msg, 'From:' . $email);   /* функция отправляет email */


    $dbConnect = mysqli_connect($host, $user, $password, $db_name)
        or die ('Ошибка соединения с Сервером')
    ;
    

    $query = "INSERT INTO `сообщения` (     /* запрос в двойных кавычках обязательно */
        `youname`,`whеnithарреnd`,`email`)
        VALUES ('$you_name','$when_it_happened','$email')"
    ;

    $result = mysqli_query($dbConnect, $query)         //  mysqli_query - принимает 2 аругумента:
        or die ('Ошибка при выполнении запроса к БД')  //  первый:-> ссылка на соединение
    ;                                                  //  второй:-> запрос sql



    $query2 = 'SELECT * FROM `сообщения`';
    $result2 = mysqli_query($dbConnect, $query2);

            if(!$result2){ 
              echo 'Ошибка запроса: ' . mysqli_error($dbConnect) . '<br>';
              echo 'Код ошибки: ' . mysqli_errno($dbConnect);
             } else { 
                echo 'запрос успешен' . '<br>';    // выполнился
                while($row = $result2->fetch_assoc()){
                    echo $row['youname'];   // далее обрабатываем полученные данные
                }
            }

    mysqli_close($dbConnect);

?>

</body>
</html>
