w.eloquent starter theme
========================

Starter theme for [w.eloquent project](https://github.com/bruno-barros/w.eloquent).

Examples of some implementations:

- Assets loading
- Optimization of assets for production
- Templates organization
- Controllers
- Commands
- etc

To populate your database with dummy data, install the WordPress importer plugin and import the `theme-unit-test-data.xml`.

### Install the theme

1) [Download the Starter theme](https://github.com/bruno-barros/weloquent-starter-theme/archive/master.zip) <br>
2) Create a `starter` folder on your `themes` folder<br>
3) Ensure your `composer.json` load the `Starter` namespace:<br>
```
	"autoload": {
        "psr-4": {
          "Starter\\": "src/themes/starter/app"
        }
    },
```
4) Go to admin page and set up the Starter theme