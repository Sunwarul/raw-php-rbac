<?php

function view($viewName) {
    include __DIR__ . '/../views/_header.php';
    include __DIR__ . '/../views/' . $viewName . '.php';
    include __DIR__ . '/../views/_footer.php';
}