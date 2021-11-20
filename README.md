# Cabinet Forex - LinggaFX

Cabinet Forex LinggaFX adalah platform CMS dari source code CIFire CMS yang dikembangkan oleh
LinggaFX sesuai kebutuhan broker yang digunakan.

## Sersyaratan System
CiFireCMS baik dijalankan pada web server Apache 2.4.x PHP 7.3.x dan PHP 5.6.x (PHP 5.6-Native Not recommended).


## Konfigurasi Lanjutan

### Permission
Ubah user permission pada folder berikut menjadi 775.
```
folder-web-anda
├── content
│   ├── tmp     --> 775
│   ├── thumbs  --> 775
└── └── uploads --> 775
```

### Redirect
Konfigurasi file **.htaccess** standart seperti berikut.
```
RewriteEngine On
RewriteCond $1 !^(index\.php|resources|robots\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L,QSA]
```

Untuk menentukan web anda di akses dengan alamat **http** atau **https** silahkan ubah konfigurasi file **.htaccess** tambahkan kode berikut di bawah baris kode ``RewriteEngine On``.

#### Redirect HTTP to HTTPS

```
# non-www to www.
RewriteCond %{HTTPS} off [OR]
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTP_HOST} ^(?:www\.)?(.+)$ [NC]
RewriteRule ^ https://www.%1%{REQUEST_URI} [L,NE,R=301]

# www to non-www.
RewriteCond %{HTTPS} off [OR]
RewriteCond %{HTTP_HOST} ^www\. [NC]
RewriteCond %{HTTP_HOST} ^(?:www\.)?(.+)$ [NC]
RewriteRule ^ https://%1%{REQUEST_URI} [L,NE,R=301]
```

#### Redirect HTTPS to HTTP
```
# non-www to www.
RewriteCond %{HTTPS} on [OR]
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTP_HOST} ^(?:www\.)?(.+)$ [NC]
RewriteRule ^ http://www.%1%{REQUEST_URI} [L,NE,R=301]

# www to non-www.
RewriteCond %{HTTPS} on [OR]
RewriteCond %{HTTP_HOST} ^www\. [NC]
RewriteCond %{HTTP_HOST} ^(?:www\.)?(.+)$ [NC]
RewriteRule ^ http://%1%{REQUEST_URI} [L,NE,R=301]
```

# Lisensi
Cabinet Forex dilisensikan di bawah LinggaFX License.