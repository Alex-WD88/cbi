# STL

> Make WordPress theme development great again.

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->

- [Features](#features)
- [Requirements](#requirements)
- [Getting Started](#getting-started)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Features

- Modern JavaScript through Webpack
- Live reload via BrowserSync
- SCSS support
- Easy dev environments with Docker Compose
- Stateless, immutable plugin management via Composer
- Helpful HTML5 Router for firing JS based on WordPress page slug.
- Nothing else.

## Requirements

- Node.js
- Yarn
- PHP and Composer
- Docker for Mac / Windows / Linux
- Docker Compose

## Getting Started

```bash
1. git clone git@github.com:Alex-WD88/cbi.git
cd cbi
2. composer install
3. yarn install
4. docker-compose up -d
- configure file sharing before running the command above if you are using Windows and Docker without WSL
- use the command below to stop the containers
docker-compose down
- to view all containers
docker-compose ps -a
- to connect to a container
docker exec -it <mycontainer> bash
- to view container logs
docker logs <mycontainer>
5. yarn start

localhost:9009 - website
http://localhost:3000/ - website when yarn is started
localhost:8000 - phpmyadmin
```