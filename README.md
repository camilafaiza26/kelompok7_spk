
<p align="center">
  <a href="https://hopeui.iqonic.design/?utm_source=github&utm_medium=github-description&utm_campaign=open_source_github" target="__blank" title="Hope UI">
    <img src="https://assets.iqonic.design/hope-ui/github/logo.png" />
  </a>
</p>
<p align="center">
<a href="https://github.com/iqonicdesignofficial/hope-ui-design-system/" target="__blank"><img src="https://img.shields.io/github/stars/iqonicdesignofficial/hope-ui-design-system" /> </a>
<a href="https://github.com/iqonicdesignofficial/hope-ui-design-system/network" target="__blank"><img src="https://img.shields.io/github/forks/iqonicdesignofficial/hope-ui-design-system" /> </a>
<a href="https://github.com/iqonicdesignofficial/hope-ui-design-system/issues" target="__blank"><img src="https://img.shields.io/github/issues/iqonicdesignofficial/hope-ui-design-system" /> </a>
<a href="#" target="__blank"><img src="https://img.shields.io/bower/v/editor.md.svg" /> </a>
<a href="https://github.com/iqonicdesignofficial/hope-ui-design-system/blob/main/LICENSE" target="__blank"><img src="https://img.shields.io/github/license/iqonicdesignofficial/hope-ui-design-system" /> </a>
<a href="https://twitter.com/iqonicdesign" target="__blank"><img src="https://img.shields.io/twitter/url?style=social&url=https%3A%2F%2Ftwitter.com%2Fiqonicdesign" /></a>
</p>
<h3 align="center">Free Open Source Bootstrap 5 Design System.</h3>
<p align="center">
  <a href="https://templates.iqonic.design/hope-ui/html/dist" title="Hope UI"><strong>Live Demo</strong></a>
  <span>|</span>
  <a href="https://www.figma.com/community/file/1009728454881721702" title="Hope UI"><strong>Figma UI Kit</strong></a>
  <span>|</span>
  <a href="https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/?utm_source=github&utm_medium=github-description&utm_campaign=open_source_github" title="Hope UI"><strong>HTML Dashboard</strong></a>
  <span>|</span>
  <a href="https://iqonic.design/product/admin-templates/hope-ui-open-source-vue-js-admin-template/?utm_source=github&utm_medium=github-description&utm_campaign=open_source_github" title="Hope UI"><strong>Vue JS Dashboard</strong></a>
  <span>|</span>
  <a href="https://iqonic.design/product/admin-templates/hope-ui-free-open-source-react-admin-template/?utm_source=github&utm_medium=github-description&utm_campaign=open_source_github" title="Hope UI"><strong>React JS Dashboard</strong></a>
  <span>|</span>
  <a href="https://iqonic.design/product/admin-templates/hope-ui-free-open-source-laravel-admin-panel/?utm_source=github&utm_medium=github-description&utm_campaign=open_source_github" title="Hope UI"><strong>Laravel Dashboard</strong></a>
</p>

------------

<a href="https://templates.iqonic.design/hope-ui/html/dist" target="__blank" title="Hope UI Dashboard">
  <img src="https://assets.iqonic.design/hope-ui/github/rtl-mode-min.png" alt="Hope UI Dashboard" />
</a>


## Quick Start

You can use following method to get started with CSS and JS files of the design system.

