### devpart

1.create docker-compose file
2.create folder "wordpress"

exe below

```
wordpress:
    depends_on:
      - db
    image: wordpress:latest
    ports:
      - "8007:80"
    restart: always
    # when install syncronize root directory & /var/www/html directory
    volumes: ["./wordpress:/var/www/html"]  #This part sync with docker wordpress folder
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
    networks:
      - davidluclubwpsite
```

### dev note

```
docker-compose up
```
