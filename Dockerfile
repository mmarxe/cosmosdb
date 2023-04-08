FROM php:7.4-cli

WORKDIR /usr/src/cosmosdb

COPY . /usr/src/cosmosdb/

CMD [ "php", "./src/Tests/Main.php" ]