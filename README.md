# Rahatlatıcı Müzikler Uygulaması

PHP Challenge için hazırlanmış olan Rahatlatıcı Müzikler Uygulaması
  - Api Token based ile üyelik gerektirmeyez
  - Tüm müzikler kategorilendirilip listelenebilir
  - Müzikler favori listesine eklenip çıkartılabilir

### Teknolojiler

Uygulamayı destekleyen açık kaynaklı projeler:

* [VueJS](https://vuejs.org) - The Progressive JavaScript Framework
* [Laravel](https://laravel.com) - The PHP Framework For Web Artisans
* [Redis](https://redis.io/) -  Redis in-memory data structure store
* [Mysql](https://www.mysql.com) - Database management system
* [phpMyAdmin](https://www.phpmyadmin.net) - https://www.phpmyadmin.net/
* [Docker](https://www.docker.com) - Securely build, share and run any application, anywhere
* [PHP 7.2](https://www.php.net) - General-purpose programming language originally designed for web development
* [Nginx](https://www.nginx.com/) - Improve the performance, reliability, and security of your applications
* [vue-music](https://github.com/Sioxas/vue-music) - Music App

### Kurulum

Kurulum için [Docker](https://docs.docker.com/) kurulumu gerekmektedir.

Kaynak dosyalarını indirin ve klasöre çıkartın. Dilerseniz port ve ayarları docker-compose.yml adresinden düzenleyebilirsiniz.

VueJS uygulamasını kullanmak için
```sh
$ docker-compose up --build
```

Gerekli kurulumları otomatik olarak tamamlayıp uygulamayı aktif hale getirecektir...

`localhost:8081` Portundan uygulamaya erişebilirsiniz.
`localhost:9191` Adresinden phpMyAdmin uygulamasına erişebilirsiniz (user: `root`, pass: `teknasyon`)

### Eklentiler

Uygulamaya dahil edilen açak kaynak kodlu eklentiler;

| Plugin | README |
| ------ | ------ |
| element-ui | [https://github.com/ElemeFE/element/blob/dev/README.md][PlGd] |
| Predis | [https://github.com/nrk/predis/blob/v1.1/README.md][PlGa] |

#### VueJS Dosyalarını Derleme

VueJS uygulamasını derlemek için açık konteynırları listeleyip `php` adlı uygulamanın içerisine girelim

```sh
$ docker-ps
$ docker exec -it ${CONTAINER ID} bash
$ npm run production
```
#### Unit tests

Unit testi çalıştırmak için;

```sh
$ docker-ps
$ docker exec -it ${CONTAINER ID} bash
$ ./vendor/bin/phpunit
```

#### Seeds

Kullabılabilir seed listesi;

`php artisan db:seed --class=ArtistSeeder` Sanatçı oluşturur
`php artisan db:seed --class=CategorieSeeder` Kitaplık oluşturur
`php artisan db:seed --class=MusicSeeder` Müzik oluşturur

### Docker
Uygulama 5 farklı konteynırdan oluşmaktadır;

`webserver` Nginx'i ve gerekli ayar dosyalarını belirtir
| Servis | Açıklama |
| ------ | ------ |
| webserver | Nginx'i ve gerekli ayar dosyalarını belirtir |
| php | Uygulamanın çalışması için gerekli olan php dosyalarını derler ve uygulama dosyalarını kopyalar |
| redis | redis uygulamasını çalıştırır |
| phpmyadmin | Veritabanı bağlantısı için phpMyAdmin uygulamasını çalıştırır |
| db | Veritabanı sunucusunu başlatır ve belirtilen dizine yedek alır |

### Güvenlik açıkları

Eğer herhangi bir güvenlik açığı bulursanız aliemretaskin@gmail.com adresinden benle iletişime geçebilirsiniz.

### Lisans

MIT

