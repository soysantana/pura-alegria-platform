# 🌈 Pura Alegría Website

Sistema web para **Pura Alegría**, una **guardería infantil** orientada al cuidado, educación y bienestar de niños. El proyecto está desarrollado como una aplicación web en **PHP**, con estructura modular, soporte para autenticación de usuarios y assets modernos gestionados con **Webpack**.

---

## 📌 Características principales

* 🏫 Gestión administrativa de guardería infantil
* 🔐 Sistema de autenticación (login / logout)
* 👤 Gestión de usuarios
* 📦 Gestión de servicios y recursos
* 📁 Carga y manejo de archivos (imágenes de usuarios y productos)
* 🧩 Componentes reutilizables (header, footer, navbar)
* 📱 Diseño responsive y amigable
* 🎨 Soporte para tema (toggle de tema)
* ⚙️ Manejo de errores personalizados (404 / 503)

---

## 🛠️ Tecnologías utilizadas

### Backend

* **PHP**
* **Apache** (con `.htaccess`)

### Frontend

* **HTML5**
* **CSS3** (PostCSS)
* **JavaScript**
* **Webpack**

### Otros

* **Node.js & npm** (para assets)
* **Manifest.json** (PWA-ready)

---

## 📂 Estructura del proyecto

```
├── public/
│   ├── 404.php
│   └── 503.php
│
├── src/
│   ├── auth/
│   │   ├── login.php
│   │   └── logout.php
│   ├── components/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── navbar/
│   │       ├── notification.php
│   │       ├── toggle-theme.php
│   │       └── user-menu.php
│   ├── uploads/
│   │   ├── product/
│   │   └── user/
│   └── ...
│
├── index.php
├── .htaccess
├── manifest.json
├── package.json
├── webpack.config.js
└── README.md
```

---

## ⚙️ Instalación y configuración

### 1️⃣ Requisitos

* PHP 8.x recomendado
* Apache o servidor compatible
* Node.js 18+
* npm

### 2️⃣ Instalación

```bash
npm install
```

### 3️⃣ Compilar assets

```bash
npm run build
```

O en modo desarrollo:

```bash
npm run dev
```

### 4️⃣ Servidor

Coloca el proyecto en la carpeta pública del servidor (`htdocs`, `public_html`) y accede desde:

```
http://localhost/pura-alegria
```

---

## 🚀 Despliegue

---

## 🔐 Seguridad

* Rutas protegidas mediante sesión
* Logout seguro
* Control de acceso por usuario

---

## 📄 Licencia

---

## ✨ Autor

Desarrollado por **Arturo Santana**

---

> Hecho con ❤️ para cuidar lo que más importa.