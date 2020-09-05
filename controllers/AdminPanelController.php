<?php

    class AdminPanelController
    {
        public function panel() {
            $title = 'Панель администратора';
            include_once('./views/admin/panel.php');
            return;
    }
        public function usersList($parameters = []) {
            $title = 'Список пользователей';
            $id = $parameters[0];
            $usersModel = new AdminPanel();
			$users = $usersModel->getAll();



            if (isset($_POST['add_submit'])) {//add
                $user_login = $_POST['user_login'];
                $user_password = $_POST['user_password'];
                $user_is_admin = $_POST['user_is_admin'];
                $userInfo = array(
                    'user_login' => $user_login,
                        'user_password' => $user_password,
                        'user_is_admin' => $user_is_admin
                    );
               $userModel = new AdminPanel();
			     $user = $userModel->addUser($userInfo);
                 header('Location: ' . SITE_ROOT . 'admin/users/');
                return;
            } else if (isset($_POST['edit-submit'])) {//edit
                $user_edit_login = $_POST['edit_login'];
                $user_edit_is_admin = $_POST['edit_is_admin'];
                $user_edit_id = $id;
                $userEditInfo = array(
                    'user_login' => $user_edit_login,
                        'user_is_admin' => $user_edit_is_admin,
                         'user_id' => $user_edit_id
                    );
                 $userEditModel = new AdminPanel();
			     $userEdit = $userEditModel->editUser($userEditInfo);
                 header('Location: ' . SITE_ROOT . 'admin/users/');
                return;
            } else if (isset($_POST['delete_submit'])) {//delete
                 $userDeleteModel = new AdminPanel();
			     $userDelete = $userDeleteModel->deleteUser($id);
                 header('Location: ' . SITE_ROOT . 'admin/users/');
                return;
            }
            include_once('./views/admin/users/index.php');
    }

}
