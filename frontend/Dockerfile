FROM node:16
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh
EXPOSE 8080
CMD ["sh", "/usr/local/bin/init.sh"]