### Method 1: Direct Download
[Dowload from Github](https://github.com/tafcoder/sleek-dashboard/archive/refs/heads/master.zip)

[Download from Iqonic Design](https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/?utm_source=github&utm_medium=github-description&utm_campaign=open_source_github)
### Method 2: Using CDN
```
<link href="https://cdn.jsdelivr.net/gh/iqonicdesignofficial/hope-ui-design-system@main/dist/assets/css/hope-ui.min.css" rel="stylesheet"/>
```

```
<script src="https://cdn.jsdelivr.net/gh/iqonicdesignofficial/hope-ui-design-system@main/dist/assets/js/hope-ui.js"></script>
```
### Method 3: Using NPM
Start working with the design system
1. Install node_modules Run in terminal or CMD:
```
npm install
```

2. Install vendor Run in terminal or CMD: 
```
composer install
```
3. To build css and js for Run in terminal or CMD:
```
npm run dev
```
4. Generate Key for project in terminal or CMD:
```
cp .env.example .env

php artisan key:generate
```
5. To run the project:
```
php artisan serve
```

## File Structure
Within the download you'll find the following directories and files, logically grouping common assets and providing both compiled and minified variations. You'll see something like this:
```
github/hope-ui-admin-dashboard/
laravel
    ├── app
    │    ├── Console
    │    ├── Exceptions
    │    ├── Helpers
    │    ├── Http
    │    │    ├── Controllers
    |    |    |     ├── Auth
    |    |    |     ├── security
    │    |    |     ├── Controller.php
    │    |    |     ├── UserController.php
    │    |    |     └── HomeController.php
    │    │    ├── Middleware
    │    │    └── lRequests
    │    ├── Model
    │    ├── Provider
    │    └── View
    ├── bootstrap
    ├── config
    ├── database
    ├── node_modelus
    ├── public
    │    ├── images
    │    │    ├── icon.png
    │    │    ├── favicon.ico
    │    │    └── loader.gif
    │    ├── js
    |    │    ├── slider-tabs.js
    |    │    ├── countdown.js
    |    |    └── prism.min.js
    │    └── scss
    │        ├── bootstrap/
    │        │     ├── forms/
    │        │     ├── helper/
    │        │     ├── mixins/
    │        │     ├── utilites/
    │        │     └── vendor/
    │        ├── custom
    │        │     ├── auth/
    │        │     ├── kanban/
    │        │     ├── pricing/
    │        │     └── ui-kit/
    │        ├── hope-ui-design-system
    │        │     ├── components/
    │        │     ├── helper/
    │        │     ├── layout-style/
    │        │     ├── pages/
    │        │     ├── plugins/
    │        │     ├── variables/
    │        │     └── variables.scss
    │        ├── dark
    │        │     ├── components/
    │        │     ├── helper/
    │        │     ├── layout-style/
    │        │     ├── pages/
    │        │     ├── plugins/
    │        │     ├── reboot/
    │        │     ├── _dark.scss
    │        │     └── _index.scss
    │        ├── rtl
    │        │     ├── components/
    │        │     ├── pages/
    │        │     ├── reboot/
    │        │     ├── utilities/
    │        │     └── _index.scss
    │        ├── customizer
    │        │     ├── components/
    │        │     ├── layouts/
    │        │     ├── menu-style/
    │        │     ├── utilities/
    │        │     ├── _components.scss
    │        │     ├── _dark.scss
    │        │     ├── _layouts.scss
    │        │     ├── _reboot.scss
    │        │     ├── _root.scss
    │        │     └── _variables.scss
    │        ├── rtl.scss
    │        ├── dark.scss
    │        ├── custom.scss
    │        ├── customizer.scss
    │        └── hope-ui.scss
    ├── resources
    |    ├── css
    |    ├── js
    |    ├── lang
    |    ├── sass
    |    └── views
    │         ├── app
    │         ├── auth
    │         ├── chart
    │         ├── components
    │         ├── dashboards
    │         ├── extrapages
    │         ├── forms
    │         ├── icons
    │         ├── layouts
    │         ├── pageError
    │         ├── partial
    │         ├── table
    │         ├── timeline
    │         ├── ui
    │         ├── role-permission
    │         ├── dashboard.blade.php
    |         └── welcome.blade.php
    ├── route
    ├── tests
    ├── .editorconfig
    ├── .env.example
    ├── .styleci.yml
    ├── artisan
    ├── composer.json
    ├── package.json
    ├── phpunit.xml
    ├── README.md
    ├── server.php
    └── webpack.mix.js
```

## Browser Support
![chrome](https://assets.iqonic.design/hope-ui/github/chrome.png)
![Firefox](https://assets.iqonic.design/hope-ui/github/Firefox.png)
![Safari](https://assets.iqonic.design/hope-ui/github/Safari.png)
![Microsoft](https://assets.iqonic.design/hope-ui/github/Microsoft%20edge.png)
![Operamini](https://assets.iqonic.design/hope-ui/github/Operamini.png)


## Special Thanks
- [Bootstrap](https://getbootstrap.com/)
- [Google Fonts](https://www.google.com/fonts)
- [Jquery](https://jquery.com/)
- [Apex Charts](https://apexcharts.com/)
[Checkout complete list](https://templates.iqonic.design/hope-ui/documentation/html/dist/main/sourceAndCredit.html)
