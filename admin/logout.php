<?php
unset($_SESSION['logado']);
session_destroy();
header("Location: ../login");

