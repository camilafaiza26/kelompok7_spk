
<h3 align="center">TB SPK Kelompok 7.</h3>

------------


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
