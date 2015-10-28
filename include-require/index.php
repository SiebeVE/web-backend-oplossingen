<?php
$artikels = array(
  array(
    "title" => "Titel 1",
    "text"  => "Tekst 1",
    "tags"  => "tag1, tag2"
  ),
  array(
    "title" => "Titel 2",
    "text"  => "Tekst 2",
    "tags"  => "tag1, tag2"
  ),
  array(
    "title" => "Titel 3",
    "text"  => "Tekst 3",
    "tags"  => "tag1, tag2"
  )
);

include 'view/header-partial.html';
include 'view/body-partial.php';
include 'view/footer-partial.html';

?>