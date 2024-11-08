<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('public/css/navbar.css') ?>">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-content">
                <img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" alt="Profile Picture">
                <button class="dropdown-btn">
                    My Account
                    <span class="dropdown-icon" aria-hidden="true"></span>
                </button>
                <div class="dropdown-container">
                    <a href="<?php echo base_url('Myprofile')?>">My Profile</a>
                    <a href="<?php echo base_url('Updateprofile')?>">Update Profile</a>
                    <a href="<?php echo base_url('Users')?>">Users</a>
                </div>
                <a href="<?php echo base_url('Blog')?>">Blog</a>
                <a href="<?php echo base_url('News')?>">News</a>
                <a href="<?php echo base_url('Logout')?>">Logout</a>
            </div>
        </aside>

        <div class="main-content">
            <nav class="navbar">
                <button class="menu-toggle" aria-label="Toggle menu">☰</button>
                <div class="navbar-brand"></div>
                <ul class="navbar-nav">
                    <li><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                    <li><a href="<?= base_url('About') ?>">About</a></li>
                    <li><a href="<?= base_url('Contact') ?>">Contact</a></li>
                </ul>
            </nav>

            
        