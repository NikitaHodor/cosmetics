<?php

    class AdminPanelController
    {
        public function panel() {
            $title = 'Панель администратора';
            include_once('./views/admin/index.php');
            return;
    }
}
