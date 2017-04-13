# Testing with Docker

For simple manual testing with Docker Compose

| PHP Version | URL                   | 
| ----------- | --------------------- |
| 5.6.x       | http://localhost:8080 |
| 7.1.x       | http://localhost:8081 |

## Build the latest images

```bash
docker build -t trusona-wordpress:latest .
docker build -t trusona-wordpress:php7.1 -f Dockerfile.php71 .
```

## Using Docker-Compose

### Starting Containers

```bash
docker-compose up
```

### Stopping Containers

```bash
docker-compose down
```
