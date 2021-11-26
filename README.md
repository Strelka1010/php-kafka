# Php-Kafka

Docker environment where php can write and read from kafka.

## Requirements

On your own machine you should have:

- docker
- docker-compose

## Build the demo

```
sudo docker-compose up -d --build
```

## Run the demo

```
sudo docker-compose up -d
```
## Update composer

```
sudo composer update
```




## See UI  http://localhost:8080/

Default topic TEST (Wait a minute after building)

## Run producer 

```
 sudo  docker exec -it php-kafka_kafka_1 kafka-console-producer.sh --bootstrap-server kafka:9092 --topic TEST
```


## Run consumer

```
sudo  docker exec php-kafka_kafka_1 kafka-console-consumer.sh --bootstrap-server kafka:9092 --topic TEST --from-beginning
```

## Run test Process

```
sudo  docker exec -it php-kafka_php_1 php ./public/testProcess.php
```

## Examples
https://arnaud.le-blanc.net/php-rdkafka-doc/phpdoc/rdkafka.examples.html


## Documentation

- Docker images for [kafka](https://hub.docker.com/r/wurstmeister/kafka/), [zookeeper](https://hub.docker.com/r/wurstmeister/zookeeper/) and [UI](https://github.com/provectus/kafka-ui)
- [librdkafka](https://github.com/edenhill/librdkafka), a C implementation of the kafka protocol
- [php-rdkafka](https://github.com/arnaud-lb/php-rdkafka), a kafka client for php
- [php-rdkafka-doc](https://arnaud.le-blanc.net/php-rdkafka-doc/phpdoc/index.html), php rdkafka documentation
