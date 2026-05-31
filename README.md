# 🌈 Pura Alegría Website

Sistema web para **Pura Alegría**, una **guardería infantil** orientada al cuidado, educación y bienestar de niños. El proyecto está desarrollado como una aplicación web en **PHP**, con estructura modular, soporte para autenticación de usuarios y assets modernos gestionados con **Webpack**.

---

## 📌 Características principales

* 🏫 Gestión administrativa de guardería infantil
* 🔐 Sistema de autenticación
* 👤 Gestión de usuarios
* 📦 Gestión de servicios y recursos
* 📁 Carga y manejo de archivos
* 🧩 Componentes reutilizables
* 📱 Diseño responsive y amigable
* 🎨 Soporte para temas
* ⚙️ Manejo de errores personalizados

---

## 🛠️ Tecnologías utilizadas

### Backend

* **PHP**
* **Apache**

### Frontend

* **HTML5**
* **CSS3** (PostCSS)
* **JavaScript**
* **Tailwind CSS**
* **Webpack**

### Otros

* **Node js** (NPM)
* **Manifest.json** (PWA)

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

## 🔐 Seguridad

* Rutas protegidas
* Control de accesos no autorizados
* Control de acceso por usuario y roles

---

## 📄 Licencia

---

## ✨ Autor

Desarrollado y Diseñado por **Arturo Santana** [@soysantana](https://www.instagram.com/soysantana2)

---

> Hecho con ❤️ para cuidar lo que más importa.
