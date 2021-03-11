# Set up app container https://nodejs.org/en/docs/guides/nodejs-docker-webapp/

FROM node:14-slim

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json and package-lock.json are copied
COPY package*.json ./

RUN npm install -g @angular/cli

RUN npm install

# Bundle app source
COPY . ./

RUN npm run build

# Open port 8080 on the image and start server with `node server.js`
EXPOSE 8080
CMD [ "node", "server.js" ]
