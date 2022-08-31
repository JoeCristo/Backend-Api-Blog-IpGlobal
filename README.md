# docker-dev-env-for-symfony

Docker Install

### Content:

- NGINX 1.19 container to handle HTTP requests
- PHP 8.0.1 container to host your Symfony application
- MySQL 8.0 container to store databases

(feel free to update any version in `Dockerfiles` and ports in `docker-compose.yml`)

### Installation:

- Run `make build` to create all containers
- Run `make start` to spin up containers
- Enter the PHP container with `make ssh-be`
