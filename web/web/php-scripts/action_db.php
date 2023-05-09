<?php
	include 'db_connection.php';
	session_start();
	if($_POST['title'] != "" and $_POST['description'] != "" and $_FILES){
		$email = $_SESSION["email"];

		$stmt = $mysql->prepare("SELECT `id` FROM `users` WHERE `email` = :email ");

		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$user = $stmt;
		$result = $user->fetch();
		$id_user = $result['id'];

		$title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
		$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);

		$stmt = $mysql->prepare("INSERT INTO `posts` (`title`, `description`, `data_load`, `id_user`) VALUES(:title ,:description, CURRENT_TIMESTAMP , '$id_user')");
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':description', $description);
		$stmt->execute();

		$post_id = $mysql->query("SELECT `id` FROM `posts` ORDER BY `id` DESC LIMIT 1");
		$post_id = $post_id->fetch();
		$post_id = $post_id['id'];

		for($i = 0; $i < count($_FILES); $i++){
			$file_type = substr($_FILES[$i]['type'], 0, 5);
			$img_size = 10000 * 1024 * 1024;
			$ext = pathinfo($_FILES[$i]['name'], PATHINFO_EXTENSION);
			$allowed = array('zip','doc','docx','xls','xlsx','pdf','jpg','png');

			if(!empty($_FILES[$i]['tmp_name']) and in_array($ext, $allowed) and $_FILES[$i]['size'] <= $img_size){
				$img = addslashes(file_get_contents($_FILES[$i]['tmp_name']));

				$file = $_FILES[$i];
				$u = uniqid();

				copy($file['tmp_name'], '../user-files/' . $u .$file['name']);
				$filePath = 'user-files/' . $u . $file['name'];

				$fileName = $file['name'];
				$fileSize = $file['size'];

				$stmt = $mysql->prepare("INSERT INTO `files` (`path`,`name`, `size`, `id_post`) VALUES('$filePath' ,'$fileName', '$fileSize' , '$post_id')");
				$stmt->execute();
			}

			else{
				echo "Ошибка загрузки файла(Неверный формат или превышен размер в 10 мб)";
				exit();
			}
		}
	}

	else{
		echo "Заполните все поля корректно!";
	}

?>
