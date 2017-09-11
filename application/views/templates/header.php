<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home Page - Big Rivers</title>
</head>
<!-- Css/Fonts -->
<link rel="icon" href="<?=base_url()?>img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?=base_url()?>css/style.css" type="text/css" />

<body>
<div class="header">
    <div class="header-items">
        <img class="header-beer" src="<?=base_url()?>img/beer.png">
        <img class="header-peanuts" src="<?=base_url()?>img/peanuts.png">
    </div>
</div>
<div class="header-coaster img-circle">
    <div class="header-date-div">
        <h3 class="header-date">14/15/16 juli!</h3>
    </div>
    <div class="pseudo-align"></div>
    <a href="index/home">
        <img class="header-logo" src="<?=base_url()?>img/logo.gif">
    </a>
</div>
<div class="navbar">
        <img class="beads-left" src="<?=base_url()?>img/kraaltjes.png"
</div>
<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">

        <li id="menuitem-id-1">
            <a class="menuitem-link" href="#" target="_self">Home</a>
        </li>
        <li id="menuitem-id-2">
            <a class="menuitem-link" href="#" target="_self">Nieuws</a>
        </li>
        <li id="menuitem-id-3">
            <a class="menuitem-link" href="#" target="_self">Let's Go Green!</a>
        </li>
        <li id="menuitem-id-4">
            <a href="#" class="dropdown-toggle menuitem-link" data-toggle="dropdown" role="button" aria-expanded="false">Doe mee<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="/Home/Page/2" target="_self">Stageplaatsen</a></li>
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="/Home/Page/1" target="_self">Vrijwilligersfuncties</a></li>
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="/Home/Page/6" target="_self">Standhouders</a></li>
            </ul>
        </li>
        <li id="menuitem-id-5">
            <a href="#" class="dropdown-toggle menuitem-link" data-toggle="dropdown" role="button" aria-expanded="false">Media<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="https://www.flickr.com/photos/144048724@N08/albums" target="_blank">Foto's 2016</a></li>
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="https://www.youtube.com/watch?v=z4W25SeT6Z4&amp;list=PLTa_arvy-Vo6GRVwa3RKpZGwxYsKkhdDb" target="_blank">Video's 2016</a></li>
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="https://www.flickr.com/photos/125362812@N07/sets" target="_blank">Foto's andere jaren</a></li>
                <li class="dropdown-menuitem"><a class="dropdown-menuitem-link" href="https://www.youtube.com/playlist?list=PLTa_arvy-Vo5_CGVfyxGqvHKGlH2i14Rz" target="_blank">Video's andere jaren</a></li>
            </ul>
        </li>
        <li id="menuitem-id-6">
            <a class="menuitem-link" href="#" target="_self">DONEER EN WIN</a>
        </li>
        <li id="menuitem-id-7">
            <a class="menuitem-link" href="#" target="_self">Over ons</a>
        </li>
        <li id="menuitem-id-8">
            <a class="menuitem-link" href="#" target="_self">Contact</a>
        </li>
        <li id="menuitem-id-9">
            <a class="menuitem-link" href="#" target="_self">Login</a>
        </li>
    </ul>
</div>