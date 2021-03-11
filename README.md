# cs4640jeopardy

Create Jeopardy style study games. Created with Angular and hosted on Google Cloud Platform.

## Deploying to GCP

Deployments are triggered automatically when changes are merged into `main` (See [this guide](https://medium.com/google-cloud/deploying-an-angular-app-using-google-cloud-run-7a4d59048edd)).

## Building Locally with Docker

### Requirements

- [Docker](https://www.docker.com/products/docker-desktop)

Building locally is easy and only requires Docker.

1. Navigate to local repo
2. Run `docker build -t jeopardy .` to build the Docker container
3. Run `docker run -p 8080:8080 jeopardy` to run a Docker image of the container
4. Navigate to http://localhost:8080 to view the app

Because the Docker container created locally has the same configuration as the deployed version, you can be confident that your changes are correct.

## Building Locally without Docker

### Requirements

- [Node.js](https://nodejs.org/en/)
- [Angular CLI](https://angular.io/cli)

Because re-building a Docker container for each change is slow, you can build the Angular app outside the container while developing.

1. Navigate to local repo
2. Run `ng serve` to build the project and host it locally
3. Navigate to http://localhost:4200 to view the app

The Angular development server should automatically update the app as you make changes.
