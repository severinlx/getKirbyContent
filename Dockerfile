## Bootstrap from PHP container
FROM severinlx/getkirby

#remove this, why?
RUN rm -rf /var/lib/apt/lists/*

## Enable modrewrite and SSL module
RUN a2enmod rewrite
RUN a2enmod ssl

## copy files

