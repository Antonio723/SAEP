<?php

const HOST = 'localhost';
const USER = 'root';
const PASSWORD = 'manolo';
const DATABASE = 'icatalogo';

$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_error($conexao));
