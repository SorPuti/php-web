# PHP clothing api

![image](https://user-images.githubusercontent.com/52476329/227703213-beffcf0a-ea80-409f-80d7-a931e674b2d6.png)

This is a template of an api using PHP and MYSql database

it is based on a cloth company, but can easily be modified to your needs.

the frontend of this project uses `tailwindcss`


## Local deployment

to run it locally, you will need `xampp` or any php server and `nodejs`.

You will need to configure the server (configure-wildcard-subdomains) such that the url will http://site_name.localhost just like https://site_name.com

this is neccessary so that your localhost can behave like production site.

to edit or complile the css you need to make sure tailwind is installed
```
npm i
```

then let tailwind listen to file changes
```
npx tailwind -i ./src/css/index.css -o ./src/css/main.css --watch
```

then you can start to edit, the css will be auto generated.

> ENV

copy .env.example to .env and update your values

## Production deployment

if you are deploying your files directly to the server then you need to compiled your css first
```
npx tailwind -i ./src/css/index.css -o ./src/css/main.css
```

then zip and upload the files to you server.

if you are using a workflow to upload your file to your server, you need to compiled the css as well in your workflow.

```
npx tailwind -i ./src/css/index.css -o ./src/css/main.css
```

> ENV

set your environment variables in your server or insert each values manually in the files

## Database

create a database and import the tables to your database

use `cloth.sql` for tables only

use `cloth-data.sql` for tables and demo data

configure your database connection, is in `src/components/api/product.php`

## API authorization

create a base64 string of `am_not_secure_but_use_me_anyway`, pass the string to the request header using
`auth` as key
`base64 string` has value

edit your authentication in `src/components/api/auth`.
