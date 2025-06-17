# Astro Blank Starter (Rubik)

Starter Astro minimaliste avec TailwindCSS et configuration prête pour intégrer la police **Rubik**.

---

## ✅ Installation

```bash
npm install
npm run dev
```

Site dispo sur : http://localhost:4321

---

## ✏️ Modifier le nom du projet

Dans `package.json` :

```json
{
  "name": "astro-blank-hello-rubik"
}
```

Renommez selon le client : `ixp`, `arloadweb`, etc.

---

## 📁 Structure

- `src/pages/` → pages `.astro`
- `src/components/` → vos composants
- `src/layouts/` → layouts globaux
- `src/styles/` → Tailwind CSS global
- `src/lib/` → appels API, fonctions
- `public/` → images, fichiers statiques

---

## ✨ Utilisation de la police Rubik

Ce projet n'inclut pas directement la font dans les fichiers.  
➡️ Voici la **méthode recommandée** (officielle, performante et simple) :

### 📦 Étape 1 : Ajouter Rubik via Google Fonts

Dans le fichier `src/styles/global.css`, ajoute en haut :

```css
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap');
```

### 🧠 Étape 2 : Déclarer Rubik comme font par défaut

Dans `tailwind.config.js` :

```js
theme: {
  extend: {
    fontFamily: {
      sans: ['Rubik', 'sans-serif'],
    },
  },
}
```

### 🎯 Étape 3 : Appliquer globalement

Dans `global.css` :

```css
body {
  @apply font-sans;
}
```

---

Ainsi, **toute la typographie** utilisera Rubik par défaut, de manière propre et performante, **chargée via Google** CDN.

---

## 🧪 Exemple rapide

```html
<h1 class="text-4xl font-bold">Titre en Rubik</h1>
```
