<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly ?>

<div class="modulespress-container">
    <div class="hero-section">
        <div class="hero-content">
            <div class="logo-container">
                <img src="@static('imgs/logo.png')" alt="ModulesPress Logo" class="plugin-logo">
            </div>
            <h1>Welcome to ModulesPress, <span class="highlight">{{ $wp_username }}</span>!</h1>
            <p class="subtitle">Build powerful WordPress plugins with modern development practices</p>
            <div class="hero-actions">
                <a href="https://modulespress.devsroutes.co/docs" class="btn primary-btn" target="_blank">
                    <i class="fas fa-book-open"></i> View Docs
                </a>
                <a href="https://github.com/devsroutes/modulespress" class="btn secondary-btn" target="_blank">
                    <i class="fab fa-github"></i> GitHub
                </a>
            </div>
        </div>
    </div>

    @include('components.dev-notice')

    <div class="features-grid">
        <div class="feature-card">
            <div class="icon-wrapper">
                <i class="fas fa-cube"></i>
            </div>
            <h3>Modular Architecture</h3>
            <p>Build scalable plugins with NestJS-inspired modular design</p>
        </div>
        <div class="feature-card">
            <div class="icon-wrapper">
                <i class="fas fa-bolt"></i>
            </div>
            <h3>Modern Stack</h3>
            <p>TypeScript, React, and PHP 8+ attributes support</p>
        </div>
        <div class="feature-card">
            <div class="icon-wrapper">
                <i class="fas fa-code"></i>
            </div>
            <h3>Developer Experience</h3>
            <p>Hot Module Replacement & Vite integration</p>
        </div>
        <div class="feature-card">
            <div class="icon-wrapper">
                <i class="fas fa-paint-brush"></i>
            </div>
            <h3>Blade Templates</h3>
            <p>Elegant templating with Laravel's Blade engine</p>
        </div>
    </div>

    <footer class="mp-footer">
        <p>Powered by <a href="https://modulespress.devsroutes.co" target="_blank">ModulesPress</a></p>
        <p class="version">Plugin Version {{ $plugin_version }}</p>
    </footer>
</div>
