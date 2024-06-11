# Use a imagem base do Node
FROM node:16

# Definir o diretório de trabalho
WORKDIR /app

# Copiar package.json e package-lock.json
COPY package*.json ./

# Instalar dependências
RUN npm install

# Instalar o Vue CLI globalmente
RUN npm install -g @vue/cli

# Copiar o restante dos arquivos da aplicação
COPY . .

# Expor a porta 8080
EXPOSE 8080

# Executar o script de inicialização
CMD ["npm", "run", "serve"]