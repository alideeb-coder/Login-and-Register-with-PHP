FROM php:8.2-apache
# تثبيت إضافات MySQL لـ PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql
# نسخ ملفات مشروعك إلى مجلد السيرفر
COPY . /var/www/html/
# فتح المنفذ 80
EXPOSE 80
