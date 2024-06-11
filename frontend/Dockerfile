# Use a imagem base do Node
FROM node:16

# Definir o diretório de trabalho
WORKDIR /app

# Copiar package.json e package-lock.json
COPY package*.json ./

# Instalar dependências
RUN npm install

# Copiar o restante dos arquivos da aplicação
COPY . .

# Copiar e executar o script de inicialização
COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

# Expor a porta 8080
EXPOSE 8080

# Executar o script de inicialização
CMD ["sh", "/usr/local/bin/init.sh"]
