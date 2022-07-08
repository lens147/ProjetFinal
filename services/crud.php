<?php

    class Crud{
        private $database;

        function __construct($database, $name, $pass){
            $this->database = new PDO($database, $name, $pass);
        }
        public function getdb()
        {
            $fetch = "SELECT * FROM `user`";
            $stat = $this->database->prepare($fetch);
            $stat->execute(array());
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function insertIntoInscription(String $name,String $lastname,String $email,String $pseudo,String $password,String $token)
        {
            $stat = $this->database->prepare("INSERT INTO `user`(`name`, `lastname`, `email`, `pseudo`, `password`, `admin`, `token`, `confirmer`) VALUES (:name, :lastname, :email, :pseudo, :password, 0, :token, 0)");
            $result = $stat->execute(array(':name' => $name, ':lastname' => $lastname, ':email' => $email, ':pseudo' => $pseudo, ':password' => $password, ':token' => $token));
            return $result;
        }
        public function checkLoginPseudo(String $pseudo,String $password)
        {
            $fetch = "SELECT `pseudo`, `password`, `confirmer` FROM `user` WHERE pseudo = :pseudo AND password = :password";
            $stat = $this->database->prepare($fetch);
            $stat->execute(array(":pseudo" => $pseudo, ":password" => $password));
            $dataPseudo = $stat->fetch(PDO::FETCH_ASSOC);

            return $dataPseudo;
        }
        public function checkLoginEmail(String $email,String $password)
        {
            $fetch = "SELECT `email`, `password`, `confirmer` FROM `user` WHERE email = :email AND password = :password";
            $stat = $this->database->prepare($fetch);
            $stat->execute(array(":email" => $email, ":password" => $password));
            $dataEmail = $stat->fetch(PDO::FETCH_ASSOC);

            return $dataEmail;
        }
        public function oeuvre()
        {
            $fetch = "SELECT `id_oeuvre`,`user_key`, `titre`, `date`, `modification`, `image` FROM `oeuvre` ";
            $stat = $this->database->prepare($fetch);
            $stat->execute();
            $result = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function oneOeuvre($id_oeuvre)
        {
            $fetch = "SELECT `id_oeuvre`,`user_key`, `titre`, `date`, `modification`, `image` FROM `oeuvre` WHERE id_oeuvre = :id_oeuvre";
            $stat = $this->database->prepare($fetch);
            $stat->execute(array(":id_oeuvre" => $id_oeuvre));
            $result = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function oneAutor($id_user)
        {
            $fetch = "SELECT `id_user`, `lastname`, `name`, `pseudo`, `email`, `password` FROM `user` WHERE id_user = :id_user";
            $stat = $this->database->prepare($fetch);
            $stat->execute(array(":id_user" => $id_user));
            $result = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function addOeuvre(String $user_key,String $titre,String $image)
        {
            $stat = $this->database->prepare("INSERT INTO `oeuvre`(`user_key`, `titre`, `image`) VALUES (:user_key, :titre, :image)");
            $result = $stat->execute(array(':user_key' => $user_key, ':titre' => $titre, ':image' => $image));
            return $result;
        }
        public function getAllMyOeuvre($user_key) 
        {
            $stat = $this->database->prepare('SELECT * FROM `oeuvre` WHERE user_key = :user_key');
            $stat->execute(array(':user_key' => $user_key));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function getAllOeuvre()
        {
            $stat = $this->database->prepare('SELECT * FROM `oeuvre`');
            $stat->execute(array());
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function userP(String $pseudo)
        {
            $stat = $this->database->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
            $stat->execute(array(':pseudo' => $pseudo));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function userE(String $email)
        {
            $stat = $this->database->prepare('SELECT * FROM user WHERE email = :email');
            $stat->execute(array(':email' => $email));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function dropOeuvre(int $id_oeuvre)
        {
            $stat = $this->database->prepare('DELETE FROM `oeuvre` WHERE id_oeuvre = :id_oeuvre');
            $stat->execute(array(':id_oeuvre' => $id_oeuvre));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function modifOeuvre(String $titre,String $modification,String $image,int $id_oeuvre)
        {
            $stat = $this->database->prepare('UPDATE `oeuvre` SET `titre`= :titre,`modification`= :modification,`image`= :image WHERE id_oeuvre = :id_oeuvre');
            $stat->execute(array(':titre' => $titre, ':modification' => $modification, ':image' => $image, ':id_oeuvre' => $id_oeuvre));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function recuperation(String $email)
        {
            $stat = $this->database->prepare('SELECT `token` FROM `user` WHERE email = :email');
            $stat->execute(array(':email' => $email));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function changeMDP(String $password,String $token)
        {
            $stat = $this->database->prepare('UPDATE `user` SET `password`= :password WHERE token = :token');
            $stat->execute(array(':password' => $password, ':token' => $token));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function userModif(String $name,String $lastname,String $email,String $pseudo,String $description,String $id_user)
        {
            $stat = $this->database->prepare('UPDATE `user` SET `name`=:name,`lastname`=:lastname,`email`=:email,`pseudo`=:pseudo,`description`=:description WHERE id_user = :id_user');
            $stat->execute(array(':name' => $name, ':lastname' => $lastname, ':email' => $email, ':pseudo' => $pseudo, ':description' => $description, ':id_user' => $id_user));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function userInfo(String $id_user)
        {
            $stat = $this->database->prepare('SELECT `id_user`, `name`, `lastname`, `email`, `pseudo`, `password`, `description` FROM `user` WHERE id_user = :id_user');
            $stat->execute(array(':id_user' => $id_user));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function confirmation(String $token)
        {
            $stat = $this->database->prepare('UPDATE `user` SET `confirmer`= 1 WHERE token = :token');
            $stat->execute(array(':token' => $token));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function addComment(String $commentaire,Int $id_user,String $name_user,Int $id_oeuvre)
        {
            $stat = $this->database->prepare("INSERT INTO `comment`(`commentaire`, `id_user`, `name_user`, `id_oeuvre`) VALUES (:commentaire, :id_user, :name_user, :id_oeuvre)");
            $result = $stat->execute(array(':commentaire' => $commentaire, ':id_user' => $id_user, ':name_user' => $name_user, ':id_oeuvre' => $id_oeuvre));
            return $result;
        }
        public function getComment(String $id_oeuvre)
        {
            $stat = $this->database->prepare("SELECT * FROM `comment` WHERE id_oeuvre = :id_oeuvre");
            $stat->execute(array(':id_oeuvre' => $id_oeuvre));
            $data = $stat->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        }
    }

?>