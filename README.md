# ModulesPress Skeleton 🚀

<p align="center">
  <img src="https://modulespress.devsroutes.co/logo.png" alt="ModulesPress Logo" width="200"/>
</p>

A modern WordPress plugin development framework inspired by NestJS, Angular, and Laravel.

## 🌟 Overview

ModulesPress Skeleton provides a robust foundation for building scalable and maintainable WordPress plugins using modern development practices. This template serves as the starting point for your ModulesPress-based plugins.

## ✨ Features

- 🎯 **Modern Architecture** - NestJS-inspired modular design
- 🚀 **TypeScript & React** - First-class support for modern frontend
- 🛠️ **PHP 8+ Attributes** - Use decorators for clean, declarative code
- 📦 **Dependency Injection** - Powerful DI container for better testing
- 🔒 **Type Safety** - Full TypeScript and PHP type support
- ⚡ **Vite Integration** - HMR and modern build tools
- 🎨 **Blade Templates** - Elegant templating with Laravel's Blade

## 📋 Prerequisites

- PHP 8.1 or higher
- WordPress 6.0 or higher
- Node.js 16 or higher
- Composer

## 🚀 Quick Start

1. **Install ModulesPress CLI:**
   ```bash
   composer global require modulespress/cli
   ```

2. **Create a new plugin:**
   ```bash
   modulespress new
   // or
   mp new
   ```

3. **Start development:**
   ```bash
   npm run dev
   ```

## 📁 Project Structure

```
plugin-name/
├── .cache/              # Cache storage (views, compiled templates)
├── artifacts/           # Compiled and packaged plugin versions as zip files
├── build/               # Compiled Vite assets
├── resources/           # Source assets requiring compilation
├── src/                 # PHP source code
├── static/              # Uncompiled/raw assets
├── vendor/              # Composer dependencies
├── node_modules/        # NPM dependencies
└── views/               # Blade template files
└── plugin.php           # Plugin main file
```

## 📄 License

This project is licensed under the MIT License.
